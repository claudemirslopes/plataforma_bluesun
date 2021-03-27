
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
                    <strong class="card-title" v-if="headerText">Produtos</strong>
                    <a title="Cadastrar novo produto" href="<?php echo base_url('produtos/add'); ?>" class="btn btn-success btn-sm float-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Novo produto</a>
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
                    <table class="bootstrap-data-table-export table table-striped table-bordered">
                       <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Descrição</th>
                                <th>Marca</th>
                                <th>Fornecedor</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th class="text-center">Est. Mín.</th>
                                <th class="text-center">Qtde</th>
                                <th class="text-center">Ativo</th>
                                <th class="text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td class="text-center"><?php echo $produto->produto_id; ?></td>
                                <td><?php echo $produto->produto_descricao; ?></td>
                                <td><?php echo $produto->marca; ?></td>
                                <td><?php echo $produto->fornecedor; ?></td>
                                <td><?php echo $produto->categoria; ?></td>
                                <td><?php echo ('R$ '.$produto->produto_preco_venda); ?></td>
                                <td class="text-center pr-4"><?php echo '<span class="badge badge-dark btn-sm">'.$produto->produto_estoque_minimo.'</span>'; ?></td>
                                <td class="text-center pr-4">
                                    <?php 
                                        if ($produto->produto_estoque_minimo < $produto->produto_qtde_estoque){
                                            echo '<span class="badge badge-info btn-sm">'.$produto->produto_qtde_estoque.'</span>';
                                        }
                                        elseif ($produto->produto_estoque_minimo > $produto->produto_qtde_estoque){
                                            echo '<span class="badge badge-danger btn-sm">'.$produto->produto_qtde_estoque.'</span>';
                                        }
                                        else {
                                            echo '<span class="badge badge-warning btn-sm">'.$produto->produto_qtde_estoque.'</span>';
                                        }
                                    ?>
                                </td>
                                <td class="text-center pr-4">
                                    <?php echo $produto->produto_ativo == 1 ? '<span class="badge badge-success btn-sm">Sim</span>' : '<span class="badge badge-secondary btn-sm">Não</span>' ?>
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
                                    <a href="<?php echo base_url('produtos/edit/'.$produto->produto_id); ?>" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript(void)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#produto-<?php echo $produto->produto_id; ?>" title="Excluír"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            
                            <div class="modal fade" id="produto-<?php echo $produto->produto_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticModalLabel">Excluír produto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Deseja mesmo excluír este produto?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                            <a href="<?php echo base_url('produtos/del/'.$produto->produto_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="text-left mt-4 small" style="color: #555;"><strong><span style="font-weight: bold;color: red;font-size: 1.5em;">*&nbsp;</span>Legenda:&nbsp;</strong><span style="color: #383d44;">[Refere-se a quantidade em estoque]</span>&nbsp;
                        <span class="badge badge-info btn-sm">&nbsp;</span> Acima do estoque mínimo
                        <span class="badge badge-warning btn-sm">&nbsp;</span>  Igual ao estoque mínimo
                        <span class="badge badge-danger btn-sm">&nbsp;</span> Abaixo do estoque mínimo
                   </div>
                    
                    
                </div>
                
                   

            </div>

        </div>
