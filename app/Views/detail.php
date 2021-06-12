<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Document</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item">Document</div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <table class="table ">
                    <tbody>
                        <tr>
                            <th>Judul</th>
                            <td><?= $dokumen->judul; ?></td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td><?= $dokumen->penulis; ?></td>
                        </tr>
                        <tr>
                            <th>Tahun Publikasi</th>
                            <td><?= $dokumen->tahun_publikasi; ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>
                                <span class="badge badge-sm badge-success"><?= $dokumen->jenis; ?></span>
                                <span class="badge badge-sm badge-info"><?= $dokumen->nama; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">Abstrak / Pendahuluan</th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>
                                    <?= $dokumen->abstrak; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">
                                <a href="<?= base_url('user/doc') . '/' . $dokumen->id; ?>" class="btn btn-primary">Full Document</a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>