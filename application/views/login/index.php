<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>
        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url(<?= base_url('public/img/auth/login-bg.jpg')?>)">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="../index.html"><img src="<?= base_url('public/src/img/brand.svg"')?>" alt=""></a>
                            </div>
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

                            <h3>Seja muito bem vindo(a)!</h3>
                            <p>Estamos felizes por você aqui</p>
                            <form method="post" action="<?= site_url('login/auth')?>">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required="" value="<?= set_value('email')?>">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
