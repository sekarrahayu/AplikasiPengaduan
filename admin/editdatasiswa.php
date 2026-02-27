<?php
include '../koneksi.php';

// Ambil NIS dari URL
$nis_edit = $_GET['edit'] ?? '';

if (!$nis_edit) {
    echo "<script>alert('NIS tidak ditemukan'); window.location.href='datasiswa.php';</script>";
    exit;
}

// Ambil data siswa berdasarkan NIS
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis_edit'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data siswa tidak ditemukan'); window.location.href='datasiswa.php';</script>";
    exit;
}

// Proses update jika tombol update ditekan
if (isset($_POST['update'])) {
    $nis_baru = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];

    $update = mysqli_query($koneksi, "
        UPDATE siswa SET 
            nis='$nis_baru',
            nama='$nama',
            kelas='$kelas',
            password='$password'
        WHERE nis='$nis_edit'
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diubah'); window.location.href='datasiswa.php';</script>";
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
<a href="datasiswa.php" class="back-btn">
    <i class="bi bi-arrow-left"></i>
    Kembali
</a>

<div class="form-container">
    <h3>Edit Data Siswa</h3>
    <form method="POST">
        <input type="hidden" name="nis_lama" value="<?= $data['nis'] ?>">

        <label>NIS</label>
        <input type="text" id="nis" name="nis" value="<?= $data['nis'] ?>" required>

        <label>Nama</label>
        <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required>

        <label>Kelas</label>
        <input type="text" id="kelas" name="kelas" value="<?= $data['kelas'] ?>" required>

        <label>Password</label>
        <input type="text" id="password" name="password" value="<?= $data['password'] ?>" required>

        <button type="submit" name="update">Simpan</button>
    </form>
</div>
</body>
</html>