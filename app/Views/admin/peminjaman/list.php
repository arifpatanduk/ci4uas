<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Member</th>
                <th>Token Pinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
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
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['token_pinjam']; ?></td>
                    <td><?= $data['tgl_pinjam']; ?></td>
                    <td><?= $data['deadline']; ?></td>
                    <td>
                        <?= $data['is_late'] ? '<div class="badge badge-danger">Terlambat ' . $data['jml_late'] . ' hari' . '</div>' : '<div class="badge badge-success">Belum Terlambat</div>' ?>
                    </td>
                    <td>
                        <?= $data['denda'] ? '<span class="badge badge-danger">' . $data['denda'] . '</span>' : '' ?>
                    </td>
                    <td class="min">

                        <a href="<?= base_url('admin/peminjaman/detail/') . '/' . $data['id_peminjaman']; ?>" class="btn btn-sm btn-warning mx-1"><i class="fas fa-eye"></i> Detail</a>


                        <button id="button-kembali" class="btn btn-sm btn-primary mx-1" onclick="kembali('<?= $data['token_pinjam']; ?>', '<?= $data['denda']; ?>')">
                            <i class="fas fa-arrow-circle-left"></i> Kembali
                        </button>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function kembali(token, denda) {
        var denda = denda != '' ? denda : 0;
        Swal.fire({
            title: 'Pengembalian Dokumen',
            html: '<p>Token Pinjam : ' + token + '</p><p>Denda : ' + denda + '</p><h5 class="text-center">Yakin ingin mengembalikan dokumen?</h5>',
            text: "Apakah Anda yakin akan mengembalikan dokumen dengan Token Pinjam = " + token + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, kembalikan!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('/admin/peminjaman/kembali'); ?>" + "/" + token,
                    success: function(response) {
                        var respon = JSON.parse(response);
                        Swal.fire({
                            title: 'Berhasil',
                            text: respon.sukses,
                            icon: 'success',
                            confirmButtonText: 'Oke'
                        });
                        tampilkan();
                    }
                });
            }
        });
    }
</script>