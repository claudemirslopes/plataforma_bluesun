
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
                            <li><a href="#">Financeiro</a></li>
<!--                            <li><a href="#">Contas a Receber</a></li>-->
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
                    <strong class="card-title" v-if="headerText">Contas a Receber</strong>
                    <a title="Cadastrar nova conta a receber" href="<?php echo base_url('contas_receber/add'); ?>" class="btn btn-success btn-sm float-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nova conta a receber</a>
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
                
                <!-- Mensagem de info -->
                <?php if ($message = $this->session->flashdata('info')): ?>
                    <div class="alert  alert-warning alert-dismissible fade show " role="alert">
                        <span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;&nbsp;Advertência</span>&nbsp;&nbsp;
                         <?php echo $message; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- Mensagem de info -->
                
                <div class="card-body">
                   <table class="bootstrap-data-table-export table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Cliente</th>
                                <th>Valor</th>
                                <th class="text-center">Data Venc.</th>
                                <th class="text-center">Data Pagam.</th>
                                <th class="text-center">Situação</th>
                                <th class="text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contas_receber as $conta_receber): ?>
                            <tr>
                                <td class="text-center"><?php echo $conta_receber->conta_receber_id; ?></td>
                                <td>
                                    <?php echo ($conta_receber->pessoa == 1 ? $conta_receber->cliente.'&nbsp;'.$conta_receber->cliente_sobrenome : $conta_receber->cliente); ?>
                                </td>
                                <td><?php echo ('R$ '.$conta_receber->conta_receber_valor); ?></td>
                                <td class="text-center pr-4"><?php echo formata_data_banco_sem_hora($conta_receber->conta_receber_data_vencimento); ?></td>
                                <td class="text-center pr-4"><?php echo ($conta_receber->conta_receber_status == 1 ? formata_data_banco_com_hora($conta_receber->conta_receber_data_pagamento) : 'Aguardando pagamento'); ?></td>
                                <td class="text-center pr-4">
                                    <?php
                                        if ($conta_receber->conta_receber_status == 1) {
                                            echo '<span class="badge badge-success btn-sm">Paga</span>';
                                        } elseif (strtotime($conta_receber->conta_receber_data_vencimento) > strtotime(date('Y-m-d'))) {
                                            echo '<span class="badge badge-secondary btn-sm">Pendente</span>';
                                        } elseif (strtotime($conta_receber->conta_receber_data_vencimento) == strtotime(date('Y-m-d'))) {
                                            echo '<span class="badge badge-warning btn-sm">Vence hoje</span>';
                                        } else {
                                            echo '<span class="badge badge-danger btn-sm">Vencida</span>';
                                        }
                                    ?>
                                </td>
                                <td class="text-right">
                                    <style>
                                        .btn-danger {
                                            background: #B40404;
                                            border: solid 1px #B40404;
                                        }
                                        .btn-primary {
                                            background: #0B3861;
                                            border: solid 1px #0B3861;
                                        }
                                    </style>
                                    <a href="<?php echo base_url('contas_receber/edit/'.$conta_receber->conta_receber_id); ?>" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript(void)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#conta_receber-<?php echo $conta_receber->conta_receber_id; ?>" title="Excluír"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            
                            <div class="modal fade" id="conta_receber-<?php echo $conta_receber->conta_receber_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticModalLabel">Excluír conta?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Deseja mesmo excluír esta conta?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                            <a href="<?php echo base_url('contas_receber/del/'.$conta_receber->conta_receber_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
