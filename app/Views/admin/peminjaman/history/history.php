<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item">History Peminjaman</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Daftar History Peminjaman</h4>
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Token Pinjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Jatuh Tempo</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Denda (Rp)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($peminjaman as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['token_pinjam']; ?></td>
                                    <td><?= $data['tgl_pinjam']; ?></td>
                                    <td><?= $data['deadline']; ?></td>
                                    <td><?= $data['tgl_kembali']; ?></td>
                                    <td>
                                        <?php if ($data['is_late']) : ?>
                                            <div class="badge badge-danger">Terlambat <?= $data['jml_late']; ?> hari</div>
                                        <?php elseif (!$data['is_late'] && !$data['tgl_kembali']) : ?>
                                            <div class="badge badge-success">Belum Terlambat</div>
                                        <?php else : ?>
                                            <div class="badge badge-info">Tidak Terlambat</div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= $data['total_denda'] ? '<span class="badge badge-danger">' . $data['total_denda'] . '</span>' : '' ?>
                                    </td>
                                    <td class="min">
                                        <a href="<?= base_url('admin/peminjaman/history/detail') . '/' . $data['id_peminjaman']; ?>" class="btn btn-sm btn-secondary mx-1"><i class="fas fa-eye"></i> Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
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
<?= $this->endSection(); ?>