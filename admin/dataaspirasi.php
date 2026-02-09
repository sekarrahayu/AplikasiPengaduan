<?php
include '../koneksi.php';

// ambil filter dari URL (GET)
$dari = isset($_GET['dari']) ? $_GET['dari'] : '';
$sampai = isset($_GET['sampai']) ? $_GET['sampai'] : '';

$where = '';
if ($dari && $sampai) {
    $where = "WHERE date BETWEEN '$dari' AND '$sampai'";
} elseif ($dari) {
    $where = "WHERE date >= '$dari'";
} elseif ($sampai) {
    $where = "WHERE date <= '$sampai'";
}

$queryaspirasi = mysqli_query($koneksi, "SELECT input_aspirasi.id_pelaporan,input_aspirasi.nis, input_aspirasi.date, kategori.jenis_kategori, input_aspirasi.lokasi, input_aspirasi.keterangan, input_aspirasi.status, input_aspirasi.feedback FROM input_aspirasi INNER JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori $where
  ORDER BY input_aspirasi.date DESC");
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
      <a href="halamanadmin.php" class="btn btn-light">
        <i class="bi bi-arrow-left"></i> Kembali
      </a>
    </div>
    <!-- FORM FILTER TANGGAL -->
    <form method="GET" class="row g-3 mb-4">
      <div class="col-auto">
        <label>Dari Tanggal</label>
        <input type="date" name="dari" class="form-control" value="<?= isset($_GET['dari']) ? $_GET['dari'] : '' ?>">
      </div>
      <div class="col-auto">
        <label>Sampai Tanggal</label>
        <input type="date" name="sampai" class="form-control" value="<?= isset($_GET['sampai']) ? $_GET['sampai'] : '' ?>">
      </div>
      <div class="col-auto align-self-end">
        <button type="submit" class="btn btn-primary mb-3">
          <i class="bi bi-filter"></i> Filter
        </button>
        <a href="dataaspirasi.php" class="btn btn-secondary mb-3">
          <i class="bi bi-x-circle"></i> Reset
        </a>
      </div>
    </form>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>NIS</th>
          <th>Kategori</th>
          <th>Lokasi</th>
          <th>Keterangan</th>
          <th>Status</th>
          <th>Feedback</th>
          <th>Aksi</th>
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
            <td><?php echo $datapengaduan['nis']; ?></td>
            <td><?php echo $datapengaduan['jenis_kategori']; ?></td>
            <td><?php echo $datapengaduan['lokasi']; ?></td>
            <td><?php echo $datapengaduan['keterangan']; ?></td>
            <td><?php echo $datapengaduan['status']; ?></td>
            <td><?php echo $datapengaduan['feedback']; ?></td>
            <td class="text-center">
              <button
                class="btn btn-sm btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#balasModal<?php echo $no; ?>">
                <i class="bi bi-reply"></i> Balas
              </button>
            </td>

          </tr>

          <!-- jendela feedback -->
          <div class="modal fade" id="balasModal<?php echo $no; ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <form action="proses_balas.php" method="POST">
                  <!-- id penghubung untuk update -->
                  <input type="hidden" name="id_aspirasi" value="<?php echo $datapengaduan['id_pelaporan']; ?>">

                  <div class="modal-header">
                    <h5 class="modal-title">Balas Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body">

                    <!-- hidden ID (WAJIB ADA) -->
                    <input type="hidden" name="nis" value="<?php echo $datapengaduan['nis']; ?>">

                    <div class="row mb-2">
                      <div class="col">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $datapengaduan['date']; ?>" readonly>
                      </div>
                      <div class="col">
                        <label>NIS</label>
                        <input type="text" class="form-control" value="<?php echo $datapengaduan['nis']; ?>" readonly>
                      </div>
                    </div>

                    <div class="mb-2">
                      <label>Kategori</label>
                      <input type="text" class="form-control" value="<?php echo $datapengaduan['jenis_kategori']; ?>" readonly>
                    </div>

                    <div class="mb-2">
                      <label>Lokasi</label>
                      <input type="text" class="form-control" value="<?php echo $datapengaduan['lokasi']; ?>" readonly>
                    </div>

                    <div class="mb-2">
                      <label>Keterangan</label>
                      <textarea class="form-control" rows="3" readonly><?php echo $datapengaduan['keterangan']; ?></textarea>
                    </div>

                    <!-- STATUS BISA DIUBAH -->
                    <div class="mb-2">
                      <label>Status</label>
                      <select name="status" class="form-select">
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Ditolak">Ditolak</option>
                      </select>
                    </div>

                    <!-- FEEDBACK BISA DIISI -->
                    <div class="mb-2">
                      <label>Feedback</label>
                      <textarea name="feedback" class="form-control" rows="3"><?php echo $datapengaduan['feedback']; ?></textarea>
                    </div>

                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                      <i class="bi bi-save"></i> Simpan
                    </button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        <?php } ?>
      </tbody>
    </table>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>