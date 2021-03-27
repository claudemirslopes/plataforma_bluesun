<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Sistema extends CI_Controller{
    
    public function __construct() {
        parent::__construct(); 
        
        // Definir se tem sessão aberta
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info', 'Sua sessão expirou, acesse novamente');
            redirect('login');
        }
        
    }
    
    public function index() {
        
        $data = array (
            'titulo' => 'Editar Sistema',
            
            'scripts' => array (
                'vendors/mask/jquery_3.2.1.min.js',
                'vendors/mask/jquery.maskedinput.min.js',
            ),
            
            'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),
        );
        
        
        $this->form_validation->set_rules('sistema_razao_social', 'razão social', 'required|min_length[10]|max_length[145]');
        $this->form_validation->set_rules('sistema_nome_fantasia', 'nome fantasia', 'required|min_length[10]|max_length[145]');
        $this->form_validation->set_rules('sistema_cnpj', 'CNPJ', 'required|exact_length[18]');
        $this->form_validation->set_rules('sistema_ie', 'IE', 'max_length[25]');
        $this->form_validation->set_rules('sistema_telefone_fixo', 'telefone fixo', 'required|max_length[25]');
        $this->form_validation->set_rules('sistema_telefone_movel', 'telefone móvel', 'required|max_length[25]');
        $this->form_validation->set_rules('sistema_email', 'e-mail', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('sistema_site_url', 'site', 'required|valid_url|max_length[100]');
        $this->form_validation->set_rules('sistema_cep', 'CEP', 'required|exact_length[10]');
        $this->form_validation->set_rules('sistema_endereco', 'endereço', 'required|max_length[145]');
        $this->form_validation->set_rules('sistema_numero', 'nº', 'max_length[10]');
        $this->form_validation->set_rules('sistema_cidade', 'cidade', 'required|max_length[45]');
        $this->form_validation->set_rules('sistema_estado', 'UF', 'required|exact_length[2]');
        $this->form_validation->set_rules('sistema_txt_ordem_servico', 'Texto ao cliente', 'max_length[500]');
        
        
        if ($this->form_validation->run()) {
            
            /*
                [sistema_razao_social] => Engemetal Comercio e Manutencao LTDA
                [sistema_nome_fantasia] => Bluesun Solar do Brasil
                [sistema_cnpj] => 10.383.997/0001-60
                [sistema_ie] => 
                [sistema_telefone_fixo] => (19) 3441-4291
                [sistema_telefone_movel] => (19) 98364-2927
                [sistema_email] => contato@bluesundobrasil.com.br
                [sistema_site_url] => https://bluesundobrasil.com.br/
                [sistema_cep] => 13.480-309
                [sistema_endereco] => Av. Vitorino Arigone, Jardim Santa Barbara
                [sistema_numero] => 450
                [sistema_cidade] => Limeira
                [sistema_estado] => SP
                [sistema_txt_ordem_servico] => 
             */
            
//            echo '<pre>';
//            print_r($this->input->post());
//            exit();
            
            $data = elements(

                    array(
                        'sistema_razao_social',
                        'sistema_nome_fantasia',
                        'sistema_cnpj',
                        'sistema_ie',
                        'sistema_telefone_fixo',
                        'sistema_telefone_movel',
                        'sistema_email',
                        'sistema_site_url',
                        'sistema_cep',
                        'sistema_endereco',
                        'sistema_numero',
                        'sistema_cidade',
                        'sistema_estado',
                        'sistema_txt_ordem_servico',
                    ), $this->input->post()

            );
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
            $this->core_model->update('sistema', $data, array('sistema_id' => 1));
            
            redirect('sistema');
            
        } else {
            
        // Erro de validação
        
        $this->load->view('layout/header', $data);
        $this->load->view('sistema/index');
        $this->load->view('layout/footer');
        
        }
        
    }
    
}