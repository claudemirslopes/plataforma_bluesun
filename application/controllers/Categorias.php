<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Categorias extends CI_Controller{
    
    public function __construct() {
        parent::__construct(); 
        
        // Definir se tem sessão aberta
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info', 'Sua sessão expirou, acesse novamente');
            redirect('login');
        }
        
    }
    
    public function index() {
        
        $data = array(
            
            'titulo' => 'Categorias',
            
            'styles' => array(
              'vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
              'vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
            ),
            
            'scripts' => array(
              'vendors/datatables.net/js/jquery.dataTables.min.js', 
              'vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
              'vendors/datatables.net-bs4/js/app.js',
              'vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
              'vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
              'vendors/datatables.net-buttons/js/buttons.html5.min.js',
              'vendors/datatables.net-buttons/js/buttons.print.min.js',
              'vendors/datatables.net-buttons/js/buttons.colVis.min.js',
              'assets/js/init-scripts/data-table/datatables-init.js',  
            ),
            
            'categorias' => $this->core_model->get_all('categorias'),
            
        );
        
//        echo '<pre>';
//        print_r($data['categorias']);
//        exit();
        
         // Carrega a view de categorias
        $this->load->view('layout/header', $data);
        $this->load->view('categorias/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        $this->form_validation->set_rules('categoria_nome', 'categoria', 'trim|required|min_length[4]|max_length[45]|is_unique[categorias.categoria_nome]');

        if ($this->form_validation->run()) { 
            // Teste para ver se valida
//                exit('Validado');

            $data = elements(

                array(
                    'categoria_nome',
                    'categoria_ativa',
                ), $this->input->post()

        );

        // Colocar todo texto em maiúsculo
            // $data['categoria_nome_completo'] = strtoupper($this->input->post('categoria_nome_completo'));

        // Limpar dados maliciosos
        $data = html_escape($data);

        $this->core_model->insert('categorias', $data);

        redirect('categorias');

        } else {

            // Erro de validação
            $data = array(

            'titulo' => 'Cadastrar categoria',
                
        );

//                echo '<pre>';
//                print_r($data['categoria']);
//                exit(); 

            // Carrega a view de editar categorias
           $this->load->view('layout/header', $data);
           $this->load->view('categorias/add');
           $this->load->view('layout/footer');

        }        

    }
    
    public function edit($categoria_id = NULL) {
        
        if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {            
            $this->session->set_flashdata('error', 'Categoria não encontrado!');
            redirect('categorias');
        } else {
            
            
            $this->form_validation->set_rules('categoria_nome', 'categoria', 'trim|required|min_length[4]|max_length[45]|callback_check_categoria_nome');
            
            if ($this->form_validation->run()) { 
                // Teste para ver se valida
//                exit('Validado');
                
                
                //Impedir que a categoria que está em uso seja desabilitada
                $categoria_ativa = $this->input->post('categoria_ativa');
                if ($this->db->table_exists('produtos')) {
                    if ($categoria_ativa == 0 && $this->core_model->get_by_id('produtos', array('produto_categoria_id' => $categoria_id, 'produto_ativo' => 1))) {
                        $this->session->set_flashdata('info', 'Esta categoria não pode ser desabilitada, pois está sendo usado na tabela <b>produtos</b>');
                        redirect('categorias');
                    }
                }
                
                $data = elements(

                    array(
                        'categoria_nome',
                        'categoria_ativa',
                    ), $this->input->post()

            );
            
            // Colocar todo texto em maiúsculo
//            $data['categoria_estado'] = strtoupper($this->input->post('categoria_estado'));
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
            $this->core_model->update('categorias', $data, array('categoria_id' => $categoria_id));
            
            redirect('categorias');
            
            } else {
                
                // Erro de validação
                $data = array(
            
                'titulo' => 'Atualizar categoria',

                'categoria' => $this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id)),

            );
                
//                echo '<pre>';
//                print_r($data['categoria']);
//                exit(); 

                // Carrega a view de editar categorias
               $this->load->view('layout/header', $data);
               $this->load->view('categorias/edit');
               $this->load->view('layout/footer');
                
            }
            
        }
        
        
    }
    
    public function del($categoria_id = NULL) {

        if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {
            $this->session->set_flashdata('error', 'A categoria não foi encontrado');
            redirect('categorias');
        } else {
            $this->core_model->delete('categorias', array('categoria_id' => $categoria_id));
            redirect('categorias');
        }

    }
    
    public function check_categoria_nome($categoria_nome) {
        
        $categoria_id = $this->input->post('categoria_id');
        
        if ($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome, 'categoria_id !=' => $categoria_id))) {
            $this->form_validation->set_message('check_categoria_nome', 'Esta categoria já existe em nossa base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
}