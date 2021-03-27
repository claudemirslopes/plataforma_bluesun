
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
                            <li><a href="">Ferramentas</a></li>
                            <li><a href="">Configuração</a></li>
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
                    <strong class="card-title" v-if="headerText">Configuração do Sistema</strong>
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="sistema_razao_social">Razão Social <span style="color: red;font-weight: bold;">*</span></label>
                                <input type="text" name="sistema_razao_social" class="form-control form-control-user" id="sistema_razao_social" placeholder="Razão Social" value="<?php echo $sistema->sistema_razao_social ?>">
                                <?php echo form_error('sistema_razao_social', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sistema_nome_fantasia">Nome Fantasia <span style="color: red;font-weight: bold;">*</span></label>
                                <input type="text" name="sistema_nome_fantasia" class="form-control form-control-user" id="sistema_nome_fantasia" placeholder="Nome Fantasia" value="<?php echo $sistema->sistema_nome_fantasia ?>">
                                <?php echo form_error('sistema_nome_fantasia', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="sistema_cnpj">CNPJ <span style="color: red;font-weight: bold;">*</span></label>
                                <input type="text" name="sistema_cnpj" class="form-control form-control-user cnpjmask" id="sistema_cnpj" placeholder="CNPJ" value="<?php echo $sistema->sistema_cnpj ?>">
                                <?php echo form_error('sistema_cnpj', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sistema_ie">Inscrição Estadual</label>
                                <input type="text" name="sistema_ie" class="form-control form-control-user" id="sistema_ie" placeholder="Inscição Estadual" value="<?php echo $sistema->sistema_ie ?>">
                                <?php echo form_error('sistema_ie', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sistema_telefone_fixo">Telefone Fixo <span style="color: red;font-weight: bold;">*</span></label>
                                <input type="text" name="sistema_telefone_fixo" class="form-control form-control-user telefone" id="sistema_telefone_fixo" placeholder="Telefone Fixo" value="<?php echo $sistema->sistema_telefone_fixo ?>">
                                <?php echo form_error('sistema_telefone_fixo', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sistema_telefone_movel">Telefone Móvel <span style="color: red;font-weight: bold;">*</span></label>
                                <input type="text" name="sistema_telefone_movel" class="form-control form-control-user celular" id="sistema_telefone_movel" placeholder="Telefone mòvel" value="<?php echo $sistema->sistema_telefone_movel ?>">
                                <?php echo form_error('sistema_telefone_movel', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="sistema_email">E-mail de contato <span style="color: red;font-weight: bold;">*</span></label>
                                <input type="text" name="sistema_email" class="form-control form-control-user" id="sistema_email" placeholder="E-mail" value="<?php echo $sistema->sistema_email ?>">
                                <?php echo form_error('sistema_email', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="sistema_site_url">Site da empresa <span style="color: red;font-weight: bold;">*</span></label>
                                <input type="text" name="sistema_site_url" class="form-control form-control-user" id="sistema_site_url" placeholder="URL do site" value="<?php echo $sistema->sistema_site_url ?>">
                                <?php echo form_error('sistema_site_url', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sistema_cep">CEP</label>
                                <input type="text" name="sistema_cep" class="form-control form-control-user cep" id="sistema_cep" placeholder="CEP" value="<?php echo $sistema->sistema_cep ?>">
                                <?php echo form_error('sistema_cep', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="sistema_endereco">Endereço <span style="color: red;font-weight: bold;">*</span></label>
                                <input type="text" name="sistema_endereco" class="form-control form-control-user" id="sistema_endereco" placeholder="Logradouro, rua, etc..." value="<?php echo $sistema->sistema_endereco ?>">
                                <?php echo form_error('sistema_endereco', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="sistema_numero">Nº</label>
                                <input type="text" name="sistema_numero" maxlength="5" class="form-control form-control-user" id="sistema_numero" placeholder="nº" value="<?php echo $sistema->sistema_numero ?>">
                                <?php echo form_error('sistema_numero', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sistema_cidade">Cidade <span style="color: red;font-weight: bold;">*</span></label>
                                <input type="text" name="sistema_cidade" class="form-control form-control-user" id="sistema_cidade" placeholder="Cidade" value="<?php echo $sistema->sistema_cidade ?>">
                                <?php echo form_error('sistema_cidade', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="sistema_estado">UF <span style="color: red;font-weight: bold;">*</span></label>
                                <select name="sistema_estado" class="form-control custom-select" id="sistema_estado" placeholder="Estado">
                                    <option value="<?php echo $sistema->sistema_estado ?>"><?php echo $sistema->sistema_estado ?></option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>   
                                <?php echo form_error('sistema_estado', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="sistema_txt_ordem_servico">Texto ao cliente (Bluesun Solar)</label>
                                <textarea name="sistema_txt_ordem_servico" rows="3" class="form-control form-control-user" id="sistema_txt_ordem_servico" placeholder="Sistema Bluesun (Orçamento)"><?php echo $sistema->sistema_txt_ordem_servico ?></textarea>
                                <?php echo form_error('sistema_txt_ordem_servico', '<small class="form-text text-danger">','</small>') ?>
                            </div>
                        </div>

                        <!--<input type="hidden" name="sistema_id" value="<?php echo $sistema->sistema_id; ?>">-->
                        <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar sistema</button>
                    </form>
                </div>

            </div>

        </div>
