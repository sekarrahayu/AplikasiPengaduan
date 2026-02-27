<?php
include '../koneksi.php';


$querykategori = mysqli_query($koneksi, "SELECT * FROM kategori");

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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0066a1 0%, #0099cc 35%, #87CEEB 65%, #ffffff 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.3);
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.4);
            border-color: rgba(255, 255, 255, 0.8);
            transform: translateX(-5px);
        }

        .back-btn i {
            font-size: 1.2rem;
        }

        .form-container {
            width: 100%;
            max-width: 420px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 102, 161, 0.2);
        }

        .form-container h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #0066a1;
            font-size: 1.4rem;
        }

        label {
            display: block;
            margin-top: 12px;
            color: #333;
            font-weight: 600;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #0099cc;
            box-shadow: 0 0 0 3px rgba(0, 153, 204, 0.08);
            background: #f8fbff;
        }

        button[type="submit"] {
            margin-top: 18px;
            width: 100%;
            padding: 10px;
            background: linear-gradient(135deg, #0099cc 0%, #0066a1 100%);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 102, 161, 0.3);
        }

        button[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 102, 161, 0.4);
            background: linear-gradient(135deg, #00c9ff 0%, #0099cc 100%);
        }

        .small-link{
            display:block; text-align:right; margin-top:8px; color:#0066a1; text-decoration:underline;
        }

        @media (max-width: 480px) {
            .form-container { padding: 20px; }
            .back-btn { padding: 8px 12px; font-size: 0.9rem; }
        }
    </style>
</head>
<body>

    <a href="datakategori.php" class="back-btn">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

    <!-- Form Edit (muncul jika edit diklik) -->
    <?php if ($editData): ?>
        <div class="form-container">
            <h3>Edit Kategori</h3>
            <form method="post">
                <input type="hidden" name="id_kategori" value="<?= $editData['id_kategori'] ?>">

                <label>Nama Kategori</label>
                <input type="text" name="jenis_kategori" value="<?= $editData['jenis_kategori'] ?>" required>

                <button type="submit" name="update">Simpan</button>
            </form>
        </div>
    <?php endif; ?>

</body>
</html>