<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Sub Kategori</h1>
        </div>

        <div class="section-body">
            <div class="card">

                <div class="card-body">
                    <form id="formnya" action="/admin/subkategori/update/<?= $list->id_sub_kategori; ?>" method="post" enctype="multipart/form-data">

                        <? $csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $list->id_sub_kategori ?>" />

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Nama</label>
                            <input type="text" id="nm" name="nama" class="form-control" value="<?= $list->nama ?>" />
                            <div class="invalid-feedback" id="errornm"></div>
                        </div>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Kategori</label>
                            <select id="kat" name="kategori" class="form-control">
                                <option value="<?= $list->id_kategori ?>"><?= $list->jenis ?></option>
                                <?php
                                foreach ($kategori as $kat) {
                                    echo "<option value='" . $kat['id_kategori'] . "'>" . $kat['jenis'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback" id="errorkat"></div>
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
                        window.location.href = "<?= base_url() ?>/admin/subkategori";
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