<?php
include '../koneksi.php';

$querydatasiswa = mysqli_query($koneksi, "SELECT * FROM siswa");

// Proses hapus
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  $hapussiswa = mysqli_query($koneksi, "DELETE FROM siswa WHERE nis='$id'");

  if ($hapussiswa) {
    echo "<script>alert('Data Siswa berhasil dihapus'); window.location.href='datasiswa.php';</script>";
    exit;
  } else {
    echo "<script>alert('Siswa gagal dihapus'); window.location.href='datasiswa.php';</script>";
    exit;
  }
}

// Proses update
if (isset($_POST['update'])) {
    $nis_lama = $_POST['nis_lama'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];

    $update = mysqli_query($koneksi, "
        UPDATE siswa SET 
            nis='$nis',
            nama='$nama',
            kelas='$kelas',
            password='$password'
        WHERE nis='$nis_lama'
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diubah'); window.location.href='datasiswa.php';</script>";
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}

// Ambil semua data siswa
$querydatasiswa = mysqli_query($koneksi, "SELECT * FROM siswa");

// Cek nis yang akan diedit
$nis_edit = $_GET['edit'] ?? '';

?>

<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Siswa</title>
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
      <h1 class="mb-0">Data Siswa</h1>
      <a href="halamanadmin.php" class="btn btn-light">
        <i class="bi bi-arrow-left"></i> Kembali
      </a>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Password</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_array($querydatasiswa)) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nis']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['kelas']; ?></td>
            <td><?php echo $data['password']; ?></td>
            <td>
               <a href="?edit=<?= $data['nis']; ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="?hapus=<?= $data['nis'] ?>"
                class="btn btn-danger"
                onclick="return confirm('Apakah yakin ingin menghapus siswa ini?');">
                Hapus
              </a>
            </td>

          </tr>

           <?php if ($nis_edit == $data['nis']) { ?>
            <!-- Form Edit Inline -->
            <tr style="background:#f9f9f9;">
                <td colspan="6">
                    <form method="POST" class="d-flex gap-2 flex-wrap align-items-center">
                        <input type="hidden" name="nis_lama" value="<?= $data['nis'] ?>">
                        <input type="text" name="nis" value="<?= $data['nis'] ?>" class="form-control" placeholder="NIS" required>
                        <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" placeholder="Nama" required>
                        <input type="text" name="kelas" value="<?= $data['kelas'] ?>" class="form-control" placeholder="Kelas" required>
                        <input type="text" name="password" value="<?= $data['password'] ?>" class="form-control" placeholder="Password" required>
                        <button type="submit" name="update" class="btn btn-success">Simpan</button>
                        <a href="datasiswa.php" class="btn btn-secondary">Batal</a>
                    </form>
                </td>
            </tr>
            <?php } ?>


        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>