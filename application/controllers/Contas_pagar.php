<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Contas_pagar extends CI_Controller{
    
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
            
            'titulo' => 'Contas a Pagar',
            
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
            
            'contas_pagar' => $this->financeiro_model->get_all_pagar(),
            
        );
        
//        echo '<pre>';
//        print_r($data['contas_pagar']);
//        exit();
        
         // Carrega a view de contas_pagar
        $this->load->view('layout/header', $data);
        $this->load->view('contas_pagar/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        // formn_validation
            $this->form_validation->set_rules('conta_pagar_fornecedor_id', 'fornecedor', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('conta_pagar_data_vencimento', 'data de vencimento', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_valor', 'valor', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_obs', 'observação', 'max_length[100]');
            
            if ($this->form_validation->run()) { 
                // Teste para ver se valida
//                exit('Validado');
                
                $data = elements(

                    array(
                        'conta_pagar_fornecedor_id',
                        'conta_pagar_data_vencimento',
                        'conta_pagar_valor',
                        'conta_pagar_status',
                        'conta_pagar_obs',
                    ), $this->input->post()

            );
                
            $conta_pagar_status = $this->input->post('conta_pagar_status');
            
            if ($conta_pagar_status == 1) {
                $data['conta_pagar_data_pagamento'] = date('Y-m-d H:i:s');
            }
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
//            echo '<pre>';
//            print_r($data);
//            exit();
            
            $this->core_model->insert('contas_pagar', $data);
            
            redirect('contas_pagar');
            
            } else {
            
            $data = array(
            
                'titulo' => 'Cadatrar Conta a Pagar',
                
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

                'fornecedores' => $this->core_model->get_all('fornecedores'),

            );

                // Carrega a view de editar contas_pagar
               $this->load->view('layout/header', $data);
               $this->load->view('contas_pagar/add');
               $this->load->view('layout/footer');
               
            }
                
    }
    
    public function edit($conta_pagar_id = NULL) {
        
        if (!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))) {            
            $this->session->set_flashdata('error', 'Conta a pagar não encontrada!');
            redirect('contas_pagar');
        } else {
            
            // formn_validation
            $this->form_validation->set_rules('conta_pagar_fornecedor_id', 'fornecedor', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('conta_pagar_data_vencimento', 'data de vencimento', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_valor', 'valor', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_obs', 'observação', 'max_length[100]');
            
            if ($this->form_validation->run()) { 
                // Teste para ver se valida
//                exit('Validado');
                
                $data = elements(

                    array(
                        'conta_pagar_fornecedor_id',
                        'conta_pagar_data_vencimento',
                        'conta_pagar_valor',
                        'conta_pagar_status',
                        'conta_pagar_obs',
                    ), $this->input->post()

            );
                
            $conta_pagar_status = $this->input->post('conta_pagar_status');
            
            if ($conta_pagar_status == 1) {
                $data['conta_pagar_data_pagamento'] = date('Y-m-d H:i:s');
            }
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
//            echo '<pre>';
//            print_r($data);
//            exit();
            
            $this->core_model->update('contas_pagar', $data, array('conta_pagar_id' => $conta_pagar_id));
            
            redirect('contas_pagar');
            
            } else {
            
            $data = array(
            
                'titulo' => 'Atualizar Conta a Pagar',
                
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

                'conta_pagar' => $this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id)),
                'fornecedores' => $this->core_model->get_all('fornecedores'),

            );

                // Carrega a view de editar contas_pagar
               $this->load->view('layout/header', $data);
               $this->load->view('contas_pagar/edit');
               $this->load->view('layout/footer');
               
            }
            
        }
                
    }
    
    public function del($conta_pagar_id = NULL) {

        if (!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))) {
            $this->session->set_flashdata('error', 'A conta não foi encontrada');
            redirect('contas_pagar');
        } 
        if ($this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id, 'conta_pagar_status' => 0))) {
            $this->session->set_flashdata('info', 'Esta conta não pode ser excluída, pois ainda está em aberto');
            redirect('contas_pagar');
        } 
        
            $this->core_model->delete('contas_pagar', array('conta_pagar_id' => $conta_pagar_id));
            redirect('contas_pagar');

    }
    
}