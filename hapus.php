<?php
require_once 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: data.php');
    exit;
}

$id = $_POST['id'];
echo $id;

$sql = 'DELETE FROM anggota WHERE id = ?';
$stmt = mysqli_prepare($koneksi, $sql);

mysqli_stmt_bind_param($stmt, 'i', $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header('Location: data.php');
    exit;
} else {
    die("Gagal menghapus data: " . mysqli_stmt_error($stmt));
}