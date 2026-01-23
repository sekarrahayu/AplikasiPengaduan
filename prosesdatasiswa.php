<?php 
$koneksi = mysqli_connect("localhost","root","","aspirasi");

mysqli_query($koneksi, "INSERT INTO siswa SET nis = '$_POST[nis]', nama = '$_POST[nama]', kelas = '$_POST[kelas]', password = '$_POST[password]'");
?>