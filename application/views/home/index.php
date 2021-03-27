
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
                            <li class="active" style="color: #47AA0B;">Home</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="content mt-3">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title" v-if="headerText">Avisos da Plataforma</strong>
                </div>

                <div class="card-body">
                    <div class="typo-headers">
                        <h6 class="pb-2 display-5">Colaborador, seja bem vindo ao painel administrativo da Bluesun Solar do Brasil</h6>
                    </div><hr/>
                    
                    <style>
                        .notifica {
                            color: #ffffff;
                            text-align: justify;
                        }
                        .notifica a {
                            color: #FFFF00;
                        }
                        .notifica a:hover {
                            color: #fff;
                        }
                    </style>

                    <div class="col-sm-12 notifica">
                        <div class="alert fade show bg-danger" role="alert">
                            <span class="badge badge-pill badge-light" style="font-size: 1.1em;">Notificação: </span>&nbsp;<span style="font-size: 1.1em;font-weight: 400;"><?php echo word_limiter('Aviso de exemplo de mensagem de atenção para os recados da nova forma plataforma da Bluesum Solar do Brasil. Aviso de exemplo de mensagem de atenção para os recados da nova forma plataforma da Bluesum Solar do Brasil. Aviso de exemplo de mensagem de atenção para os recados da nova forma plataforma da Bluesum Solar do Brasil. Aviso de exemplo de mensagem de atenção para os recados da nova forma plataforma da Bluesum Solar do Brasil. Aviso de exemplo de mensagem de atenção para os recados da nova forma plataforma da Bluesum Solar do Brasil. Aviso de exemplo de mensagem de atenção para os recados da nova forma plataforma da Bluesum Solar do Brasil.', 65) ?> <a href="#">Saiba Mais</a></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        