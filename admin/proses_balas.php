<?php
include '../koneksi.php';

$id       = $_POST['id_aspirasi'];
$status   = $_POST['status'];
$feedback = $_POST['feedback'];

mysqli_query($koneksi, "
  UPDATE input_aspirasi
  SET status='$status', feedback='$feedback'
  WHERE id_pelaporan='$id'
");

header("Location: dataaspirasi.php");
exit;
