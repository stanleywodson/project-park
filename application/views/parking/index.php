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
                            <i class="ik ik-users bg-blue"></i>
                            <div class="d-inline">
                                <h5><?= (isset($title) ? $title : '') ?></h5>
                                <span><?= (isset($subtitle) ? $subtitle : '') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a title="Home" href="<?= base_url() ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?= (isset($title) ? $title : '') ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <?php if($message = $this->session->flashdata('sucesso')) : ?>

                <div class="row">
                    <div class="col-md-12">

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?= $message ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                    </div>
                </div>
            <?php endif; ?>

			<?php if($message = $this->session->flashdata('error')) : ?>

				<div class="row">
					<div class="col-md-12">
								<div class="alert bg-danger alert-danger alert-dismissible fade show" role="alert">
									<strong><?= $message ?></strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
					</div>
				</div>
			<?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a data-toggle="tooltip" data-placement="bottom" title="Cadastrar Forma de Pagamento" href="<?= site_url('parking/core') ?>" class="btn btn-success">+Novo</a>
                        </div>
                        <div class="card-body">
                            <table class="table data-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Categoria</th>
                                        <th>Valor Hora</th>
										<th>Placa</th>
										<th>Status</th>
										<th>Forma de Pagamento</th>
                                        <th class="nosort">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($parks as $park) : ?>
                                        <tr>
                                            <td><?= $park->estacionar_id ?></td>
                                            <td><?= $park->precificacao_categoria?></td>
											<td><?= $park->precificacao_valor_hora?></td>
											<td><?= $park->estacionar_placa_veiculo?></td>
                                            <td><?= ($park->estacionar_status == 1) ? '<span class="badge badge-pill badge-success">Finalizado</span>' : '<span class="badge badge-pill badge-warning">Em Aberto</span>' ?></td>
											<td><?= $park->forma_pagamento_nome?></td>
                                            <td class="">
												<?php if($park->estacionar_status == 1):?>
													<a href="#" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="bottom" title="Visualizar"><i class="fas fa-eye"></i></a>
													<button type="button" class="btn btn-icon btn-danger" data-toggle="modal" data-target="#user-<?= $park->estacionar_id?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
												<?php else:?>
													<a href="<?= site_url('parking/core/'.$park->estacionar_id) ?>" class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="bottom" title="Visualizar"><i class="fas fa-edit"></i></a>
													<button type="button" class="btn btn-icon btn-danger" data-toggle="modal" data-target="#user-<?= $park->estacionar_id?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
												<?php endif;?>
                                            </td>
                                        </tr>
										<!-- model premission delete-->
										<div class="modal fade" id="user-<?= $park->estacionar_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterLabel">excluir veículo - placa: - <b><?= $park->estacionar_placa_veiculo ?></b> </h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<p>Tem certeza que deseja excluir</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
														<a href="<?= site_url('parking/del/' . $park->estacionar_id) ?>" class="btn btn-danger">Excluir</a>
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
            </div>
    </div>
</div>
</div>

<footer class="footer">

</footer>

</div>
</div>




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
