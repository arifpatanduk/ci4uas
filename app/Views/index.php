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
                            <input type="text" class="form-control" placeholder="Cari semua dokumen">
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
                            <button class="btn btn-primary btn-block" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <a href="<?= (logged_in()) ? base_url('user/doc') : base_url('doc'); ?>" class="custom-card">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa saepe alias, sit voluptatem cumque consectetur, aliquam eum iste assumenda ab exercitationem dolores ducimus ipsa soluta cupiditate odit impedit eveniet veniam?</h5>
                    <p class="card-text">2015,
                        <strong>Nama Penulis</strong>
                        <br>
                        <span class="badge badge-sm badge-info">Skripsi</span>
                    </p>
                </div>
            </div>
        </a>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa saepe alias, sit voluptatem cumque consectetur, aliquam eum iste assumenda ab exercitationem dolores ducimus ipsa soluta cupiditate odit impedit eveniet veniam?</h5>
                <p class="card-text">2015,
                    <strong>Nama Penulis</strong>
                    <br>
                    <span class="badge badge-sm badge-warning">Laporan PI</span>
                </p>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>