        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar..." aria-label="Pesquisar">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">Você tem 5  novas notificações</p>
                                <a class="dropdown-item media bg-flat-color-danger" href="#">
                                <i class="fa fa-check"></i>
                                <p>#1 informaçao importante.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-success" href="#">
                                <i class="fa fa-info"></i>
                                <p>#2 informações de alertas.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-info" href="#">
                                <i class="fa fa-warning"></i>
                                <p>#2 informações em atenção.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-light" href="notificacoes.php">
                                <span class="message media-body text-center" style="font-weight: bold;">Ver todas</span>
                            </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">Você tem 4 e-mails não lidos</p>
                                <a class="dropdown-item media bg-flat-color-dark" href="#">
                                <span class="photo media-left"><img alt="avatar" src="<?php echo base_url('public/images/avatar/avatar2.jpg'); ?>"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Claudemir Lopes</span>
                                    <span class="time float-right">Há 2 min</span>
                                        <p>Configurações do sistema</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-info" href="#">
                                <span class="photo media-left"><img alt="avatar" src="<?php echo base_url('public/images/avatar/avatar.jpg'); ?>"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Eliane Rocha</span>
                                    <span class="time float-right">Há 5 min</span>
                                        <p>Hospedagem da plataforma</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-warning" href="#">
                                <span class="photo media-left"><img alt="avatar" src="<?php echo base_url('public/images/avatar/avatar3.png'); ?>"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Luiz Roberto Cerol</span>
                                    <span class="time float-right">Há 10 min</span>
                                        <p>Sobre o script de PHP</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-info" href="#">
                                <span class="photo media-left"><img alt="avatar" src="<?php echo base_url('public/images/avatar/4.jpg'); ?>"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Raquel Santos</span>
                                    <span class="time float-right">Há 15 min</span>
                                        <p>Página não está abrindo</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-light" href="email_entrada.php">
                                <span class="message media-body text-center" style="font-weight: bold;">Ver todos</span>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url('public/images/no-avatar.png'); ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Meu Perfil</a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Configurações</a>

                            <a class="nav-link" href="#" data-toggle="modal" data-target="#staticModal"><i class="fa fa-sign-out"></i> Sair</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-br"></i>
                        </a>
                    </div>

                </div>

                <!-- INÍCIO MODAL LOGOUT -->
                <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Sair do sistema</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Deseja mesmo encerrar a sessão?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Não</button>
                                <a class="btn btn-danger btn-sm" href="<?php echo base_url('login/logout'); ?>" role="button">Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM MODAL LOGOUT -->

            </div>

        </header><!-- /header -->
        <!-- Header-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: -5px;margin-bottom: 1px;background: #fcfcfc;color: #333;border-bottom: solid 1px #eee;border-top: solid 1px #ccc;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" id="prr" style="margin-left: 15px;">
                <li class="nav-item active">
                    <a class="nav-link" href="#" style="font-size: .9em;"><i class="ti-write" style="fon-size: 1em;"></i>&nbsp;Pedidos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" style="font-size: .9em;"><i class="ti-list" style="fon-size: 1em;"></i>&nbsp;Ordem&nbsp;de&nbsp;Serviço</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" style="font-size: .9em;"><i class="ti-pin-alt" style="fon-size: 1em;"></i>&nbsp;Estimativa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" style="font-size: .9em;"><i class="ti-layout-grid3" style="fon-size: 1em;"></i>&nbsp;Projetos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" style="font-size: .9em;"><i class="ti-layout-media-left-alt" style="fon-size: 1em;"></i>&nbsp;Controle</a>
                </li>
              </ul>
            </div>            
        </nav>  