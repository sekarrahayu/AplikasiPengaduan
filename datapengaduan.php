<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['nis'])) {
    header("Location: login.php");
    exit;
}

$nis = mysqli_real_escape_string($koneksi, $_SESSION['nis']);

$queryaspirasi = mysqli_query($koneksi, "
SELECT input_aspirasi.id_pelaporan,
       input_aspirasi.nis, 
       siswa.nama, 
       input_aspirasi.date, 
       kategori.jenis_kategori, 
       input_aspirasi.lokasi, 
       input_aspirasi.keterangan, 
       input_aspirasi.status, 
       input_aspirasi.feedback 
FROM input_aspirasi 
INNER JOIN kategori 
    ON input_aspirasi.id_kategori = kategori.id_kategori 
INNER JOIN siswa 
    ON input_aspirasi.nis = siswa.nis
WHERE input_aspirasi.nis = '$nis'
ORDER BY input_aspirasi.date DESC
");



?>

<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Aspirasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <style>
    body {
      background: linear-gradient(135deg, #006994 0%, #4da6d6 50%, #ffffff 100%);
      min-height: 100vh;
      padding: 20px;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
    }

    table {
      background-color: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      border-radius: 10px;
      overflow: hidden;
    }

    thead {
      background: linear-gradient(135deg, #005178 0%, #0066a1 100%);
      color: white;
    }

    th {
      font-weight: 600;
      padding: 15px;
      text-align: center;
    }

    td {
      padding: 12px 15px;
      border-bottom: 1px solid #e9ecef;
    }

    tbody tr:hover {
      background-color: #e3f2fd;
      transition: background-color 0.2s ease;
    }

    h1 {
      color: white;
      margin-bottom: 30px;
      font-weight: 700;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="mb-0">Data Pengaduan</h1>
      <a href="halamansiswa.php" class="btn btn-light">
        <i class="bi bi-arrow-left"></i> Kembali
      </a>
    </div>


    <table class="table table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Nama</th>
          <th>Kategori</th>
          <th>Lokasi</th>
          <th>Keterangan</th>
          <th>Status</th>
          <th>Feedback</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($datapengaduan = mysqli_fetch_array($queryaspirasi)) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $datapengaduan['date']; ?></td>
            <td><?php echo $datapengaduan['nama']; ?></td>
            <td><?php echo $datapengaduan['jenis_kategori']; ?></td>
            <td><?php echo $datapengaduan['lokasi']; ?></td>
            <td><?php echo $datapengaduan['keterangan']; ?></td>
            <td><?php echo $datapengaduan['status']; ?></td>
            <td><?php echo $datapengaduan['feedback']; ?></td>

          </tr>

         
        <?php } ?>
      </tbody>
    </table>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>