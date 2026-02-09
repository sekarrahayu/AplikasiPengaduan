<?php
session_start();
if (!isset($_SESSION['nis'])) {
    header("Location: login.php");
    exit;
}

$koneksi = mysqli_connect("localhost", "root", "", "aspirasi");

$nis = mysqli_real_escape_string($koneksi, $_SESSION['nis']);
$kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
$lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
$keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
$tanggal = date('Y-m-d');

// Insert ke tabel input_aspirasi
$query = "INSERT INTO input_aspirasi (nis, id_kategori, lokasi, keterangan, date, status, feedback) 
          VALUES ('$nis', '$kategori', '$lokasi', '$keterangan', '$tanggal', 'Diproses', '')";

if(mysqli_query($koneksi, $query)) {
    header("Location: halamansiswa.php?pesan=success"); // redirect ke halaman siswa
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>
