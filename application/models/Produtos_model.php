<?php

defined('BASEPATH') OR exit('Ação não permitida');

    class Produtos_model extends CI_Model {
        
        public function get_all() {
            
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'produtos.*',
                'categorias.categoria_id',
                'categorias.categoria_nome as categoria',
                'marcas.marca_id',
                'marcas.marca_nome as marca',
                'fornecedores.fornecedor_id',
                'fornecedores.fornecedor_nome_fantasia as fornecedor',
            ]);
            
            //Aqui faz as ligações com LEFT JOIN nas tabelas (produtos, categorias, marcas e fornecedores)
            $this->db->join('categorias', 'categoria_id = produto_categoria_id', 'LEFT');
            $this->db->join('marcas', 'marca_id = produto_marca_id', 'LEFT');
            $this->db->join('fornecedores', 'fornecedor_id = produto_fornecedor_id', 'LEFT');
            
            //Retorna todos os resultados na tabela produtos,
            return $this->db->get('produtos')->result();
            
        }
    }
        