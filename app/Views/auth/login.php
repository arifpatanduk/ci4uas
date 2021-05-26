<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="<?= base_url(); ?>/stisla/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-header"><?= lang('Auth.loginTitle') ?></h4>
                        </div>


                        <div class="card-body">

                            <?= view('Myth\Auth\Views\_message_block') ?>

                            <form action="<?= route_to('login') ?>" class="needs-validation" method="post">
                                <?= csrf_field() ?>

                                <?php if ($config->validFields === ['email']) : ?>
                                    <div class="form-group">
                                        <label for="login"><?= lang('Auth.email') ?></label>
                                        <input id="email" type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="form-group">
                                        <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                        <input id="email" type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password"><?= lang('Auth.password') ?></label>
                                    </div>
                                    <input id="password" name="password" type="password" class="form-control<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        <?= lang('Auth.loginAction') ?>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        <?php if ($config->allowRegistration) : ?>
                            <a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
                        <?php endif; ?>
                        <br>
                        <?php if ($config->activeResetter) : ?>
                            <a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                        <?php endif; ?>
                        <!-- Don't have an account? <a href="auth-register.html">Create One</a> -->
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; SIMAD <?= date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>