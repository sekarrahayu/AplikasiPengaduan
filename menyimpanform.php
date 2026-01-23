<?php 
session_start();

$koneksi = mysqli_connect("localhost","root","","aspirasi");
$nis = $_SESSION['nis'];

$kategori = $_POST['kategori'];

mysqli_query($koneksi, "INSERT INTO input_aspirasi SET id_kategori = '$kategori', lokasi = '$_POST[lokasi]', keterangan = '$_POST[keterangan]', nis = '$nis'");

//untuk query input ke option
$query = mysqli_query($koneksi, "SELECT * FROM kategori");
?>