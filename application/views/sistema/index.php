<?php

defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('layout/navbar')?>

<div class="page-wrap">

	<?php $this->load->view('layout/sidebar')?>
	<div class="main-content">
		<div class="container-fluid">
			<h1>Página do Sistema</h1>
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
		</div>
	</div>

	<footer class="footer">
		<div class="w-100 clearfix">
			<span class="text-center text-sm-left d-md-inline-block">Copyright © 2018 ThemeKit v2.0. All Rights Reserved.</span>
			<span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark" target="_blank">Lavalite</a></span>
		</div>
	</footer>

</div>
