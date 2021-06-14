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
        <form id="formnya" action="../../dokumen/update" method="post" enctype="multipart/form-data">
            <?php
                foreach ($list as $item) {
            ?>
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $item['id'] ?>" />
                <div class=" mb-4">
                    <label class="form-label" for="tel">Kategori</label>
                        <select id="sel_kat" name="kategori" class="form-control">
                            <option value="<?= $item['id_kategori'] ?>"><?= $item['jenis'] ?></option>
                            <?php
                            foreach($kategori as $kat){
                              echo "<option value='".$kat['id_kategori']."'>".$kat['jenis']."</option>";
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback" id="errorkat"></div>
                        </div>

                    <div class=" mb-4">
                        <label class="form-label" for="tel">Sub Kategori</label>
                            <select id='sel_SubKat' name="subkategori" class="form-control">
                                <option value="<?= $item['id_sub_kategori'] ?>"><?= $item['nama'] ?></option>
                            </select>
                            <div class="invalid-feedback" id="errorsub"></div>
                    </div>
                      
                    <div class=" mb-4">
                        <label class="form-label" for="tel">Judul</label>
                            <input type="text" id="jdl" name="judul" class="form-control" value="<?= $item['judul'] ?>" />
                            <div class="invalid-feedback" id="errorjdl"></div>
                    </div>

                    <div class=" mb-4">
                        <label class="form-label" for="tel">Penulis</label>
                            <input type="text" id="pen" name="penulis" class="form-control" value="<?= $item['penulis'] ?>" />
                            <div class="invalid-feedback" id="errorpen"></div>
                    </div>

                      <div class=" mb-4">
                          <label class="form-label" for="tel">Tahun Publikasi</label>
                          <input type="text" id="thn" name="tahun" class="form-control" value="<?= $item['tahun_publikasi'] ?>" />
                          <div class="invalid-feedback" id="errorthn"></div>
                      </div>
                      <div class=" mb-4">
                          <label class="form-label" for="tel">Abstrak</label>
                          <textarea class="form-control" name="abstrak" id="abs" rows="4" style="height: 100px;"><?= $item['abstrak'] ?></textarea>
                          <div class="invalid-feedback" id="errorabs"></div>
                      </div>

                      File Dokumen : <div class="form-outline mb-4">
                          <input type="file" id="dok" name="dokumen" class="form-control" />
                          <div class="invalid-feedback" id="errordok"></div>
                      </div>

                      <button type="submit" id="submit" class="btn btn-primary mb-4">Update Data</button>
                      <?php } ?>
                  </form>
                        </div>
        </div>
        </div>
    </section>
</div>

<script>
  $(document).ready(function(){
    $(document).on('change', '#sel_kat', function(){
      var kat = $(this).val();
      console.log(kat);

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>/admin/getData',
        type: 'get',
        data: {'kat': kat},
        dataType: 'json',
        success: function(data){

          // console.log("ggwp");

          // Remove options 
          $('#sel_SubKat').find('option').not(':first').remove();

          // Add options
          $.each(data,function(index,data){
             $('#sel_SubKat').append('<option value="'+data['id_sub_kategori']+'">'+data['nama']+'</option>');
          });
        }
     });
    })
});


$('#sel_city').change(function(){
      
   });
</script>
<?= $this->endSection(); ?>