<?php
include 'koneksi.php'; // pastikan koneksi ke database

session_start();
if (!isset($_SESSION['nis'])) {
    header("Location: login.php"); // kalau belum login, redirect
    exit;
}

// ambil semua kategori
$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY jenis_kategori ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <style>
        /* Gradient background: ocean blue -> skyblue -> white */
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
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

        .form-container {
            background: rgba(255,255,255,0.95);
            padding: 36px 30px 26px 30px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            max-width: 520px;
            width: 100%;
            position: relative;
        }

        .form-container h1 {
            color: #034f84;
            text-align: center;
            margin-bottom: 24px;
            font-size: 20px;
        }

        .form-group { margin-bottom: 16px; }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbdfe8;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #0077be;
            box-shadow: 0 0 6px rgba(0,119,190,0.18);
        }

        textarea { resize: vertical; min-height: 100px; }

        .button-group { display: flex; gap: 10px; margin-top: 20px; }

        button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: transform .12s ease, box-shadow .12s ease;
        }

        .submit-btn {
            background: linear-gradient(90deg,#0077be,#87CEEB);
            color: #fff;
            box-shadow: 0 8px 20px rgba(3,79,132,0.08);
        }

        .submit-btn:hover { transform: translateY(-2px); }

        .reset-btn {
            background: #f44336;
            color: white;
        }

        .reset-btn:hover { opacity: .95; }

        /* Back button inside form container (top-left) */
        .btn-kembali {
            position: absolute;
            top: 12px;
            left: 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 6px;
            background: linear-gradient(90deg, rgba(0,119,190,0.08), rgba(135,206,235,0.06));
            color: #034f84;
            text-decoration: none;
            font-weight: 600;
            border: 1px solid rgba(3,79,132,0.12);
        }

        .btn-kembali:hover {
            background: linear-gradient(90deg,#0077be,#87CEEB);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(3,79,132,0.12);
        }
    </style>
</head>

<body>
    <div class="form-container">
        <a href="halamansiswa.php" class="btn-kembali">⬅ Kembali</a>
        <h1>Form Pengaduan</h1>
        <form method="POST" action="menyimpanform.php">

            <div class="form-group">
                <label>Kategori:</label>
                <select id="kategori" name="kategori" required>
                    <option value="">-- pilih kategori --</option>
                    <?php
                    // loop untuk menampilkan semua kategori
                    while($kategori = mysqli_fetch_array($queryKategori)){
                        echo '<option value="'.$kategori['id_kategori'].'">'.$kategori['jenis_kategori'].'</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" required>
            </div>

            <div class="form-group">
                <label>keterangan:</label>
                <textarea id="keterangan" name="keterangan" required></textarea>
            </div>

            <div class="button-group">
                <button type="submit" class="submit-btn">Submit</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
        </form>
    </div>
</body>

</html>