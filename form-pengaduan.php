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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        .form-container h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

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
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .reset-btn {
            background-color: #f44336;
            color: white;
        }

        .reset-btn:hover {
            background-color: #da190b;
        }
    </style>
</head>

<body>
    <div class="form-container">
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