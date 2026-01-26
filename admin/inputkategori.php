<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
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
            max-width: 400px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 102, 161, 0.2);
        }

        .form-container h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #0066a1;
            font-size: 1.5rem;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #333;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #0099cc;
            box-shadow: 0 0 0 3px rgba(0, 153, 204, 0.1);
            background: #f8fbff;
        }

        button {
            margin-top: 20px;
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

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 102, 161, 0.4);
            background: linear-gradient(135deg, #00c9ff 0%, #0099cc 100%);
        }

        @media (max-width: 480px) {
            .form-container {
                width: 100%;
                padding: 20px;
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

    <div class="form-container">
        <h3>Tambah Kategori</h3>
        <form action="proseskategori.php" method="post">

            <label>Nama Kategori</label>
            <input type="text" id="jenis_kategori" name="jenis_kategori" required>

            <button type="submit">Simpan</button>
        </form>
    </div>

</body>
</html>
