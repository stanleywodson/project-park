<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.html">
                            <!-- <div class="logo-img">
                               <img src="src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> 
                            </div> -->
                            <span class="text">ThemeKit</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Paking Now</div>
                                <div class="nav-item active">
                                    <a href="<?= base_url()?>"><i class="ik ik-home"></i><span>Home</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="pages/navbar.html"><i class="fas fa-users"></i><span>Mensalistas</span></a>
                                </div>

                                <div class="nav-lavel">Administração</div>

								<div class="nav-item">
									<a href="<?= site_url('pricing')?>" data-toggle="tooltip" data-placement="bottom" title="Gerenciar Preços" aria-current="page"><i class="ik ik-dollar-sign"></i><span>Preços</span></a>
								</div>
                                <div class="nav-item">
                                    <a href="<?= site_url('users')?>" data-toggle="tooltip" data-placement="bottom" title="Gerenciar Usuários" aria-current="page"><i class="ik ik-users"></i><span>Usuários</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="<?= site_url('sistem')?>" data-toggle="tooltip" data-placement="bottom" title="Gerenciar Sistema" aria-current="page"><i class="ik ik-settings"></i><span>Sistema</span></a>
                                </div>
								<div class="nav-item">
									<a href="<?= site_url('payments')?>" data-toggle="tooltip" data-placement="bottom" title="Gerenciar Formas de Pagamento" aria-current="page"><i class="ik ik-"></i><span>Pagamentos</span></a>
								</div>
                            </nav>
                        </div>
                    </div>
                </div>
