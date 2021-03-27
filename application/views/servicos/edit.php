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
                            <li><a href="<?php echo base_url('servicos'); ?>">Serviços</a></li>
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
                    <strong class="card-title" v-if="headerText">Editar Serviço</strong>
                    <span class="float-right" style="color: #777;font-size: .9em;">
                        <strong><i class="fa fa-clock-o"></i>&nbsp;&nbsp;Última alteração: </strong><?php echo formata_data_banco_com_hora($servico->servico_data_alteracao); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a title="Voltar" href="<?php echo base_url('servicos'); ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Voltar</a>
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
                            <legend class="font-small"><i class="fa fa-th-list"></i> Dados do serviço</legend>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="servico_nome">Nome do Serviço <span style="color: red;font-weight: bold;">*</span></label> 
                                    <input type="text" name="servico_nome" class="form-control form-control-user" id="servico_nome" placeholder="Serviço" value="<?php echo $servico->servico_nome; ?>">
                                    <?php echo form_error('servico_nome', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="servico_preco">Preço <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="servico_preco" class="form-control form-control-user money" id="servico_preco" placeholder="Ex: 99,99" value="<?php echo $servico->servico_preco; ?>">
                                    <?php echo form_error('servico_preco', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="servico_ativo">Ativo <span style="color: red;font-weight: bold;">*</span></label>
                                    <select name="servico_ativo" class="form-control custom-select" id="servico_ativo">
                                        <option value="0" <?php echo ($servico->servico_ativo == 0) ? 'selected' : ''; ?>>Não</option>
                                        <option value="1" <?php echo ($servico->servico_ativo == 1) ? 'selected' : ''; ?>>Sim</option>
                                    </select>
                                </div>
                            </div>

                        </fieldset>
                        
                        <fieldset class="mt-2 border p-2">
                            <legend class="font-small"><i class="fa fa-sticky-note"></i> Descrição</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea name="servico_descricao" rows="3" class="form-control form-control-user" id="servico_descricao" placeholder="Descrição"><?php echo $servico->servico_descricao ?></textarea>
                                    <?php echo form_error('servico_descricao', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                        </fieldset>
                        
                        <input type="hidden" name="servico_id" value="<?php echo $servico->servico_id; ?>">
                        <button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar servico</button>
                    </form>
                </div>

            </div>

        </div>
