<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Kategori</h1>
        </div>

        <div class="section-body">
            <div class="card">

                <div class="card-body">
                    <form id="formnya" action="/admin/kategori/update/<?= $list->id_kategori; ?>" method="post" enctype="multipart/form-data">

                        <? $csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $list->id_kategori ?>" />

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Jenis</label>
                            <input type="text" id="jns" name="jenis" class="form-control" value="<?= $list->jenis ?>" />
                            <div class="invalid-feedback" id="errorjns"></div>
                        </div>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Denda</label>
                            <input type="number" id="dnd" name="denda" class="form-control" value="<?= $list->denda ?>" />
                            <div class="invalid-feedback" id="errordnd"></div>
                        </div>

                        <button type="submit" id="submit" class="btn btn-primary mb-4">Update Data</button>
                    </form>
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
                        window.location.href = "<?= base_url() ?>/admin/kategori";
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