<?= $this->extend('auth/template/index'); ?>

<?= $this->section('title'); ?>
Register &mdash; SIMAD
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="<?= base_url(); ?>/stisla/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4><?= lang('Auth.register') ?></h4>
                        </div>

                        <div class="card-body">

                            <form action="<?= route_to('register') ?>" method="post">
                                <?= csrf_field() ?>


                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input id="nama" type="text" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" name="nama" placeholder="Nama lengkap" value="<?= old('nama') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.nama'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="email"><?= lang('Auth.email') ?></label>
                                        <input id="email" type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" value="<?= old('email') ?>" placeholder="<?= lang('Auth.email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.email'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="username"><?= lang('Auth.username') ?></label>
                                        <input id="username" type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.username'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nim">NIM / NIP</label>
                                        <input id="nim" type="text" class="form-control <?php if (session('errors.nim')) : ?>is-invalid<?php endif ?>" name="nim" placeholder="NIM atau NIP" value="<?= old('nim') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.nim'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="no_hp">No. HP</label>
                                        <input id="no_hp" type="number" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>" name="no_hp" placeholder="Nomor HP aktif" value="<?= old('no_hp') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.no_hp'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input id="alamat" type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" placeholder="Alamat" value="<?= old('alamat') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.alamat'); ?>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password"><?= lang('Auth.password') ?></label>
                                        <input id="password" type="password" class="form-control pwstrength <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" data-indicator="pwindicator" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= session('errors.password'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                        <input id="password2" type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                        <div class="invalid-feedback">
                                            <?= session('errors.pass_confirm'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        <?= lang('Auth.register') ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
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