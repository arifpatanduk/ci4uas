<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Dokumen</h1>
        </div>

        <!-- update profile -->
        <?php if ((session()->getFlashdata('update-dokumen'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('update-dokumen') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="<?= base_url('admin/dokumen/tambah'); ?>">Tambah Dokumen</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Upload</th>
                                <th scope="col" width="22%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($list as $item) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $item['judul'] ?></td>
                                    <td><?= $item['penulis'] ?></td>
                                    <td><?= $item['jenis'] ?></td>
                                    <td><?= $item['status'] ?></td>
                                    <td><?= $item['updated_at'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?= base_url('admin/dokumen/' . $item['id']); ?>">Detail</a>
                                        <a class="btn btn-warning" href="<?= base_url('admin/dokumen/edit/' . $item['id']); ?>">Edit</a>
                                        <a class="btn btn-danger" href="#" onclick="hapus('<?= $item['id'] ?>')">Delete </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    $(document).ready(function() {
        $('#formnya').submit(function(e) {
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
                    $('#submit').html('Tambah Data');
                },
                success: function(response) {
                    var respon = JSON.parse(response);
                    if (respon.error) {
                        if (respon.error.kategori) {
                            $('#sel_kat').addClass('is-invalid');
                            $('#errorkat').html(respon.error.kategori);
                        } else {
                            $('#sel_kat').removeClass('is-invalid');
                            $('#errorkat').html('');
                        }

                        if (respon.error.subkategori) {
                            $('#sel_SubKat').addClass('is-invalid');
                            $('#errorsub').html(respon.error.subkategori);
                        } else {
                            $('#sel_SubKat').removeClass('is-invalid');
                            $('#errorsub').html('');
                        }

                        if (respon.error.judul) {
                            $('#jdl').addClass('is-invalid');
                            $('#errorjdl').html(respon.error.judul);
                        } else {
                            $('#jdl').removeClass('is-invalid');
                            $('#errorjdl').html('');
                        }

                        if (respon.error.penulis) {
                            $('#pen').addClass('is-invalid');
                            $('#errorpen').html(respon.error.penulis);
                        } else {
                            $('#pen').removeClass('is-invalid');
                            $('#errorpen').html('');
                        }

                        if (respon.error.tahun) {
                            $('#thn').addClass('is-invalid');
                            $('#errorthn').html(respon.error.tahun);
                        } else {
                            $('#thn').removeClass('is-invalid');
                            $('#errorthn').html('');
                        }

                        if (respon.error.abstrak) {
                            $('#abs').addClass('is-invalid');
                            $('#errorabs').html(respon.error.abstrak);
                        } else {
                            $('#abs').removeClass('is-invalid');
                            $('#errorabs').html('');
                        }

                        if (respon.error.dokumen) {
                            $('#dok').addClass('is-invalid');
                            $('#errordok').html(respon.error.dokumen);
                        } else {
                            $('#dok').removeClass('is-invalid');
                            $('#errordok').html('');
                        }

                    } else {
                        alert(respon.sukses);
                        window.location.reload();
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

<script>
function hapus(id) {
    Swal.fire({
        title: 'Hapus Dokumen',
        text: "Apakah Anda yakin akan menghapus data dengan ID="+id+"?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "delete",
                url: "<?= base_url('/admin/dokumen/delete')?>" + "/" + id
            });
            location.reload();
        }
        
    })
}

</script>

<?= $this->endSection(); ?>