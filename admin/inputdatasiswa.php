<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Data Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #0066a1 0%, #0099cc 35%, #87CEEB 65%, #ffffff 100%);
            padding: 20px;
            position: relative;
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

        .card {
            background: white;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 102, 161, 0.2);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #0066a1;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 2px solid #ddd;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #0099cc;
            box-shadow: 0 0 0 3px rgba(0, 153, 204, 0.1);
            background: #f8fbff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #0099cc 0%, #0066a1 100%);
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 102, 161, 0.3);
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 102, 161, 0.4);
            background: linear-gradient(135deg, #00c9ff 0%, #0099cc 100%);
        }

        @media (max-width: 480px) {
            .card {
                padding: 25px;
            }

            .back-btn {
                padding: 8px 12px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <a href="halamanadmin.php" class="back-btn">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

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
