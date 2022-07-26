<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<?php $this->load->view('layout/navbar') ?>

<div class="page-wrap">

    <?php $this->load->view('layout/sidebar') ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-user bg-blue"></i>
                            <div class="d-inline">
                                <h5><?= (isset($title) ? $title : '') ?></h5>
                                <span><?= (isset($subtitle) ? $subtitle : '') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?= base_url() ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Listar" href="<?= base_url('/users') ?>">Usuários Cadastrados</a>
                                </li>
                                <li class="breadcrumb-item active" data-toggle="tooltip" data-placement="bottom" title="Editar" aria-current="page"><?= (isset($title) ? $title : '') ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?= (isset($user) ? 'Última alteração - ' . formata_data_banco_sem_hora($user->alter_last) : '') ?>
                        </div>
                        <div class="card-body">
                            <form class="forms-sample" name="form_core" method="POST">

                                <div class="form-group row">
                                    <div class="col-md-6 mb-20">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="first_name" value="<?= (isset($user) ? $user->first_name : set_value('first_name')) ?>">
                                        <?= form_error('first_name', '<div class="text-danger">','</div>')?>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" name="last_name" value="<?= (isset($user) ? $user->last_name : set_value('last_name')) ?>">
                                        <?= form_error('last_name', '<div class="text-danger">','</div>')?>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 mb-20">
                                        <label>Usuário</label>
                                        <input type="text" class="form-control" name="username" value="<?= (isset($user) ? $user->username : set_value('username')) ?>">
                                        <?= form_error('username', '<div class="text-danger">','</div>')?>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= (isset($user) ? $user->email : set_value('email')) ?>">
                                        <?= form_error('email', '<div class="text-danger">','</div>')?>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 mb-20">
                                        <label>Senha</label>
                                        <input type="password" name="password" class="form-control">
                                        <?= form_error('password', '<div class="text-danger">','</div>')?>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>Confirmar Senha</label>
                                        <input type="password" name="confirm_password" class="form-control">
                                        <?= form_error('confirm_password', '<div class="text-danger">','</div>')?>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 mb-20">
                                        <label>Perfil de acesso</label>
                                        <select name="perfil" class="form-control">
                                            <?php if (isset($user)) : ?>
                                                <option value="2" <?= ($perfil->id == 2 ? 'selected' : '') ?>>Atendente</option>
                                                <option value="1" <?= ($perfil->id  == 1 ? 'selected' : '') ?>>Administrador</option>

                                            <?php else : ?>

                                                <option value="2">Atendente</option>
                                                <option value="1">Administrador</option>

                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-20">
                                        <label>Ativo</label>
                                        <select name="active" class="form-control">
                                            <?php if (isset($user)) : ?>
                                                <option value="0" <?= ($user->active == 0 ? 'selected' : '') ?>>Não</option>
                                                <option value="1" <?= ($user->active == 1 ? 'selected' : '') ?>>Sim</option>

                                            <?php else : ?>

                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>

                                            <?php endif; ?>
                                        </select>
                                    </div>



                                </div>
                                <?php if (isset($user)) : ?>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-20">
                                            <input type="hidden" name="user_id" id="test" class="form-control" value="<?= $user->id ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <button type="submit" id="tt" class="btn btn-secondary mr-2">Salvar</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                            <script>
                                // document.querySelector("#tt").addEventListener("click", function(event) {
                                //     event.preventDefault()
                                // })
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<footer class="footer">

</footer>

</div>
</div>



<!-- modal  -->
<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="quick-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <div class="input-wrap">
                                <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                <i class="ik ik-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="modal-body d-flex align-items-center">
                <div class="container">
                    <div class="apps-wrap">
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="app-item dropdown">
                            <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-command"></i><span>Ui</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>


    </script>
