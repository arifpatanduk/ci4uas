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
                            <td><?= $list->judul ?></td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td><?= $list->penulis ?></td>
                        </tr>
                        <tr>
                            <th>Tahun Publikasi</th>
                            <td><?= $list->tahun_publikasi ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><span class="badge badge-sm badge-info"><?= $list->jenis ?></span></td>
                        </tr>
                        <tr>
                            <th>Sub Kategori</th>
                            <td><span class="badge badge-sm badge-info"><?= $list->nama ?></span></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><span class="badge badge-sm badge-info"><?= $list->status ?></span></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">Abstrak / Pendahuluan</th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>
                                    <?= $list->abstrak ?>    
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

        <div class="card mb-3" id="full">
            <div class="card-body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur totam hic iste, deserunt incidunt laboriosam aspernatur blanditiis consequatur cumque quo earum odio ullam non. Quis numquam ipsam et aliquid ex?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur totam hic iste, deserunt incidunt laboriosam aspernatur blanditiis consequatur cumque quo earum odio ullam non. Quis numquam ipsam et aliquid ex?
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>