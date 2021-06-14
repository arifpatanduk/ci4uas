<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Sub Kategori</h1>
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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Sub Kategori</button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($list as $item) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $item['nama'] ?></td>
                                    <td><?= $item['jenis'] ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="<?= base_url('admin/subkategori/edit/' . $item['id_sub_kategori']); ?>">Edit</a>
                                        <a class="btn btn-danger" href="#" onclick="hapus('<?= $item['id_sub_kategori'] ?>')">Delete </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Sub Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formnya" action="subkategori/insert" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Nama</label>
                            <input type="text" id="nm" name="nama" class="form-control" />
                            <div class="invalid-feedback" id="errornm"></div>
                        </div>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Kategori</label>
                            <select id="kat" name="kategori" class="form-control">
                                <option value="">-- Select Kategori --</option>
                                <?php
                                foreach ($kategori as $kat) {
                                    echo "<option value='" . $kat['id_kategori'] . "'>" . $kat['jenis'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback" id="errorkat"></div>
                        </div>

                        <button type="submit" id="submit" class="btn btn-primary mb-4">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                        if (respon.error.nama) {
                            $('#nm').addClass('is-invalid');
                            $('#errornm').html(respon.error.nama);
                        } else {
                            $('#nm').removeClass('is-invalid');
                            $('#errornm').html('');
                        }

                        if (respon.error.kategori) {
                            $('#kat').addClass('is-invalid');
                            $('#errorkat').html(respon.error.kategori);
                        } else {
                            $('#kat').removeClass('is-invalid');
                            $('#errorkat').html('');
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
        title: 'Hapus Sub Kategori',
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
                url: "<?= base_url('/admin/subkategori/delete')?>" + "/" + id
            });
            location.reload();
        }
        
    })
}

</script>

<?= $this->endSection(); ?>