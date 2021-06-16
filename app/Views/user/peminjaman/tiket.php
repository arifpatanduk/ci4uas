<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
            height: 20px;
            margin: 8px;
        }
    </style>
</head>

<body>
    <h5 style="color:'#dddddd'"><i>Tiket Peminjaman</i></h5>
    <p>
        <strong>
            <i>SIMAD - PTIK</i>
        </strong>
        <br>
        Surakarta, Indonesia
    </p>

    <h6>
        <div>Detail Peminjaman</div>
    </h6>
    <table>
        <tbody>
            <tr>
                <th>Token Pinjam</th>
                <td><?= $pinjam->token_pinjam; ?></td>
            </tr>
            <tr>
                <th>Tangal Pinjam</th>
                <td><?= $pinjam->tgl_pinjam; ?></td>
            </tr>
            <tr>
                <th>Jatuh Tempo</th>
                <td><?= $pinjam->deadline; ?></td>
            </tr>
        </tbody>
    </table>




    <h6>
        <div>Detail Dokumen</div>
    </h6>

    <table>
        <tbody>
            <tr>
                <th>Judul</th>
                <td><?= $doc->judul; ?></td>
            </tr>
            <tr>
                <th>Penulis</th>
                <td><?= $doc->penulis; ?></td>
            </tr>
            <tr>
                <th>Tahun Publikasi</th>
                <td><?= $doc->tahun_publikasi; ?></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>
                    <span><?= $doc->jenis; ?></span>
                    <span><?= $doc->nama; ?></span>
                </td>
            </tr>
        </tbody>
    </table>

    <p>Silahkan datang ke Kampus V Pabelan Gedung A untuk melakukan pengambilan dokumen fisik dengan menunjukkan Tiket Peminjaman ini.</p>

</body>

</html>