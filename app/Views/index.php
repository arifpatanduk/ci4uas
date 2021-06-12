<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Home</h1>
        </div>
        <div class="card">
            <div class="card-body pb-0">
                <form method="POST" action="">
                    <div class="row">
                        <div class="form-group col-md-7">
                            <input name="keyword" type="text" class="form-control" placeholder="Masukkan keyword ...">
                        </div>

                        <div class="form-group col-md-3">
                            <select class="form-control">
                                <option selected>Semua Kategori</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <button class="btn btn-primary btn-block" type="submit" name="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php foreach ($dokumen as $dok) : ?>

            <a href="<?= (logged_in()) ? base_url('user/doc') . '/' . $dok['id'] : base_url('doc') . '/' . $dok['id']; ?>" class="custom-card">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $dok['judul']; ?></h5>
                        <p class="card-text"><?= $dok['tahun_publikasi']; ?>,
                            <strong><?= $dok['penulis']; ?></strong>
                            <br>
                            <span class="badge badge-sm badge-info">Skripsi</span>
                        </p>
                    </div>
                </div>
            </a>

        <?php endforeach; ?>

    </section>
</div>
<?= $this->endSection(); ?>