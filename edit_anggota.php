<?php
require_once "koneksi.php";

$id = $_GET['id'];

$sql = "SELECT * FROM anggota WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0 ) {
    die("data anggota tidak ditemukan.");
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
</head>
<body>
    <h1>Edit Data Anggota Perpustakaan</h1>
    <form action="proses_update.php" method="POST">

        <input type="hidden" name="id"
            value="<?php echo (int) $data['id']; ?>">

        <label>Nomor Anggota</label><br>
        <input type="text" name="no_anggota"
            value="<?php echo htmlspecialchars($data['no_anggota']); ?>" 
            maxlength="15" required>
        <br><br>

        <label>Nama Lengkap</label><br>
        <input type="text" name="nama_lengkap"
            value="<?php echo htmlspecialchars($data['nama_lengkap']); ?>" 
            maxlength= "100" required>
        <br><br>

        <label>Email</label><br>
        <input type="email" name="email"
            value="<?php echo htmlspecialchars($data['email']); ?>" 
             maxlength= "100" required>
        <br><br>

        <label>Nomor HP</label><br>
        <input type="text" name="no_hp"
            value="<?php echo htmlspecialchars($data['no_hp']); ?>" 
             maxlength= "15" required>
        <br><br>

        <label>Jenis Anggota</label><br>
        <select name="jenis_anggota">
            <option value="Mahasiswa"
                <?php if ($data['jenis_anggota'] == 'Mahasiswa') echo 'selected'; ?>>
                Mahasiswa
            </option>

            <option value="Dosen"
                <?php if ($data['jenis_anggota'] == 'Dosen') echo 'selected'; ?>>
                Dosen
            </option>

            <option value="Tenaga Kependidikan"
                <?php if ($data['jenis_anggota'] == 'Tenaga Kependidikan') echo 'selected'; ?>>
                Tenaga Kependidikan
            </option>
        </select>
        <br><br>

        <label>Alamat</label><br>
        <textarea name="alamat" required><?php echo htmlspecialchars($data['alamat']); ?></textarea>
        <br><br>

        <button type="submit" name="update">Perubahan disimpan</button>

        <a href="data.php">Kembali</a>
    </form>
</body>
</html>