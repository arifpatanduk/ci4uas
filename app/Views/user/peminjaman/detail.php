<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('user/peminjaman'); ?>">Peminjaman</a></div>
                <div class="breadcrumb-item">Detail Peminjaman</div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="mb-3">
                    <h6>
                        <div class="card-title font-weight-bold">Detail Peminjaman</div>
                    </h6>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th class="max">Token Pinjam</th>
                                <td><?= $pinjam->token_pinjam; ?></td>
                            </tr>
                            <tr>
                                <th class="max">Tangal Pinjam</th>
                                <td><?= $pinjam->tgl_pinjam; ?></td>
                            </tr>
                            <tr>
                                <th class="max">Jatuh Tempo</th>
                                <td><?= $pinjam->deadline; ?></td>
                            </tr>
                            <tr>
                                <th class="max">Status</th>
                                <td><?= $pinjam->is_late ? '<div class="badge badge-danger">Terlambat ' . $pinjam->jml_late . ' hari' . '</div>' : '<div class="badge badge-success">Belum Terlambat</div>' ?></td>
                            </tr>
                            <tr>
                                <th class="max">Denda</th>
                                <td>
                                    <?= $pinjam->total_denda ? '<span class="badge badge-danger"> Rp ' . $pinjam->total_denda . '</span>' : '' ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <hr>
                    <h6>
                        <div class="card-title font-weight-bold">Detail Dokumen</div>
                    </h6>

                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th>Judul</th>
                                <td><?= $doc->judul; ?></td>
                            </tr>
                            <tr>
                                <th>Penulis</th>
                                <td><?= $doc->penulis; ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Publikasi</th>
                                <td><?= $doc->tahun_publikasi; ?></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>
                                    <span class="badge badge-sm badge-success"><?= $doc->jenis; ?></span>
                                    <span class="badge badge-sm badge-info"><?= $doc->nama; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-center">Abstrak / Pendahuluan</th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>
                                        <?= $doc->abstrak; ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-center">
                                    <a href="#full" class="btn btn-primary">Full Document</a>
                                </th>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <div class="card mb-3" id="full">
            <div class="card-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://drive.google.com/file/d/<?= $doc->nama_file; ?>/preview" width="640" height="480" frameborder="0" scrolling="no" seamless="" allowfullscreen="allowfullscreen"></iframe>
                    <div style="width: 80px; height: 80px; position: absolute; opacity: 0; right: 0px; top: 0px;"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>