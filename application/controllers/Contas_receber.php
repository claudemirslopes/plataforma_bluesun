<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Contas_receber extends CI_Controller{
    
    public function __construct() {
        parent::__construct(); 
        
        // Definir se tem sessão aberta
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info', 'Sua sessão expirou, acesse novamente');
            redirect('login');
        }
        
        $this->load->model('financeiro_model');
        
    }
    
    public function index() {
        
        $data = array(
            
            'titulo' => 'Contas a Receber',
            
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
            
            'contas_receber' => $this->financeiro_model->get_all_receber(),
            
        );
        
//        echo '<pre>';
//        print_r($data['contas_receber']);
//        exit();
        
         // Carrega a view de contas_receber
        $this->load->view('layout/header', $data);
        $this->load->view('contas_receber/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        // formn_validation
            $this->form_validation->set_rules('conta_receber_cliente_id', 'cliente', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('conta_receber_data_vencimento', 'data de vencimento', 'trim|required');
            $this->form_validation->set_rules('conta_receber_valor', 'valor', 'trim|required');
            $this->form_validation->set_rules('conta_receber_obs', 'observação', 'max_length[100]');
            
            if ($this->form_validation->run()) { 
                // Teste para ver se valida
//                exit('Validado');
                
                $data = elements(

                    array(
                        'conta_receber_cliente_id',
                        'conta_receber_data_vencimento',
                        'conta_receber_valor',
                        'conta_receber_status',
                        'conta_receber_obs',
                    ), $this->input->post()

            );
                
            $conta_receber_status = $this->input->post('conta_receber_status');
            
            if ($conta_receber_status == 1) {
                $data['conta_receber_data_pagamento'] = date('Y-m-d H:i:s');
            }
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
//            echo '<pre>';
//            print_r($data);
//            exit();
            
            $this->core_model->insert('contas_receber', $data);
            
            redirect('contas_receber');
            
            } else {
            
            $data = array(
            
                'titulo' => 'Cadatrar Conta a Receber',
                
                'styles' => array (
                    'vendors/select2/select2.min.css',
                ),

                'scripts' => array (
                    'vendors/select2/select2.min.js',
                    'vendors/select2/app.js',
                    'vendors/mask/jquery_3.2.1.min.js',
                    'vendors/mask/jquery.mask.min.js',
                    'vendors/mask/app.js',
                ),

                'clientes' => $this->core_model->get_all('clientes'),

            );

                // Carrega a view de editar contas_receber
               $this->load->view('layout/header', $data);
               $this->load->view('contas_receber/add');
               $this->load->view('layout/footer');
               
            }
                
    }
    
    public function edit($conta_receber_id = NULL) {
        
        if (!$conta_receber_id || !$this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id))) {            
            $this->session->set_flashdata('error', 'Conta a receber não encontrada!');
            redirect('contas_receber');
        } else {
            
            // formn_validation
            $this->form_validation->set_rules('conta_receber_cliente_id', 'cliente', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('conta_receber_data_vencimento', 'data de vencimento', 'trim|required');
            $this->form_validation->set_rules('conta_receber_valor', 'valor', 'trim|required');
            $this->form_validation->set_rules('conta_receber_obs', 'observação', 'max_length[100]');
            
            if ($this->form_validation->run()) { 
                // Teste para ver se valida
//                exit('Validado');
                
                $data = elements(

                    array(
                        'conta_receber_cliente_id',
                        'conta_receber_data_vencimento',
                        'conta_receber_valor',
                        'conta_receber_status',
                        'conta_receber_obs',
                    ), $this->input->post()

            );
                
            $conta_receber_status = $this->input->post('conta_receber_status');
            
            if ($conta_receber_status == 1) {
                $data['conta_receber_data_pagamento'] = date('Y-m-d H:i:s');
            }
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
//            echo '<pre>';
//            print_r($data);
//            exit();
            
            $this->core_model->update('contas_receber', $data, array('conta_receber_id' => $conta_receber_id));
            
            redirect('contas_receber');
            
            } else {
            
            $data = array(
            
                'titulo' => 'Atualizar Conta a Receber',
                
                'styles' => array (
                    'vendors/select2/select2.min.css',
                ),

                'scripts' => array (
                    'vendors/select2/select2.min.js',
                    'vendors/select2/app.js',
                    'vendors/mask/jquery_3.2.1.min.js',
                    'vendors/mask/jquery.mask.min.js',
                    'vendors/mask/app.js',
                ),

                'conta_receber' => $this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id)),
                'clientes' => $this->core_model->get_all('clientes'),

            );

                // Carrega a view de editar contas_receber
               $this->load->view('layout/header', $data);
               $this->load->view('contas_receber/edit');
               $this->load->view('layout/footer');
               
            }
            
        }
                
    }
    
    public function del($conta_receber_id = NULL) {

        if (!$conta_receber_id || !$this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id))) {
            $this->session->set_flashdata('error', 'A conta não foi encontrada');
            redirect('contas_receber');
        } 
        if ($this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id, 'conta_receber_status' => 0))) {
            $this->session->set_flashdata('info', 'Esta conta não pode ser excluída, pois ainda está em aberto');
            redirect('contas_receber');
        } 
        
            $this->core_model->delete('contas_receber', array('conta_receber_id' => $conta_receber_id));
            redirect('contas_receber');

    }
    
}