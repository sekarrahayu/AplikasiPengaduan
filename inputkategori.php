<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f6ff;
        }
        .form-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 8px;
            background-color: #4da3ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h3>Tambah Kategori</h3>
        <form action="proseskategori.php" method="post">
            <label>ID Kategori</label>
            <input type="text" id="id_kategori" name="id_kategori" required>

            <label>Nama Kategori</label>
            <input type="text" id="jenis_kategori" name="jenis_kategori" required>

            <button type="submit">Simpan</button>
        </form>
    </div>

</body>
</html>
