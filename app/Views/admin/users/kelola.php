<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kelola User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item">Users</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar User</h4>
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
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIM / NIP</th>
                                    <th>Role</th>
                                    <th>Active</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $user['nama']; ?></td>
                                        <td><?= $user['nim']; ?></td>
                                        <td>
                                            <?php if ($user['name'] == 'admin') : ?>
                                                <div class="badge badge-info"><?= $user['name']; ?></div>
                                            <?php else : ?>
                                                <div class="badge badge-secondary"><?= $user['name']; ?></div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($user['active'] == 1) : ?>
                                                <div class="badge badge-success">Active</div>
                                            <?php else : ?>
                                                <div class="badge badge-danger">Non Active</div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="min">
                                            <a href="#" class="btn btn-sm btn-secondary mx-1"><i class="fas fa-eye"></i> Detail</a>
                                            <a href="#" class="btn btn-sm btn-warning mx-1"><i class="fas fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
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
        </div>
    </section>
</div>
<?= $this->endSection(); ?>