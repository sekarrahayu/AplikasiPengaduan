<?php
session_start();
include '../koneksi.php';

// ambil filter dari URL (GET)
$dari = isset($_GET['dari']) ? $_GET['dari'] : '';
$sampai = isset($_GET['sampai']) ? $_GET['sampai'] : '';
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

$where = [];

// filter tanggal
if ($dari && $sampai) {
  $where[] = "input_aspirasi.date BETWEEN '$dari' AND '$sampai'";
} elseif ($dari) {
  $where[] = "input_aspirasi.date >= '$dari'";
} elseif ($sampai) {
  $where[] = "input_aspirasi.date <= '$sampai'";
}

// filter nama
if ($nama) {
  $where[] = "siswa.nama LIKE '%$nama%'";
}

// filter kategori
if ($kategori) {
  $where[] = "input_aspirasi.id_kategori = '$kategori'";
}

// filter status
if ($status) {
  $where[] = "input_aspirasi.status = '$status'";
}

$conditions = ["input_aspirasi.status IN ('Selesai','Ditolak')"]; // default
if (!empty($where)) {
    $conditions = array_merge($conditions, $where); // gabungkan
}

$whereSQL = '';
if (!empty($conditions)) {
    $whereSQL = 'WHERE ' . implode(' AND ', $conditions);
}





// ambil data yang statusnya BUKAN Diproses
$query = mysqli_query($koneksi, "
    SELECT 
        input_aspirasi.date,
        kategori.jenis_kategori,
        input_aspirasi.lokasi,
        input_aspirasi.keterangan,
        input_aspirasi.status,
        input_aspirasi.feedback,
        siswa.nama
    FROM input_aspirasi
    INNER JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori
    INNER JOIN siswa ON input_aspirasi.nis = siswa.nis
    $whereSQL
    ORDER BY input_aspirasi.date DESC
");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{
            --ocean:#003f5c; /* deep ocean */
            --mid:#0077be;   /* mid blue */
            --sky:#87CEEB;   /* sky */
            --card-bg: #ffffff;
        }
        *{box-sizing:border-box}
        body{
            margin:0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--ocean) 0%, var(--mid) 45%, var(--sky) 80%, #ffffff 100%);
            min-height:100vh;
            color:#03333f;
            display:flex;
            align-items:flex-start;
            padding:40px 16px;
        }
        .container{
            max-width:1100px;
            width:100%;
            margin:0 auto;
        }
        h3{
            color:var(--card-bg);
            margin-bottom:1rem;
            text-shadow:0 2px 6px rgba(0,0,0,0.15);
        }
        table{
            width:100%;
            border-collapse:collapse;
            background:var(--card-bg);
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 8px 30px rgba(2,40,60,0.12);
        }
        thead th{
            background:linear-gradient(90deg,var(--ocean),var(--mid));
            color:white;
            border:0;
            padding:14px 12px;
            text-align:center;
            font-weight:600;
        }
        tbody td{
            padding:12px 14px;
            vertical-align:middle;
            border-bottom:1px solid #f1f5f9;
            color:#123f4f;
        }
        tbody tr:last-child td{border-bottom:0}
        .badge-custom-selesai{
            background: linear-gradient(90deg,#28a745,#2ecc71);
            color:white;
            padding:6px 10px;
            border-radius:12px;
            font-weight:600;
            font-size:0.85rem;
        }
        .badge-custom-ditolak{
            background: linear-gradient(90deg,#dc3545,#c82333);
            color:white;
            padding:6px 10px;
            border-radius:12px;
            font-weight:600;
            font-size:0.85rem;
        }
        .btn-back{
            display:inline-block;
            margin-top:16px;
            background:linear-gradient(90deg,var(--mid),#00bfff);
            color:white;
            border:none;
            padding:10px 14px;
            border-radius:10px;
            text-decoration:none;
            box-shadow:0 8px 20px rgba(3,63,92,0.18);
        }
        @media (max-width:768px){
            body{padding:24px 12px}
            thead th{font-size:0.85rem}
            tbody td{font-size:0.92rem}
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h3 class="mb-4">📜 History Pengaduan</h3>

     <form method="GET" class="row g-3 mb-4">

      <!-- FORM FILTER TANGGAL -->
      <div class="col-auto">
        <label>Dari Tanggal</label>
        <input type="date" name="dari" class="form-control" value="<?= isset($_GET['dari']) ? $_GET['dari'] : '' ?>">
      </div>
      <div class="col-auto">
        <label>Sampai Tanggal</label>
        <input type="date" name="sampai" class="form-control" value="<?= isset($_GET['sampai']) ? $_GET['sampai'] : '' ?>">
      </div>

      <!-- filter nama siswa -->
      <div class="col-auto">
        <label>Nama Siswa</label>
        <input type="text" name="nama" class="form-control" placeholder="Cari nama siswa" value="<?= isset($_GET['nama']) ? $_GET['nama'] : '' ?>">
      </div>

      <!-- filter kategori -->
      <div class="col-auto">
        <label>Kategori</label>
        <select name="kategori" class="form-select">
          <option value="">-- Semua Kategori --</option>
          <?php
          $querykategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY jenis_kategori ASC");
          while ($kat = mysqli_fetch_array($querykategori)) {
            $selected = (isset($_GET['kategori']) && $_GET['kategori'] == $kat['id_kategori']) ? 'selected' : '';
            echo "<option value='{$kat['id_kategori']}' $selected>{$kat['jenis_kategori']}</option>";
          }
          ?>
        </select>
      </div>

      <!-- filter status -->
      <div class="col-auto">
        <label>Status</label>
        <select name="status" class="form-select">
          <option value="">-- Semua Status --</option>
          <option value="Diproses" <?= (isset($_GET['status']) && $_GET['status'] == 'Diproses') ? 'selected' : '' ?>>Diproses</option>
          <option value="Selesai" <?= (isset($_GET['status']) && $_GET['status'] == 'Selesai') ? 'selected' : '' ?>>Selesai</option>
          <option value="Ditolak" <?= (isset($_GET['status']) && $_GET['status'] == 'Ditolak') ? 'selected' : '' ?>>Ditolak</option>
        </select>
      </div>

      <div class="col-auto align-self-end">
        <button type="submit" class="btn btn-primary mb-3">
          <i class="bi bi-filter"></i> Filter
        </button>
        <a href="historiadmin.php" class="btn btn-secondary mb-3">
          <i class="bi bi-x-circle"></i> Reset
        </a>
      </div>
    </form>

    <table class="table table-bordered table-hover bg-white">
        <thead class="table-primary text-center">
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
            if (mysqli_num_rows($query) > 0) {
                while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $data['date']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['jenis_kategori']; ?></td>
                    <td><?= $data['lokasi']; ?></td>
                    <td><?= $data['keterangan']; ?></td>
                    <td>
                        <span class="badge 
                            <?= $data['status'] == 'Selesai' ? 'bg-success' : 'bg-danger'; ?>">
                            <?= $data['status']; ?>
                        </span>
                    </td>
                    <td><?= $data['feedback']; ?></td>
                </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        Belum ada history pengaduan
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="halamanadmin.php" class="btn btn-secondary">⬅ Kembali</a>
</div>

</body>
</html>
