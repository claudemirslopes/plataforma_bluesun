    <!-- PARRA LATERAL - SIDEBAR -->
    <?php $this->load->view('layout/sidebar') ?>
    <!-- PARRA LATERAL - SIDEBAR -->

    <!-- BARRA DIREITA -->

    <div id="right-panel" class="right-panel">

        <!-- BARRA SUPERIOR - NAVBAR -->
        <?php $this->load->view('layout/navbar') ?>
        <!-- BARRA SUPERIOR - NAVBAR -->

        <!-- MAIN CONTENT - CONTEÚDO PRINCIPAL -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 1.2em;">Plataforma Administrativa</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('/'); ?>" style="color: #47AA0B;">Home</a></li>
                            <li><a href="#">Cadastros</a></li>
                            <li><a href="#">Estoque</a></li>
                            <li><a href="<?php echo base_url('produtos'); ?>">Produtos</a></li>
                            <li class="active"><?php echo $titulo; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="content mt-3">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title" v-if="headerText">Editar Produto</strong>
                    <span class="float-right" style="color: #777;font-size: .9em;">
                        <strong><i class="fa fa-clock-o"></i>&nbsp;&nbsp;Última alteração: </strong><?php echo formata_data_banco_com_hora($produto->produto_data_alteracao); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a title="Voltar" href="<?php echo base_url('produtos'); ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Voltar</a>
                    </span>
                </div>
                
                <!-- Mensagem de sucesso -->
                <?php if ($message = $this->session->flashdata('sucesso')): ?>
                    <div class="alert  alert-success alert-dismissible fade show " role="alert">
                        <span class="badge badge-pill badge-success"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;&nbsp;Sucesso</span>&nbsp;&nbsp;
                         <?php echo $message; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- Mensagem de sucesso -->
                
                <!-- Mensagem de erro -->
                <?php if ($message = $this->session->flashdata('error')): ?>
                    <div class="alert  alert-danger alert-dismissible fade show " role="alert">
                        <span class="badge badge-pill badge-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;&nbsp;Atenção</span>&nbsp;&nbsp;
                         <?php echo $message; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- Mensagem de erro -->
                
                <div class="card-body">
                    <form method="post" name="form_edit" class="user">
                        
                        <fieldset class="border p-2" style="margin-top: -10px;">
                            <legend class="font-small"><i class="fa fa-th-list"></i> Dados principais</legend>
                            
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="produto_codigo">Código <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="produto_codigo" class="form-control form-control-user bg-light" id="produto_codigo" value="<?php echo $produto->produto_codigo; ?>" readonly="">
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="produto_descricao">Descrição do Produto <span style="color: red;font-weight: bold;">*</span></label> 
                                    <input type="text" name="produto_descricao" class="form-control form-control-user" id="produto_descricao" placeholder="Descrição" value="<?php echo $produto->produto_descricao; ?>">
                                    <?php echo form_error('produto_descricao', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="produto_marca_id">Marca <span style="color: red;font-weight: bold;">*</span></label>
                                    <select name="produto_marca_id" class="form-control custom-select" id="produto_marca_id">
                                        <?php foreach($marcas as $marca): ?>
                                        <option value="<?php echo $marca->marca_id ?>" <?php echo ($marca->marca_id == $produto->produto_marca_id ? 'selected' : ''); ?>><?php echo $marca->marca_nome; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                    <!<!-- Outra forma de não escolher os desabilitados -->
                                    <!--<option title="<?php echo ($marca->marca_ativa == 0 ? 'Não pode ser escolhida' : 'Marca Ativa'); ?>"
                                    value="<?php echo $marca->marca_id ?>" 
                                        <?php echo ($marca->marca_id == $produto->produto_marca_id ? 'selected' : ''); ?> 
                                            <?php echo ($marca->marca_ativa == 0 ? 'disabled' : ''); ?>>
                                                <?php echo ($marca->marca_ativa == 0 ? $marca->marca_nome.' -> Inativa' : $marca->marca_nome); ?>
                                    </option>-->
                                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="produto_fornecedor_id">Fornecedor <span style="color: red;font-weight: bold;">*</span></label> 
                                    <select name="produto_fornecedor_id" class="form-control custom-select" id="produto_fornecedor_id">
                                        <?php foreach($fornecedores as $fornecedor): ?>
                                        <option value="<?php echo $fornecedor->fornecedor_id ?>" <?php echo ($fornecedor->fornecedor_id == $produto->produto_fornecedor_id ? 'selected' : ''); ?>><?php echo $fornecedor->fornecedor_nome_fantasia ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="produto_categoria_id">Categoria <span style="color: red;font-weight: bold;">*</span></label> 
                                    <select name="produto_categoria_id" class="form-control custom-select" id="produto_categoria_id">
                                        <?php foreach($categorias as $categoria): ?>
                                        <option value="<?php echo $categoria->categoria_id ?>" <?php echo ($categoria->categoria_id == $produto->produto_categoria_id ? 'selected' : ''); ?>><?php echo $categoria->categoria_nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </fieldset>
                        
                        <fieldset class="mt-2 border p-2">
                            <legend class="font-small"><i class="fa fa-th-list"></i> Outras informações</legend>
                            
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="produto_unidade">Unidade <span style="color: red;font-weight: bold;">*</span></label> 
                                    <input type="text" name="produto_unidade" class="form-control form-control-user" id="produto_unidade" placeholder="Unidade, Kilo, Grama, etc..." value="<?php echo $produto->produto_unidade; ?>">
                                    <?php echo form_error('produto_unidade', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="produto_ncm">NCM <small style="color: #777;">(Nomenclatura Comum do Mercosul)</small></label> 
                                    <input type="text" name="produto_ncm" class="form-control form-control-user" id="produto_ncm" placeholder="NCM" value="<?php echo $produto->produto_ncm; ?>">
                                    <?php echo form_error('produto_ncm', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="produto_preco_custo">Preço custo <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="produto_preco_custo" class="form-control form-control-user money" id="produto_preco_custo" placeholder="Ex: 99,99" value="<?php echo $produto->produto_preco_custo; ?>">
                                    <?php echo form_error('produto_preco_custo', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="produto_preco_venda">Preço venda <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="produto_preco_venda" class="form-control form-control-user money" id="produto_preco_venda" placeholder="Ex: 99,99" value="<?php echo $produto->produto_preco_venda; ?>">
                                    <?php echo form_error('produto_preco_venda', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="produto_codigo_barras">Código de Barras</label> 
                                    <input type="text" name="produto_codigo_barras" class="form-control form-control-user" id="produto_codigo_barras" placeholder="Código de Barras" value="<?php echo $produto->produto_codigo_barras; ?>" readonly="">
                                    <?php echo form_error('produto_codigo_barras', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="produto_estoque_minimo">Est. mínimo <span style="color: red;font-weight: bold;">*</span></label> 
                                    <input type="number" name="produto_estoque_minimo" class="form-control form-control-user" id="produto_estoque_minimo" placeholder="Estoque Mínimo" value="<?php echo $produto->produto_estoque_minimo; ?>">
                                    <?php echo form_error('produto_estoque_minimo', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="produto_qtde_estoque">Qtde estoque <span style="color: red;font-weight: bold;">*</span></label> 
                                    <input type="number" name="produto_qtde_estoque" class="form-control form-control-user" id="produto_qtde_estoque" placeholder="Qtde Estoque" value="<?php echo $produto->produto_qtde_estoque; ?>">
                                    <?php echo form_error('produto_qtde_estoque', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="produto_ativo">Ativo <span style="color: red;font-weight: bold;">*</span></label>
                                    <select name="produto_ativo" class="form-control custom-select" id="produto_ativo">
                                        <option value="0" <?php echo ($produto->produto_ativo == 0) ? 'selected' : ''; ?>>Não</option>
                                        <option value="1" <?php echo ($produto->produto_ativo == 1) ? 'selected' : ''; ?>>Sim</option>
                                    </select>
                                </div>
                            </div>
                            
                        </fieldset>
                        
                        <fieldset class="mt-2 border p-2">
                            <legend class="font-small"><i class="fa fa-sticky-note"></i> Observação</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea name="produto_obs" rows="3" class="form-control form-control-user" id="produto_obs" placeholder="Observação"><?php echo $produto->produto_obs; ?></textarea>
                                    <?php echo form_error('produto_obs', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                        </fieldset>
                        
                        <input type="hidden" name="produto_id" value="<?php echo $produto->produto_id; ?>">
                        <button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar produto</button>
                    </form>
                </div>

            </div>

        </div>
