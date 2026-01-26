<?php 
$koneksi = mysqli_connect("localhost","root","","aspirasi");

mysqli_query($koneksi, "INSERT INTO kategori SET id_kategori = NULL, jenis_kategori = '$_POST[jenis_kategori]'");
?>