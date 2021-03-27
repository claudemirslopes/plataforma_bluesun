<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Marcas extends CI_Controller{
    
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
            
            'titulo' => 'Marcas',
            
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
            
            'marcas' => $this->core_model->get_all('marcas'),
            
        );
        
//        echo '<pre>';
//        print_r($data['marcas']);
//        exit();
        
         // Carrega a view de marcas
        $this->load->view('layout/header', $data);
        $this->load->view('marcas/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        $this->form_validation->set_rules('marca_nome', 'marca', 'trim|required|min_length[4]|max_length[45]|is_unique[marcas.marca_nome]');

        if ($this->form_validation->run()) { 
            // Teste para ver se valida
//                exit('Validado');

            $data = elements(

                array(
                    'marca_nome',
                    'marca_ativa',
                ), $this->input->post()

        );

        // Colocar todo texto em maiúsculo
            // $data['marca_nome_completo'] = strtoupper($this->input->post('marca_nome_completo'));

        // Limpar dados maliciosos
        $data = html_escape($data);

        $this->core_model->insert('marcas', $data);

        redirect('marcas');

        } else {

            // Erro de validação
            $data = array(

            'titulo' => 'Cadastrar marca',
                
        );

//                echo '<pre>';
//                print_r($data['marca']);
//                exit(); 

            // Carrega a view de editar marcas
           $this->load->view('layout/header', $data);
           $this->load->view('marcas/add');
           $this->load->view('layout/footer');

        }        

    }
    
    public function edit($marca_id = NULL) {
        
        if (!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))) {            
            $this->session->set_flashdata('error', 'Marca não encontrado!');
            redirect('marcas');
        } else {
            
            
            $this->form_validation->set_rules('marca_nome', 'marca', 'trim|required|min_length[4]|max_length[45]|callback_check_marca_nome');
            
            if ($this->form_validation->run()) { 
                // Teste para ver se valida
//                exit('Validado');
                
                
                //Impedir que a marca que está em uso seja desabilitada
                $marca_ativa = $this->input->post('marca_ativa');
                if ($this->db->table_exists('produtos')) {
                    if ($marca_ativa == 0 && $this->core_model->get_by_id('produtos', array('produto_marca_id' => $marca_id, 'produto_ativo' => 1))) {
                        $this->session->set_flashdata('info', 'Esta marca não pode ser desabilitada, pois está sendo usado na tabela <b>produtos</b>');
                        redirect('marcas');
                    }
                }
                
                $data = elements(

                    array(
                        'marca_nome',
                        'marca_ativa',
                    ), $this->input->post()

            );
            
            // Colocar todo texto em maiúsculo
//            $data['marca_estado'] = strtoupper($this->input->post('marca_estado'));
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
            $this->core_model->update('marcas', $data, array('marca_id' => $marca_id));
            
            redirect('marcas');
            
            } else {
                
                // Erro de validação
                $data = array(
            
                'titulo' => 'Atualizar marca',

                'marca' => $this->core_model->get_by_id('marcas', array('marca_id' => $marca_id)),

            );
                
//                echo '<pre>';
//                print_r($data['marca']);
//                exit(); 

                // Carrega a view de editar marcas
               $this->load->view('layout/header', $data);
               $this->load->view('marcas/edit');
               $this->load->view('layout/footer');
                
            }
            
        }
        
        
    }
    
    public function del($marca_id = NULL) {

        if (!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))) {
            $this->session->set_flashdata('error', 'A marca não foi encontrado');
            redirect('marcas');
        } else {
            $this->core_model->delete('marcas', array('marca_id' => $marca_id));
            redirect('marcas');
        }

    }
    
    public function check_marca_nome($marca_nome) {
        
        $marca_id = $this->input->post('marca_id');
        
        if ($this->core_model->get_by_id('marcas', array('marca_nome' => $marca_nome, 'marca_id !=' => $marca_id))) {
            $this->form_validation->set_message('check_marca_nome', 'Esta marca já existe em nossa base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
}