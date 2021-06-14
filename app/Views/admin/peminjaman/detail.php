<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/peminjaman'); ?>">Peminjaman</a></div>
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
                                <th class="max">Tangal Pinjam</th>
                                <td>2021-06-13</td>
                            </tr>
                            <tr>
                                <th class="max">Jatuh Tempo</th>
                                <td>2021-06-16</td>
                            </tr>
                            <tr>
                                <th class="max">Tanggal Kembali</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="max">Status</th>
                                <td>
                                    <div class="badge badge-danger">Terlambat</div>
                                </td>
                            </tr>
                            <tr>
                                <th class="max">Terlambat</th>
                                <td>2 hari</td>
                            </tr>
                            <tr>
                                <th class="max">Denda</th>
                                <td>
                                    <span class="badge badge-danger">Rp 6.000</span>
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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur totam hic iste, deserunt incidunt laboriosam aspernatur blanditiis consequatur cumque quo earum odio ullam non. Quis numquam ipsam et aliquid ex?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur totam hic iste, deserunt incidunt laboriosam aspernatur blanditiis consequatur cumque quo earum odio ullam non. Quis numquam ipsam et aliquid ex?
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>