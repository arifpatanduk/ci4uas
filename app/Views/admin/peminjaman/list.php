<div class="table-responsive">
    <table class="table table-striped" id="myTable">
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
                        <?= $data['total_denda'] ? '<span class="badge badge-danger">' . $data['total_denda'] . '</span>' : '' ?>
                    </td>
                    <td class="min">

                        <a href="<?= base_url('admin/peminjaman/detail/') . '/' . $data['id_peminjaman']; ?>" class="btn btn-sm btn-warning mx-1"><i class="fas fa-eye"></i> Detail</a>

                        <?php if ($data['isAmbil'] == "1") { ?>
                            <button id="button-kembali" class="btn btn-sm btn-primary mx-1" onclick="kembali('<?= $data['token_pinjam']; ?>', '<?= $data['total_denda']; ?>')">
                                <i class="fas fa-arrow-circle-left"></i> Kembali
                            </button>
                        <?php } ?>

                        <?php if ($data['isAmbil'] == "0") { ?>
                            <button id="button-ambil" class="btn btn-sm btn-primary mx-1" onclick="ambil('<?= $data['token_pinjam']; ?>')">
                                <i class="fas fa-arrow-circle-left"></i> Konfirmasi
                            </button>
                        <?php } ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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

    function ambil(token) {
        Swal.fire({
            title: 'Pengambilan Dokumen',
            html: '<p>Token Pinjam : ' + token + '</p><h5 class="text-center">Konfirmasi pengambilan dokumen?</h5>',
            text: "Apakah Anda yakin akan mengambil dokumen dengan Token Pinjam = " + token + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Konfirmasi!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('/admin/peminjaman/konfirmasi'); ?>" + "/" + token,
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