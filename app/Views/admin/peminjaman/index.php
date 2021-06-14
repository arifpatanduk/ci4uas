<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item">Peminjaman</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Daftar Peminjaman</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Member</th>
                            <th>Kode</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jatuh Tempo</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Denda</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Arif Patanduk</td>
                            <td>12-3563456</td>
                            <td>2021-06-13</td>
                            <td>2021-06-16</td>
                            <td></td>
                            <td>
                                <div class="badge badge-danger">Terlambat</div>
                            </td>
                            <td>
                                2 hari :
                                <span class="badge badge-danger">Rp 6.000</span>
                            </td>
                            <td class="min">
                                <a href="<?= base_url('admin/peminjaman/detail/') . '/1'; ?>" class="btn btn-sm btn-warning mx-1"><i class="fas fa-eye"></i> Detail</a>
                                <a href="#" class="btn btn-sm btn-primary mx-1"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </section>
</div>
<?= $this->endSection(); ?>