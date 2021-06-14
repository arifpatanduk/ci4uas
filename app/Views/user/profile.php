<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>

        <!-- jika data belum lengkap -->
        <?php if ((session()->getFlashdata('profile'))) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('profile') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- update profile -->
        <?php if ((session()->getFlashdata('update-profile'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('update-profile') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="section-body">
            <h2 class="section-title">Hi, <?= user()->nama; ?></h2>
            <p class="section-lead">
                <?= user()->email; ?>
            </p>

            <div class="card profile-widget">

                <form action="/user/profile/update" method="post">
                    <? $csrf_field(); ?>
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="email" value="<?= user()->email; ?>">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" value="<?= user()->nama; ?>" placeholder="Masukkan nama lengkap">
                                <div class="invalid-feedback">
                                    <?= session('errors.nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>NIM / NIP</label>
                                <input type="text" name="nim" class="form-control <?php if (session('errors.nim')) : ?>is-invalid<?php endif ?>" value="<?= user()->nim; ?>" placeholder="Masukkan NIM atau NIP">
                                <div class="invalid-feedback">
                                    <?= session('errors.nim'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>No HP</label>
                                <input type="number" name="no_hp" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>" value="<?= user()->no_hp; ?>" placeholder="Masukkan nomor hp">
                                <div class="invalid-feedback">
                                    <?= session('errors.no_hp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" value="<?= user()->alamat; ?>" placeholder="Masukkan alamat">
                                <div class="invalid-feedback">
                                    <?= session('errors.alamat'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>