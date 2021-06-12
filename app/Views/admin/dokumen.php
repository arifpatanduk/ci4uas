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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Dokumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                  <form id="formnya" action="dokumen/insert" method="post" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      
                      <div class=" mb-4">
                          <label class="form-label" for="tel">Telepon</label>
                          <input type="text" id="tel" name="telepon" class="form-control" />
                          <div class="invalid-feedback" id="errortel"></div>
                      </div>

                      Avatar : <div class="form-outline mb-4">
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
<?= $this->endSection(); ?>