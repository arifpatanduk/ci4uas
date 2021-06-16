<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Kategori</h1>
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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Kategori</button>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Denda</th>
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
                                    <td><?= $item['jenis'] ?></td>
                                    <td><?= $item['denda'] ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="<?= base_url('admin/kategori/edit/' . $item['id_kategori']); ?>">Edit</a>
                                        <a class="btn btn-danger" href="#" onclick="hapus('<?= $item['id_kategori'] ?>')">Delete </a>
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
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formnya" action="kategori/insert" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Jenis</label>
                            <input type="text" id="jns" name="jenis" class="form-control" />
                            <div class="invalid-feedback" id="errorjns"></div>
                        </div>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Denda</label>
                            <input type="number" id="dnd" name="denda" class="form-control" />
                            <div class="invalid-feedback" id="errordnd"></div>
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
        $('#myTable').DataTable( {
            dom: 'lBfrtip',
            buttons: [
                { extend: 'excelHtml5', className: 'btn btn-success' },
                { extend: 'pdfHtml5', className: 'btn btn-danger' },
            ],  
        } );
    });
</script>

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
                        if (respon.error.jenis) {
                            $('#jns').addClass('is-invalid');
                            $('#errorjns').html(respon.error.jenis);
                        } else {
                            $('#jns').removeClass('is-invalid');
                            $('#errorjns').html('');
                        }

                        if (respon.error.denda) {
                            $('#dnd').addClass('is-invalid');
                            $('#errordnd').html(respon.error.denda);
                        } else {
                            $('#dnd').removeClass('is-invalid');
                            $('#errordnd').html('');
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
        title: 'Hapus Kategori',
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
                url: "<?= base_url('/admin/kategori/delete')?>" + "/" + id
            });
            location.reload();
        }
        
    })
}

</script>

<?= $this->endSection(); ?>