<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item">Peminjaman</div>
            </div>
        </div>

        <!-- update profile -->
        <?php if ((session()->getFlashdata('pinjam'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('pinjam') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h4>Daftar Peminjaman Saya</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Tanggal Pinjam</th>
                                <th>Jatuh Tempo</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($peminjaman as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['judul']; ?></td>
                                    <td><?= $data['tgl_pinjam']; ?></td>
                                    <td><?= $data['deadline']; ?></td>
                                    <td><?= $data['tgl_kembali']; ?></td>
                                    <td>
                                        <?= $data['is_late'] ? '<div class="badge badge-danger">Terlambat ' . $data['jml_late'] . ' hari' . '</div>' : '<div class="badge badge-success">Belum Terlambat</div>' ?>
                                    </td>
                                    <td>
                                        <?= $data['denda'] ? '<span class="badge badge-danger">' . $data['denda'] . '</span>' : '' ?>
                                    </td>
                                    <td class="min">
                                        <a href="<?= base_url('user/peminjaman/detail/' . $data['id_dokumen']); ?>" class="btn btn-sm btn-secondary mx-1"><i class="fas fa-eye"></i> Detail</a>
                                        <a href="#" class="btn btn-sm btn-primary mx-1"><i class="fas fa-download"></i> Tiket</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </section>
</div>
<?= $this->endSection(); ?>