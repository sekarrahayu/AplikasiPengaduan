<?php
include '../koneksi.php';


$querykategori = mysqli_query($koneksi, "SELECT * FROM kategori");

// Proses hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $hapuskategori = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

    if ($hapuskategori) {
        echo "<script>alert('Kategori berhasil dihapus'); window.location.href='datakategori.php';</script>";
        exit;
    } else {
        echo "<script>alert('Kategori gagal dihapus'); window.location.href='datakategori.php';</script>";
        exit;
    }
}

// Proses update kategori
if (isset($_POST['update'])) {
    $id = $_POST['id_kategori'];
    $nama = $_POST['jenis_kategori'];
    $update = mysqli_query($koneksi, "UPDATE kategori SET jenis_kategori='$nama' WHERE id_kategori='$id'");

    if ($update) {
        echo "<script>alert('Kategori berhasil diupdate'); window.location.href='datakategori.php';</script>";
        exit;
    } else {
        echo "<script>alert('Kategori gagal diupdate'); window.location.href='datakategori.php';</script>";
        exit;
    }
}

// Ambil data kategori
$querykategori = mysqli_query($koneksi, "SELECT * FROM kategori");

// Jika ada edit, ambil data kategori untuk form edit
$editData = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $editQuery = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
    $editData = mysqli_fetch_array($editQuery);
}

?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kategori</title>
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

        <!-- Form Edit (muncul jika edit diklik) -->
        <?php if ($editData): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Edit Kategori</h5>
                    <form method="post">
                        <input type="hidden" name="id_kategori" value="<?= $editData['id_kategori'] ?>">
                        <div class="mb-3">
                            <label>Nama Kategori</label>
                            <input type="text" name="jenis_kategori" class="form-control" value="<?= $editData['jenis_kategori'] ?>" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                        <a href="datakategori.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($datakategori = mysqli_fetch_array($querykategori)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $datakategori['tanggal']; ?></td>
                        <td><?php echo $datakategori['jenis_kategori']; ?></td>
                        <td>
                            <a href="?edit=<?= $datakategori['id_kategori'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="?hapus=<?= $datakategori['id_kategori'] ?>"
                                class="btn btn-danger"
                                onclick="return confirm('Apakah yakin ingin menghapus kategori ini?');">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>