<?php
require_once "koneksi.php";
$sql = "SELECT * FROM anggota ORDER BY id DESC";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f5;
            margin: 40px;
            color: #333333;
        }

        h1 {
            color: #006e59;
            font-size: 28px;
            margin-bottom: 25px;
        }

        p {
            font-size: 14px;
            color: #555555;
            margin-top: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        th {
            background-color: #006e59;
            color: white;
            padding: 15px 12px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 14px 12px;
            border: none;
            border-bottom: 1px solid #dddddd;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f8faf9;
        }

        tr:hover {
            background-color: #eaf4ef;
        }

        a, button {
            text-decoration: none;
            padding: 9px 14px;
            border: none;
            border-radius: 5px;
            font-size: 13px;
            color: white;
            cursor: pointer;
            display: inline-block;
        }

        a[href="form_anggota.php"] {
            background-color: #006e59;
        }

        a[href^="detail.php"] {
            background-color: #477baf;
        }

        a[href^="edit_anggota.php"] {
            background-color: #ce8b23;
        }

        button {
            background-color: #c94b4b;
        }

        a:hover, button:hover {
            opacity: 0.8;
        }

        td:last-child {
            white-space: nowrap;
        }
    </style>
</head>
<body>

    <h1>Data Anggota Perpustakaan</h1>

    <a href="form_anggota.php">Tambah Anggota</a>

    <p>Jumlah Anggota: <?php echo $jumlah; ?></p>

    <table>
        <tr>
            <th>No</th>
            <th>Nomor Anggota</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Nomor HP</th>
            <th>Jenis Anggota</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; while ($baris = mysqli_fetch_assoc($hasil)) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($baris['no_anggota']); ?></td>
            <td><?php echo htmlspecialchars($baris['nama_lengkap']); ?></td>
            <td><?php echo htmlspecialchars($baris['email']); ?></td>
            <td><?php echo htmlspecialchars($baris['no_hp']); ?></td>
            <td><?php echo htmlspecialchars($baris['jenis_anggota']); ?></td>
            <td><?php echo htmlspecialchars($baris['alamat']); ?></td>
            <td>


                <a href="edit_anggota.php?id=<?php echo (int) $baris['id']; ?>">
                    Edit
                </a>
                
                <form action="hapus.php" method="POST"
                    style="display: inline;"
                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">

                    <input type="hidden" name="id"
                        value="<?php echo (int) $baris['id']; ?>">

                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <?php mysqli_free_result($hasil); ?>

</body>
</html>