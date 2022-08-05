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
                            <i class="fa fa-question bg-primary"></i>
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
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?= site_url() ?>">Home</i></a>
                                </li>
								<li class="breadcrumb-item">
									<a data-toggle="tooltip" data-placement="bottom" title="Estacionar" href="<?= site_url('parking') ?>">Estacionar</i></a>
								</li>
                                <li class="breadcrumb-item active" data-toggle="tooltip" data-placement="bottom" title="Ações" aria-current="page"><?= (isset($title) ? $title : '') ?></li>
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

            <div class="row">
					<!-- imprestion, goal, impect start -->

					<div class="col-xl-4 col-md-6">
						<div class="card comp-card">
							<div class="card-body">
								<div class="row align-items-center">

									<div class="col">
										<h6 class="mb-25">Impressão do Ticket</h6>
										<h3 class="fw-700 text-blue">Imprimir</h3>
									</div>
									<a href="">
									<div class="col-auto">
										<i class="fas fa-print bg-blue"></i>
									</div>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-md-6">
						<div class="card comp-card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<h6 class="mb-25">Listar Ticket</h6>
										<h3 class="fw-700 text-green">Listar</h3>
									</div>
									<a href="">
									<div class="col-auto">
										<i class="fas fa-list bg-green"></i>
									</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-md-6">
						<div class="card comp-card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<h6 class="mb-25">Novo Ticket</h6>
										<h3 class="fw-700 text-yellow">Novo</h3>
									</div>
									<a href="">
										<div class="col-auto">
											<i class="fas fa-hand-paper bg-yellow"></i>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- imprestion, goal, impect end -->
            </div>

        </div>
    </div>
</div>

<footer class="footer">

</footer>

