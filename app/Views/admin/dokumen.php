<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Dokumen</h1>
        </div>

        <div class="section-body">
        <div class="card">
                  <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Dokumen</button>
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
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no=1;
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
                                <a class="btn btn-primary" href="#">Detail</a>
                                <a class="btn btn-warning" href="#">Edit</a>
                                <a class="btn btn-danger" href="#">Delete</a>

                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
        </div>
    </section>
    
    <!-- Modal Content Detail -->
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Dokumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                  <form id="formnya" action="" method="post" enctype="multipart/form-data">
                      <?= csrf_field(); ?>

                      <div class=" mb-4">
                          <label class="form-label" for="tel">Kategori</label>
                          <select id="sel_kat" name="kategori" class="form-control">
                            <option>-- Select Kategori --</option>
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
                            <option>-- Select Sub Kategori --</option>
                          </select>
                          <div class="invalid-feedback" id="errorsub"></div>
                      </div>
                      
                      <div class=" mb-4">
                          <label class="form-label" for="tel">Judul</label>
                          <input type="text" id="tel" name="judul" class="form-control" />
                          <div class="invalid-feedback" id="errorjdl"></div>
                      </div>

                      <div class=" mb-4">
                          <label class="form-label" for="tel">Penulis</label>
                          <input type="text" id="tel" name="penulis" class="form-control" />
                          <div class="invalid-feedback" id="errorpen"></div>
                      </div>

                      <div class=" mb-4">
                          <label class="form-label" for="tel">Tahun Publikasi</label>
                          <input type="text" id="tel" name="tahun" class="form-control" />
                          <div class="invalid-feedback" id="errorthn"></div>
                      </div>
                      <div class=" mb-4">
                          <label class="form-label" for="tel">Abstrak</label>
                          <textarea class="form-control" name="abstrak" id="abs" rows="4"></textarea>
                          <div class="invalid-feedback" id="errorabs"></div>
                      </div>

                      File Dokumen : <div class="form-outline mb-4">
                          <input type="file" id="ava" name="avatar" class="form-control" />
                          <div class="invalid-feedback" id="errorava"></div>
                      </div>

                      <button type="submit" id="submit" class="btn btn-primary mb-4">Tambah Data</button>
                  </form>
                </div>
            </div>
        </div>
    </div>

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