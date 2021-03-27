-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/03/2021 às 21:41
-- Versão do servidor: 10.4.18-MariaDB
-- Versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ordem`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nome` varchar(45) NOT NULL,
  `categoria_ativa` tinyint(1) DEFAULT NULL,
  `categoria_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nome`, `categoria_ativa`, `categoria_data_alteracao`) VALUES
(1, 'Painéis', 1, '2021-03-24 15:05:21'),
(2, 'Inversores', 1, '2021-03-24 15:04:58'),
(3, 'Conectores', 0, '2021-03-25 12:54:25'),
(4, 'Cabos', 0, '2021-03-24 15:06:44'),
(5, 'String Box', 1, '2021-03-24 15:07:21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `cliente_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `cliente_pessoa` tinyint(1) DEFAULT NULL,
  `cliente_tipo` tinyint(1) NOT NULL,
  `cliente_nome` varchar(45) NOT NULL,
  `cliente_sobrenome` varchar(150) NOT NULL,
  `cliente_data_nascimento` date NOT NULL,
  `cliente_cpf_cnpj` varchar(20) NOT NULL,
  `cliente_rg_ie` varchar(20) NOT NULL,
  `cliente_email` varchar(50) NOT NULL,
  `cliente_telefone` varchar(20) NOT NULL,
  `cliente_celular` varchar(20) NOT NULL,
  `cliente_cep` varchar(10) NOT NULL,
  `cliente_endereco` varchar(155) NOT NULL,
  `cliente_numero_endereco` varchar(20) NOT NULL,
  `cliente_bairro` varchar(45) NOT NULL,
  `cliente_complemento` varchar(145) NOT NULL,
  `cliente_cidade` varchar(105) NOT NULL,
  `cliente_estado` varchar(2) NOT NULL,
  `cliente_ativo` tinyint(1) NOT NULL,
  `cliente_obs` tinytext DEFAULT NULL,
  `cliente_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_data_cadastro`, `cliente_pessoa`, `cliente_tipo`, `cliente_nome`, `cliente_sobrenome`, `cliente_data_nascimento`, `cliente_cpf_cnpj`, `cliente_rg_ie`, `cliente_email`, `cliente_telefone`, `cliente_celular`, `cliente_cep`, `cliente_endereco`, `cliente_numero_endereco`, `cliente_bairro`, `cliente_complemento`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_obs`, `cliente_data_alteracao`) VALUES
(1, '2021-03-21 11:59:10', 1, 1, 'Eliane', 'Rocha de Freitas Lopes', '1971-11-28', '964.301.686-20', '58.647.864-4', 'lifreitaslopes@gmail.com', '', '(19) 98457-8361', '13.484-473', 'Rua Joaquim Ernesto de Castro', '54', 'Jd. São Paulo', 'Frente a praça', 'Limeira', 'SP', 1, 'Este é apenas um cliente para testes no sistema de orçamento da Bluesun', '2021-03-22 14:35:29'),
(2, '2021-03-21 22:43:19', 2, 2, 'Open Beta Informática ME', 'Open Beta Info', '2009-11-02', '92.193.202/0001-15', '162.245.285.753', 'contato@openbeta.com.br', '(19) 3458-8558', '(19) 98558-8777', '13.483-332', 'Rua Guido José Bellon', '209', 'Pq. Abílio Pedro', '', 'Limeira', 'SP', 1, 'Empresa cadastrada somente para realizar testes no sistema', '2021-03-26 20:09:53'),
(4, '2021-03-22 17:51:34', 2, 2, 'Adventure Beta Teste S.A.', 'Adventure Beta', '2017-04-05', '05.429.416/0001-43', '657.075.219.802', 'adventure@teste.com', '(21) 3885-4778', '(21) 98588-7788', '21.010-076', 'Av. Brasil', '13002', 'Parada de Lucas', '', 'Rio de Janeiro', 'RJ', 1, 'Apenas uma inserção de teste no sistema', '2021-03-22 17:51:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `conta_pagar_id` int(11) NOT NULL,
  `conta_pagar_fornecedor_id` int(11) DEFAULT NULL,
  `conta_pagar_data_vencimento` date DEFAULT NULL,
  `conta_pagar_data_pagamento` datetime DEFAULT NULL,
  `conta_pagar_valor` varchar(15) DEFAULT NULL,
  `conta_pagar_status` tinyint(1) DEFAULT NULL,
  `conta_pagar_obs` tinytext DEFAULT NULL,
  `conta_pagar_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

--
-- Despejando dados para a tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`conta_pagar_id`, `conta_pagar_fornecedor_id`, `conta_pagar_data_vencimento`, `conta_pagar_data_pagamento`, `conta_pagar_valor`, `conta_pagar_status`, `conta_pagar_obs`, `conta_pagar_data_alteracao`) VALUES
(2, 4, '2021-03-31', '2021-03-26 16:23:17', '805,00', 1, 'Paguei esta conta conforme vencimento', '2021-03-26 19:23:17'),
(3, 1, '2021-03-25', NULL, '452,99', 0, 'Conta está vencida, avisar o gerente', '2021-03-26 18:28:54'),
(4, 2, '2021-03-28', NULL, '854,99', 0, 'Conta cadastrada a pagar', '2021-03-26 19:45:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `conta_receber_id` int(11) NOT NULL,
  `conta_receber_cliente_id` int(11) NOT NULL,
  `conta_receber_data_vencimento` date DEFAULT NULL,
  `conta_receber_data_pagamento` datetime DEFAULT NULL,
  `conta_receber_valor` varchar(20) DEFAULT NULL,
  `conta_receber_status` tinyint(1) DEFAULT NULL,
  `conta_receber_obs` tinytext DEFAULT NULL,
  `conta_receber_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `contas_receber`
--

INSERT INTO `contas_receber` (`conta_receber_id`, `conta_receber_cliente_id`, `conta_receber_data_vencimento`, `conta_receber_data_pagamento`, `conta_receber_valor`, `conta_receber_status`, `conta_receber_obs`, `conta_receber_data_alteracao`) VALUES
(1, 1, '2020-02-28', '2020-02-28 17:48:21', '1.502,26', 0, 'O cliente ainda não pagou (inadimplente)', '2021-03-26 20:30:54'),
(2, 2, '2020-02-21', '2020-02-28 18:33:19', '350.00', 1, NULL, '2020-02-28 21:33:19'),
(3, 4, '2020-02-28', '2020-02-28 17:22:47', '56.00', 1, NULL, '2020-02-28 20:22:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `fornecedor_id` int(11) NOT NULL,
  `fornecedor_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `fornecedor_razao` varchar(200) DEFAULT NULL,
  `fornecedor_nome_fantasia` varchar(145) DEFAULT NULL,
  `fornecedor_cnpj` varchar(20) DEFAULT NULL,
  `fornecedor_ie` varchar(20) DEFAULT NULL,
  `fornecedor_telefone` varchar(20) DEFAULT NULL,
  `fornecedor_celular` varchar(20) DEFAULT NULL,
  `fornecedor_email` varchar(100) DEFAULT NULL,
  `fornecedor_contato` varchar(45) DEFAULT NULL,
  `fornecedor_cep` varchar(10) DEFAULT NULL,
  `fornecedor_endereco` varchar(145) DEFAULT NULL,
  `fornecedor_numero_endereco` varchar(20) DEFAULT NULL,
  `fornecedor_bairro` varchar(45) DEFAULT NULL,
  `fornecedor_complemento` varchar(45) DEFAULT NULL,
  `fornecedor_cidade` varchar(45) DEFAULT NULL,
  `fornecedor_estado` varchar(2) DEFAULT NULL,
  `fornecedor_ativo` tinyint(1) DEFAULT NULL,
  `fornecedor_obs` tinytext DEFAULT NULL,
  `fornecedor_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`fornecedor_id`, `fornecedor_data_cadastro`, `fornecedor_razao`, `fornecedor_nome_fantasia`, `fornecedor_cnpj`, `fornecedor_ie`, `fornecedor_telefone`, `fornecedor_celular`, `fornecedor_email`, `fornecedor_contato`, `fornecedor_cep`, `fornecedor_endereco`, `fornecedor_numero_endereco`, `fornecedor_bairro`, `fornecedor_complemento`, `fornecedor_cidade`, `fornecedor_estado`, `fornecedor_ativo`, `fornecedor_obs`, `fornecedor_data_alteracao`) VALUES
(1, '2021-03-22 18:34:44', 'Cambiaghi Distribuidora S.A.', 'Cambiaghi Carretas', '35.222.509/0001-63', '028.947.331.720', '(13) 3254-8558', '(13) 98558-8778', 'cambiaghi@cambiaghi.com.br', 'Ademir Dantas', '35.041-110', 'Rua C', '54', 'Vila dos Montes', 'Barracão', 'Governador Valadares', 'MG', 1, 'Fornecedor cadastrado para testes pelo phpmyadmin', '2021-03-23 15:44:14'),
(2, '2021-03-22 19:44:01', 'Fornec Test LTDA', 'Fornec Test', '94.289.116/0001-36', '844.634.378.564', '(12) 3226-5877', '(12) 98855-8877', 'fornec@test.com', 'Abadias Lemos', '12.458-789', 'Rua Violeta das Acácias', '45', 'Bairro da Aliança', '', 'São José dos Campos', 'SP', 1, 'Cadastro feito para testes no sistema da Bluesun Solar do Brasil', '2021-03-24 20:38:48'),
(4, '2021-03-22 19:53:12', 'Andaraluz Distribuidora ME', 'Andaraluz Light', '90.954.405/0001-51', '637.470.460.344', '(33) 3558-7896', '(33) 95878-5458', 'contato@andaraluzlight.com.br', 'Márcia de Oliveira Trindade', '33.458-789', 'Rua da Liberdade', '458', 'Jd. Pérola', '', 'Governador Valadares', 'MG', 1, 'Mais um cadastro de teste da plataforma', '2021-03-26 13:56:53'),
(5, '2021-03-26 13:59:42', 'Borba &amp; Gatto Testes', 'Borba &amp; Gatto', '14.924.337/0001-08', '745.461.810.106', '(41) 4578-8998', '(41) 95587-7891', 'borba@gatto.com', 'Claudecir', '80.420-010', 'Avenida Vicente Machado', '1254', 'Centro', '', 'Curitiba', 'PR', 0, 'Efetuado para testes', '2021-03-26 13:59:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'vendedor', 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `marca_id` int(11) NOT NULL,
  `marca_nome` varchar(45) NOT NULL,
  `marca_ativa` tinyint(1) DEFAULT NULL,
  `marca_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`marca_id`, `marca_nome`, `marca_ativa`, `marca_data_alteracao`) VALUES
(3, 'Teste 01', 1, '2021-03-25 12:15:19'),
(4, 'Marca02a', 0, '2021-03-25 12:46:13'),
(5, 'Mark03c', 0, '2021-03-24 19:37:33'),
(6, 'Invert3b', 1, '0000-00-00 00:00:00'),
(7, 'StrielHome', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `produto_id` int(11) NOT NULL,
  `produto_codigo` varchar(45) DEFAULT NULL,
  `produto_data_cadastro` datetime DEFAULT NULL,
  `produto_categoria_id` int(11) NOT NULL,
  `produto_marca_id` int(11) NOT NULL,
  `produto_fornecedor_id` int(11) NOT NULL,
  `produto_descricao` varchar(145) DEFAULT NULL,
  `produto_unidade` varchar(25) DEFAULT NULL,
  `produto_codigo_barras` varchar(45) DEFAULT NULL,
  `produto_ncm` varchar(15) DEFAULT NULL,
  `produto_preco_custo` varchar(45) DEFAULT NULL,
  `produto_preco_venda` varchar(45) DEFAULT NULL,
  `produto_estoque_minimo` varchar(10) DEFAULT NULL,
  `produto_qtde_estoque` varchar(10) DEFAULT NULL,
  `produto_ativo` tinyint(1) DEFAULT NULL,
  `produto_obs` tinytext DEFAULT NULL,
  `produto_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `produto_codigo`, `produto_data_cadastro`, `produto_categoria_id`, `produto_marca_id`, `produto_fornecedor_id`, `produto_descricao`, `produto_unidade`, `produto_codigo_barras`, `produto_ncm`, `produto_preco_custo`, `produto_preco_venda`, `produto_estoque_minimo`, `produto_qtde_estoque`, `produto_ativo`, `produto_obs`, `produto_data_alteracao`) VALUES
(1, '13278604', NULL, 1, 3, 1, 'Kit Painel Cont. Placa Energia Solar Fotovoltaica 30W', 'UN', '', '', '355,00', '451,00', '5', '10', 1, 'Este produto é apenas para teste no sistema', '2021-03-25 18:21:12'),
(2, '73596214', NULL, 1, 6, 2, 'Placa Energia Solar Célula Fotovoltaica 150w + Cabo', 'UN', '', '', '654,88', '874,55', '5', '5', 0, 'Cadastro apenas para teste', '2021-03-25 18:21:24'),
(3, '21987463', NULL, 2, 6, 2, 'Inversor Solar Growatt On Grid 2Kw Mono 220V 1Mppt', 'UN', '', '', '2.645,00', '3.255,00', '5', '2', 1, 'Cadastrado apenas para testes', '2021-03-25 18:14:18'),
(4, '64715802', NULL, 1, 3, 1, 'StringBox Ca Sistema Fotovoltaico Monofásico Dps', 'UN', '', '', '358,00', '457,00', '5', '5', 1, 'Cadastro apenas para teste', '2021-03-25 20:21:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `servico_id` int(11) NOT NULL,
  `servico_nome` varchar(145) DEFAULT NULL,
  `servico_preco` varchar(15) DEFAULT NULL,
  `servico_descricao` tinytext DEFAULT NULL,
  `servico_ativo` tinyint(1) DEFAULT NULL,
  `servico_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`servico_id`, `servico_nome`, `servico_preco`, `servico_descricao`, `servico_ativo`, `servico_data_alteracao`) VALUES
(1, 'Reparos de painéis solares', '899,99', 'Reparos em painéis solares de todas as marcas', 1, '2021-03-24 13:15:37'),
(3, 'Reparo em peças em geral', '152,00', 'Restauração de componentes e peças de diversos tipos', NULL, '2021-03-24 13:13:02'),
(4, 'Serviços de marketing personalizado', '1.524,00', 'Serviços de personalização de marca e todo serviço de marketing da empresa', 1, '2021-03-24 13:40:15'),
(5, 'Reparos em inversores', '750,00', 'Reparo de todos os tipos e marcas de inversores, nacionais ou importados', 0, '2021-03-24 13:41:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sistema`
--

CREATE TABLE `sistema` (
  `sistema_id` int(11) NOT NULL,
  `sistema_razao_social` varchar(145) DEFAULT NULL,
  `sistema_nome_fantasia` varchar(145) DEFAULT NULL,
  `sistema_cnpj` varchar(25) DEFAULT NULL,
  `sistema_ie` varchar(25) DEFAULT NULL,
  `sistema_telefone_fixo` varchar(25) DEFAULT NULL,
  `sistema_telefone_movel` varchar(25) NOT NULL,
  `sistema_email` varchar(100) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_cep` varchar(25) DEFAULT NULL,
  `sistema_endereco` varchar(145) DEFAULT NULL,
  `sistema_numero` varchar(25) DEFAULT NULL,
  `sistema_cidade` varchar(45) DEFAULT NULL,
  `sistema_estado` varchar(2) DEFAULT NULL,
  `sistema_txt_ordem_servico` tinytext DEFAULT NULL,
  `sistema_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_txt_ordem_servico`, `sistema_data_alteracao`) VALUES
(1, 'Engemetal Comercio e Manutencao LTDA', 'Bluesun Solar do Brasil', '10.383.997/0001-60', '', '(19) 3441-4291', '(19) 98364-2927', 'contato@bluesundobrasil.com.br', 'https://bluesundobrasil.com.br/', '13480-309', 'Av. Vitorino Arigone, Jardim Santa Barbara', '450', 'Limeira', 'SP', 'Obrigado pela preferência, a Bluesun Solar do Brasil agradece. Conte sempre conosco!', '2021-03-20 12:56:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$3wgRoE3jvxOnkztMaXQ54eJF53HB5LnFPnNSIthG7ujDsI23rq/iq', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1616179067, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'claumirlopes', '$2y$12$e6cp4hFd32R5hONlVHzr0.JvO04yEsm.rNhRD2sXUMOWqtvy9bKh.', 'claumirlopes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1616154643, 1616768080, 1, 'Claudemir', 'da Silva Lopes', NULL, NULL),
(4, '::1', 'lifreitaslopes', '$2y$10$sLjbhVJFPlr2Jehs41YVAOz/Bwd35QBgV2bxV0lG5WMyX.iwa2KOa', 'lifreitaslopes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1616163236, NULL, 0, 'Eliane', 'Rocha de Freitas Lopes', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(5, 4, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `vendedor_id` int(11) NOT NULL,
  `vendedor_codigo` varchar(10) NOT NULL,
  `vendedor_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `vendedor_nome_completo` varchar(145) NOT NULL,
  `vendedor_cpf` varchar(25) NOT NULL,
  `vendedor_rg` varchar(25) NOT NULL,
  `vendedor_telefone` varchar(15) DEFAULT NULL,
  `vendedor_celular` varchar(15) DEFAULT NULL,
  `vendedor_email` varchar(45) DEFAULT NULL,
  `vendedor_cep` varchar(15) DEFAULT NULL,
  `vendedor_endereco` varchar(45) DEFAULT NULL,
  `vendedor_numero_endereco` varchar(25) DEFAULT NULL,
  `vendedor_complemento` varchar(45) DEFAULT NULL,
  `vendedor_bairro` varchar(45) DEFAULT NULL,
  `vendedor_cidade` varchar(45) DEFAULT NULL,
  `vendedor_estado` varchar(2) DEFAULT NULL,
  `vendedor_ativo` tinyint(1) DEFAULT NULL,
  `vendedor_obs` tinytext DEFAULT NULL,
  `vendedor_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `vendedores`
--

INSERT INTO `vendedores` (`vendedor_id`, `vendedor_codigo`, `vendedor_data_cadastro`, `vendedor_nome_completo`, `vendedor_cpf`, `vendedor_rg`, `vendedor_telefone`, `vendedor_celular`, `vendedor_email`, `vendedor_cep`, `vendedor_endereco`, `vendedor_numero_endereco`, `vendedor_complemento`, `vendedor_bairro`, `vendedor_cidade`, `vendedor_estado`, `vendedor_ativo`, `vendedor_obs`, `vendedor_data_alteracao`) VALUES
(2, '03841956', '2020-01-29 22:22:27', 'Sara Betina Rosalva', '582.071.790-23', '87.789.987-5', '', '(41) 88884-4444', 'sarabr@gmail.com', '80.540-120', 'Rua das vendas', '45', '', 'Centro', 'Joinville', 'SC', 0, '', '2021-03-23 19:54:11'),
(3, '95031476', '2021-03-24 11:20:59', 'Marina Ribeiro da Silva', '311.704.810-35', '12.547.789-2', '(19) 3457-8999', '(19) 98554-4778', 'marina@ribeiro.silva', '13.483-332', 'Rua Guido José Bellon', '254', 'Fundo', 'Parque Residencial Abílio Pedro', 'Limeira', 'SP', 1, 'Vendedor cadastrado somente para testes no sistema da Bluesun', '2021-03-24 11:21:55'),
(4, '27156394', '2021-03-24 11:24:17', 'Mariano de Alencar Ribeiro', '797.272.308-73', '25.458.875-6', '(19) 3556-6554', '(19) 98785-8587', 'mariano@alencar.ribeiro', '13.482-050', 'Rua Francisco Orlando Stocco', '457', 'Fundo', 'Jardim Ouro Verde', 'Limeira', 'SP', 0, 'Mais um vendedor cadastrado para testes no sistema', '2021-03-24 11:24:17');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`conta_pagar_id`),
  ADD KEY `fk_conta_pagar_id_fornecedor` (`conta_pagar_fornecedor_id`);

--
-- Índices de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`conta_receber_id`),
  ADD KEY `fk_conta_receber_id_cliente` (`conta_receber_cliente_id`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`fornecedor_id`);

--
-- Índices de tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marca_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produto_id`),
  ADD KEY `produto_categoria_id` (`produto_categoria_id`,`produto_marca_id`,`produto_fornecedor_id`),
  ADD KEY `fk_produto_marca_id` (`produto_marca_id`),
  ADD KEY `fk_produto_forncedor_id` (`produto_fornecedor_id`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`servico_id`);

--
-- Índices de tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`sistema_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices de tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Índices de tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`vendedor_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `conta_receber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `sistema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `vendedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD CONSTRAINT `fk_conta_pagar_id_fornecedor` FOREIGN KEY (`conta_pagar_fornecedor_id`) REFERENCES `fornecedores` (`fornecedor_id`);

--
-- Restrições para tabelas `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD CONSTRAINT `fk_conta_receber_id_cliente` FOREIGN KEY (`conta_receber_cliente_id`) REFERENCES `clientes` (`cliente_id`);

--
-- Restrições para tabelas `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
