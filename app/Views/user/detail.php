<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Document</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item">Dokumen</div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <table class="table ">
                    <tbody>
                        <tr>
                            <th width="15%">Judul</th>
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
                                    <?php if (!$pinjam) : ?>
                                        <?php if ($jml_pinjam < 2) : ?>
                                            <button id="pinjam" class="btn btn-warning my-2" data-toggle="modal" data-target="<?= $dokumen->status_tersedia == 'Tersedia' ? '#modal-pinjam' : '#modal-no-pinjam'; ?>" data-status="<?= $dokumen->status_tersedia; ?>">
                                                <i class="fas fa-file-import"></i>
                                                Pinjam Document
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
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
                    <iframe src="https://drive.google.com/file/d/<?= $dokumen->nama_file; ?>/preview" width="640" height="480" frameborder="0" scrolling="no" seamless="" allowfullscreen="allowfullscreen"></iframe>
                    <div style="width: 80px; height: 80px; position: absolute; opacity: 0; right: 0px; top: 0px;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Pinjam Dokumen Tersedia -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-pinjam">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pinjam Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form" action="<?= base_url('user/peminjaman/pinjam/' . $dokumen->id); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div id="input-tanggal">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Tanggal Pengambilan Dokumen</label>
                                    <input type="date" id ="tgl" class="form-control" name="tgl_pinjam">
                                    <div class="invalid-feedback" id="errortgl"></div>
                                </div>
                                <p>
                                    <small><i>*Silahkan masukkan tanggal pengambilan dokumen. Tanggal peminjaman akan dihitung dari tanggal pengambilan.</i></small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="submit-button" type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Pinjam Dokumen Tidak Tersedia -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-no-pinjam">
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
                        Dokumen tidak dapat dipinjam. Saat ini dokumen <span class="badge badge-sm badge-danger"> Tidak Tersedia</span>
                    </p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>


            </div>
        </div>
    </div>


</div>

<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#submit').attr('disable', 'disabled');
                    $('#submit').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('#submit').removeAttr('disable');
                    $('#submit').html('Kirim');
                },
                success: function(response) {
                    var respon = JSON.parse(response);
                    if (respon.error) {
                        if (respon.error.tgl_pinjam) {
                            $('#tgl').addClass('is-invalid');
                            $('#errortgl').html(respon.error.tgl_pinjam);
                        } else {
                            $('#jns').removeClass('is-invalid');
                            $('#errortgl').html('');
                        }

                    }
                    else {
                        alert(respon.sukses);
                        window.location.href = "<?= base_url() ?>/user/peminjaman";
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });

            return false;
        });
    });
</script>

<?= $this->endSection(); ?>