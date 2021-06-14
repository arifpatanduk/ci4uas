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
                                <a href="#full" class="btn btn-primary my-2"><i class="fas fa-file-alt"></i> Full Document</a>

                                <?php if (in_groups('member')) : ?>
                                    <button class="btn btn-warning my-2" data-toggle="modal" data-target="#modal-pinjam">
                                        <i class="fas fa-file-import"></i>
                                        Pinjam Document
                                    </button>
                                <?php endif; ?>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="card mb-3" id="full">
            <div class="card-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://drive.google.com/file/d/1WjgQOl-B6Ri08KhsSC1bOLlOZe9yZgx5/preview" width="640" height="480" frameborder="0" scrolling="no" seamless="" allowfullscreen="allowfullscreen"></iframe>
                    <div style="width: 80px; height: 80px; position: absolute; opacity: 0; right: 0px; top: 0px;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Pinjam Dokumen -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-pinjam">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pinjam Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="card-text">
                        Ketersediaan Dokumen : <span class="badge badge-sm badge-success">Tersedia</span>
                    </p>


                    <!-- if else ketersediaan dokumen here -->



                    <hr>

                    <p>
                        <small><i>*Silahkan masukkan tanggal pengambilan dokumen. Tanggal peminjaman akan dihitung dari tanggal pengambilan.</i></small>
                    </p>

                    <form id="formnya" action="" method="post">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Tanggal Pengambilan Dokumen</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim</button>
                </div>
            </div>
        </div>
    </div>


</div>
<?= $this->endSection(); ?>