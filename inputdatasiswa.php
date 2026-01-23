<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f2f4f8;
        }

        .card {
            background: white;
            padding: 30px;
            width: 320px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #444;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #667eea;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #556cd6;
        }
    </style>
</head>
<body>

    <div class="card">
        <h2>Input Data Siswa</h2>

        <form method="POST" action="prosesdatasiswa.php">
            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="nis" placeholder="Masukkan NIS" required>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Masukkan Nama" required>
            </div>

            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" placeholder="Contoh: X RPL 1" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit">Simpan</button>
        </form>
    </div>

</body>
</html>
