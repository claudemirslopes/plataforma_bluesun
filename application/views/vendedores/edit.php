<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
    <script>
    $(document).ready(function() {
        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }       
        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {
            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
                    //Preenche os campos com "carregando..." enquanto consulta webservice.
                    $("#rua").val("carregando...");
                    $("#bairro").val("carregando...");
                    $("#cidade").val("carregando...");
                    $("#uf").val("carregando...");
                    $("#ibge").val("carregando...");
                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
    </script>
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
                            <li><a href="#">Pessoas</a></li>
                            <li><a href="<?php echo base_url('vendedores'); ?>">Vendedores</a></li>
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
                    <strong class="card-title" v-if="headerText">Editar Vendedor</strong>
                    <span class="float-right" style="color: #777;font-size: .9em;">
                        <strong><i class="fa fa-clock-o"></i>&nbsp;&nbsp;Última alteração: </strong><?php echo formata_data_banco_com_hora($vendedor->vendedor_data_alteracao); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a title="Voltar" href="<?php echo base_url('vendedores'); ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Voltar</a>
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
                            <legend class="font-small"><i class="fa fa-cogs"></i> Configurações</legend>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="vendedor_codigo">Matrícula <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="vendedor_codigo" class="form-control form-control-user bg-light" id="vendedor_codigo" placeholder="Matrícula" value="<?php echo $vendedor->vendedor_codigo; ?>" readonly="">
                                    <?php echo form_error('vendedor_codigo', '<small class="form-text text-danger">','</small>') ?>                              
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="vendedor_cpf">CPF <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="vendedor_cpf" class="form-control form-control-user cpfmask" id="vendedor_cpf" placeholder="CPF" value="<?php echo $vendedor->vendedor_cpf; ?>">
                                    <?php echo form_error('vendedor_cpf', '<small class="form-text text-danger">','</small>') ?>                              
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="vendedor_rg">RG</label>
                                    <input type="text" name="vendedor_rg" class="form-control form-control-user" id="vendedor_rg" placeholder="RG" value="<?php echo $vendedor->vendedor_rg; ?>">
                                    <?php echo form_error('vendedor_rg', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="vendedor_ativo">Ativo <span style="color: red;font-weight: bold;">*</span></label>
                                    <select name="vendedor_ativo" class="form-control custom-select" id="vendedor_ativo">
                                        <option value="0" <?php echo ($vendedor->vendedor_ativo == 0) ? 'selected' : ''; ?>>Não</option>
                                        <option value="1" <?php echo ($vendedor->vendedor_ativo == 1) ? 'selected' : ''; ?>>Sim</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="mt-2 border p-2">
                            <legend class="font-small"><i class="fa fa-user-circle-o"></i> Dados Pessoais</legend>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="vendedor_nome_completo">Nome completo <span style="color: red;font-weight: bold;">*</span></label> 
                                    <input type="text" name="vendedor_nome_completo" class="form-control form-control-user" id="vendedor_nome_completo" placeholder="Nome completo" value="<?php echo $vendedor->vendedor_nome_completo; ?>">
                                    <?php echo form_error('vendedor_nome_completo', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="vendedor_email">E-mail <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="email" name="vendedor_email" class="form-control form-control-user" id="vendedor_email" placeholder="E-mail" value="<?php echo $vendedor->vendedor_email; ?>">
                                    <?php echo form_error('vendedor_email', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="vendedor_telefone">Telefone</label>
                                    <input type="text" name="vendedor_telefone" class="form-control form-control-user telefone" id="vendedor_telefone" placeholder="Telefone Fixo" value="<?php echo $vendedor->vendedor_telefone; ?>">
                                    <?php echo form_error('vendedor_telefone', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="vendedor_celular">Celular <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="vendedor_celular" class="form-control form-control-user celular" id="vendedor_celular" placeholder="Celular" value="<?php echo $vendedor->vendedor_celular; ?>">
                                    <?php echo form_error('vendedor_celular', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="mt-2 border p-2">
                            <legend class="font-small"><i class="fa fa-map-marker"></i> Informações de Endereço</legend>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="vendedor_cep">CEP <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="vendedor_cep" class="form-control form-control-user cep" id="cep" placeholder="CEP" value="<?php echo $vendedor->vendedor_cep; ?>">
                                    <?php echo form_error('vendedor_cep', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="vendedor_endereco">Endereço <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="vendedor_endereco" class="form-control form-control-user" id="rua" placeholder="Logradouro, rua, etc..." value="<?php echo $vendedor->vendedor_endereco; ?>">
                                    <?php echo form_error('vendedor_endereco', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="vendedor_numero_endereco">Nº</label>
                                    <input type="text" name="vendedor_numero_endereco" class="form-control form-control-user" id="numero" placeholder="nº" value="<?php echo $vendedor->vendedor_numero_endereco; ?>">
                                    <?php echo form_error('vendedor_numero_endereco', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="vendedor_complemento">Complemento</label>
                                    <input type="text" name="vendedor_complemento" class="form-control form-control-user" id="complemento" placeholder="Complemento" value="<?php echo $vendedor->vendedor_complemento; ?>">
                                    <?php echo form_error('vendedor_complemento', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="vendedor_bairro">Bairro <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="vendedor_bairro" class="form-control form-control-user" id="bairro" placeholder="Bairro" value="<?php echo $vendedor->vendedor_bairro; ?>">
                                    <?php echo form_error('vendedor_bairro', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="vendedor_cidade">Cidade <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="vendedor_cidade" class="form-control form-control-user" id="cidade" placeholder="Cidade" value="<?php echo $vendedor->vendedor_cidade; ?>">
                                    <?php echo form_error('vendedor_cidade', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="vendedor_estado">UF <span style="color: red;font-weight: bold;">*</span></label>
                                    <select name="vendedor_estado" class="form-control custom-select" id="uf">
                                        <option value="<?php echo $vendedor->vendedor_estado ?>"><?php echo $vendedor->vendedor_estado; ?></option>
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
                                    <?php echo form_error('vendedor_estado', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="mt-2 border p-2">
                            <legend class="font-small"><i class="fa fa-sticky-note"></i> Observação</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea name="vendedor_obs" rows="3" class="form-control form-control-user" id="vendedor_obs" placeholder="Observação"><?php echo $vendedor->vendedor_obs ?></textarea>
                                    <?php echo form_error('vendedor_obs', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                        </fieldset>
                        
                        <input type="hidden" name="vendedor_id" value="<?php echo $vendedor->vendedor_id; ?>">
                        <button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar vendedor</button>
                    </form>
                </div>

            </div>

        </div>
