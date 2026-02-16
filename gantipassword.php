<?php
session_start();
include 'koneksi.php';

// cek login
if (!isset($_SESSION['nis'])) {
    header("Location: login.php");
    exit;
}

$nis = $_SESSION['nis'];
$pesan = '';
$tipe_pesan = ''; // success atau error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password_lama = $_POST['password_lama'] ?? '';
    $password_baru = $_POST['password_baru'] ?? '';
    $password_baru_confirm = $_POST['password_baru_confirm'] ?? '';

    if ($password_baru !== $password_baru_confirm) {
        $pesan = "Konfirmasi password baru tidak sama!";
        $tipe_pesan = 'error';
    } else {
        $query = mysqli_query($koneksi, "SELECT password FROM siswa WHERE nis = '$nis'");
        $data = mysqli_fetch_assoc($query);

        if (!$data) {
            $pesan = "Data user tidak ditemukan!";
            $tipe_pesan = 'error';
        } elseif ($password_lama !== $data['password']) {
            $pesan = "Password lama salah!";
            $tipe_pesan = 'error';
        } else {
            $update = mysqli_query($koneksi, "UPDATE siswa SET password = '$password_baru' WHERE nis = '$nis'");
            if ($update) {
                $pesan = "Password berhasil diubah!";
                $tipe_pesan = 'success';
            } else {
                $pesan = "Terjadi kesalahan: " . mysqli_error($koneksi);
                $tipe_pesan = 'error';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ganti Password</title>
<style>
    /* Page background gradient: ocean blue -> skyblue -> white */
    html, body {
        height: 100%;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: linear-gradient(135deg, #0077be 0%, #87CEEB 55%, #ffffff 100%);
        -webkit-font-smoothing:antialiased;
        -moz-osx-font-smoothing:grayscale;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px;
        box-sizing: border-box;
    }

    .card {
        background: rgba(255,255,255,0.95);
        border-radius: 10px;
        padding: 34px 26px 22px 26px;
        position: relative;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        max-width: 420px;
        width: 100%;
    }

    h1 {
        margin: 0 0 14px 0;
        color: #034f84;
        font-size: 20px;
        text-align: center;
    }

    input[type="password"], input[type="text"], input[type="email"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #cbdfe8;
        border-radius: 6px;
        box-sizing: border-box;
        margin-bottom: 12px;
    }

    input[type="submit"] {
        width: 100%;
        background: linear-gradient(90deg, #0077be, #87CEEB);
        color: white;
        border: none;
        padding: 10px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
    }

    .pesan-success { color: #0b7a3a; font-weight: 700; }
    .pesan-error { color: #b51d1d; font-weight: 700; }

    .muted { color: #5b6b73; font-size: 13px; }
    /* Back button */
    .btn-kembali {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 8px;
        background: linear-gradient(90deg, rgba(0,119,190,0.08), rgba(135,206,235,0.06));
        color: #034f84;
        text-decoration: none;
        font-weight: 600;
        border: 1px solid rgba(3,79,132,0.12);
        box-shadow: 0 6px 16px rgba(3,79,132,0.06);
        transition: transform .12s ease, box-shadow .12s ease, background .12s ease;
    }

    .btn-kembali:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 26px rgba(3,79,132,0.12);
        background: linear-gradient(90deg, #0077be, #87CEEB);
        color: #ffffff;
        border-color: rgba(3,79,132,0.18);
    }
    /* position the back button inside the card */
    .card .btn-kembali {
        position: absolute;
        top: 12px;
        left: 12px;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 13px;
    }
</style>
</head>
<body>
    <div class="card">
        <a href="halamansiswa.php" class="btn-kembali">⬅ Kembali</a>
    <h1>Ganti Password</h1>

    <?php if($pesan): ?>
        <p class="<?= $tipe_pesan == 'success' ? 'pesan-success' : 'pesan-error' ?>">
            <?= $pesan ?>
        </p>
    <?php endif; ?>

    <form action="" method="POST">
        <input type="password" name="password_lama" placeholder="Password Lama" required>
        <input type="password" name="password_baru" placeholder="Password Baru" required>
        <input type="password" name="password_baru_confirm" placeholder="Konfirmasi Password Baru" required>
        <input type="submit" value="Ganti Password">
    </form>
</div>

</body>
</html>
