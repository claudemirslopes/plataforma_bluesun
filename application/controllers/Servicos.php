<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Servicos extends CI_Controller{
    
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
            
            'titulo' => 'Serviços',
            
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
            
            'servicos' => $this->core_model->get_all('servicos'),
            
        );
        
//        echo '<pre>';
//        print_r($data['servicos']);
//        exit();
        
         // Carrega a view de servicos
        $this->load->view('layout/header', $data);
        $this->load->view('servicos/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        $this->form_validation->set_rules('servico_nome', 'serviço', 'trim|required|min_length[4]|max_length[145]|is_unique[servicos.servico_nome]');
        $this->form_validation->set_rules('servico_preco', 'preço', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('servico_descricao', 'descrição', 'trim|required|max_length[500]');

        if ($this->form_validation->run()) { 
            // Teste para ver se valida
//                exit('Validado');

            $data = elements(

                array(
                    'servico_nome',
                    'servico_preco',
                    'servico_ativo',
                    'servico_descricao',
                ), $this->input->post()

        );

        // Colocar todo texto em maiúsculo
            // $data['servico_nome_completo'] = strtoupper($this->input->post('servico_nome_completo'));

        // Limpar dados maliciosos
        $data = html_escape($data);

        $this->core_model->insert('servicos', $data);

        redirect('servicos');

        } else {

            // Erro de validação
            $data = array(

            'titulo' => 'Cadastrar servico',

            'scripts' => array (
                'vendors/mask/jquery_3.2.1.min.js',
                'vendors/mask/jquery.mask.min.js',
                'vendors/mask/app.js',
            ),
                
        );

//                echo '<pre>';
//                print_r($data['servico']);
//                exit(); 

            // Carrega a view de editar servicos
           $this->load->view('layout/header', $data);
           $this->load->view('servicos/add');
           $this->load->view('layout/footer');

        }        

    }
    
    public function edit($servico_id = NULL) {
        
        if (!$servico_id || !$this->core_model->get_by_id('servicos', array('servico_id' => $servico_id))) {            
            $this->session->set_flashdata('error', 'Serviço não encontrado!');
            redirect('servicos');
        } else {
            
            
            $this->form_validation->set_rules('servico_nome', 'serviço', 'trim|required|min_length[4]|max_length[145]|callback_check_servico_nome');
            $this->form_validation->set_rules('servico_preco', 'preço', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('servico_descricao', 'trim|descrição', 'required|max_length[500]');
            
            if ($this->form_validation->run()) { 
                // Teste para ver se valida
//                exit('Validado');
                
                $data = elements(

                    array(
                        'servico_nome',
                        'servico_preco',
                        'servico_ativo',
                        'servico_descricao',
                    ), $this->input->post()

            );
            
            // Colocar todo texto em maiúsculo
//            $data['servico_estado'] = strtoupper($this->input->post('servico_estado'));
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
            $this->core_model->update('servicos', $data, array('servico_id' => $servico_id));
            
            redirect('servicos');
            
            } else {
                
                // Erro de validação
                $data = array(
            
                'titulo' => 'Atualizar servico',

                'scripts' => array (
                    'vendors/mask/jquery_3.2.1.min.js',
                    'vendors/mask/jquery.mask.min.js',
                    'vendors/mask/app.js',
                ),

                'servico' => $this->core_model->get_by_id('servicos', array('servico_id' => $servico_id)),

            );
                
//                echo '<pre>';
//                print_r($data['servico']);
//                exit(); 

                // Carrega a view de editar servicos
               $this->load->view('layout/header', $data);
               $this->load->view('servicos/edit');
               $this->load->view('layout/footer');
                
            }
            
        }
        
        
    }
    
    public function del($servico_id = NULL) {

        if (!$servico_id || !$this->core_model->get_by_id('servicos', array('servico_id' => $servico_id))) {
            $this->session->set_flashdata('error', 'O servico não foi encontrado');
            redirect('servicos');
        } else {
            $this->core_model->delete('servicos', array('servico_id' => $servico_id));
            redirect('servicos');
        }

    }
    
    public function check_servico_nome($servico_nome) {
        
        $servico_id = $this->input->post('servico_id');
        
        if ($this->core_model->get_by_id('servicos', array('servico_nome' => $servico_nome, 'servico_id !=' => $servico_id))) {
            $this->form_validation->set_message('check_servico_nome', 'Este serviço já existe em nossa base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
}