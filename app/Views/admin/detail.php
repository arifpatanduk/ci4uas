<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Dokumen</h1>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <table class="table ">
                    <tbody>
                        <tr>
                            <th width="15%">Judul</th>
                            <td><?= $list->judul; ?></td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td><?= $list->penulis; ?></td>
                        </tr>
                        <tr>
                            <th>Tahun Publikasi</th>
                            <td><?= $list->tahun_publikasi; ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>
                                <span class="badge badge-sm badge-success"><?= $list->jenis; ?></span>
                                <span class="badge badge-sm badge-info"><?= $list->nama; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">Abstrak / Pendahuluan</th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>
                                    <?= $list->abstrak; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">
                                <a href="#full" class="btn btn-primary my-2"><i class="fas fa-file-alt"></i> Full Document</a>

                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="card mb-3" id="full">
            <div class="card-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://drive.google.com/file/d/<?= $list->nama_file; ?>/preview" width="640" height="480" frameborder="0" scrolling="no" seamless="" allowfullscreen="allowfullscreen"></iframe>
                    <div style="width: 80px; height: 80px; position: absolute; opacity: 0; right: 0px; top: 0px;"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>