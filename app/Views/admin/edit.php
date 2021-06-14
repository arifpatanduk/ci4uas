<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Dokumen</h1>
        </div>

        <div class="section-body">
            <div class="card">

                <div class="card-body">
                    <form id="formnya" action="/admin/dokumen/update/<?= $list->id; ?>" method="post" enctype="multipart/form-data">

                        <? $csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $list->id ?>" />
                        <div class=" mb-4">
                            <label class="form-label" for="tel">Kategori</label>
                            <select id="sel_kat" name="kategori" class="form-control">
                                <option value="<?= $list->id_kategori ?>"><?= $list->jenis ?></option>
                                <?php
                                foreach ($kategori as $kat) {
                                    echo "<option value='" . $kat['id_kategori'] . "'>" . $kat['jenis'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback" id="errorkat"></div>
                        </div>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Sub Kategori</label>
                            <select id='sel_SubKat' name="subkategori" class="form-control">
                                <option value="<?= $list->id_sub_kategori ?>"><?= $list->nama ?></option>
                            </select>
                            <div class="invalid-feedback" id="errorsub"></div>
                        </div>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Judul</label>
                            <input type="text" id="jdl" name="judul" class="form-control" value="<?= $list->judul ?>" />
                            <div class="invalid-feedback" id="errorjdl"></div>
                        </div>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Penulis</label>
                            <input type="text" id="pen" name="penulis" class="form-control" value="<?= $list->penulis ?>" />
                            <div class="invalid-feedback" id="errorpen"></div>
                        </div>

                        <div class=" mb-4">
                            <label class="form-label" for="tel">Tahun Publikasi</label>
                            <input type="text" id="thn" name="tahun" class="form-control" value="<?= $list->tahun_publikasi ?>" />
                            <div class="invalid-feedback" id="errorthn"></div>
                        </div>
                        <div class=" mb-4">
                            <label class="form-label" for="tel">Abstrak</label>
                            <textarea class="form-control" name="abstrak" id="abs" rows="4" style="height: 100px;"><?= $list->abstrak ?></textarea>
                            <div class="invalid-feedback" id="errorabs"></div>
                        </div>

                        File Dokumen : <div class="form-outline mb-4">
                            <input type="hidden" name="file_old" value="<?= $list->nama_file; ?>">
                            <input type="file" id="dok" name="dokumen" class="form-control" />
                            <p class="text-muted"><small><i>*Jika tidak terdapat perubahan dokumen silahkan kosongkan bagian ini</i></small></p>
                            <div class="invalid-feedback" id="errordok"></div>
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
        $(document).on('change', '#sel_kat', function() {
            var kat = $(this).val();
            console.log(kat);

            // AJAX request
            $.ajax({
                url: '<?= base_url() ?>/admin/getData',
                type: 'get',
                data: {
                    'kat': kat
                },
                dataType: 'json',
                success: function(data) {

                    // console.log("ggwp");

                    // Remove options 
                    $('#sel_SubKat').find('option').not(':first').remove();

                    // Add options
                    $.each(data, function(index, data) {
                        $('#sel_SubKat').append('<option value="' + data['id_sub_kategori'] + '">' + data['nama'] + '</option>');
                    });
                }
            });
        })
    });


    $('#sel_city').change(function() {

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
                    $('#submit').html('Update Data');
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
                        window.location.href = "<?= base_url() ?>/admin/dokumen";
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