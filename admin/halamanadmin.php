<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Aspirasi</title>
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
        }

        /* Navbar */
        nav {
            background: linear-gradient(90deg, #0066a1 0%, #0099cc 50%, #00c9ff 100%);
            padding: 1rem 2rem;
            box-shadow: 0 4px 15px rgba(0, 102, 161, 0.4);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav .logo {
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        nav .logo:hover {
            transform: scale(1.05);
        }

        nav .logo i {
            font-size: 2rem;
        }

        nav .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        nav .nav-menu a,
        nav .nav-menu button {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            background: none;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }

        nav .nav-menu a:hover,
        nav .nav-menu button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        nav .logout-btn {
            background: rgba(255, 255, 255, 0.3) !important;
            padding: 0.6rem 1.2rem !important;
            border-radius: 20px !important;
            border: 1px solid rgba(255, 255, 255, 0.5) !important;
        }

        nav .logout-btn:hover {
            background: rgba(255, 255, 255, 0.4) !important;
            border-color: rgba(255, 255, 255, 0.8) !important;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 3rem 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .menu-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 102, 161, 0.2);
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0, 102, 161, 0.35);
            background: linear-gradient(135deg, #0099cc15 0%, #0066a115 100%);
        }

        .menu-card i {
            font-size: 3rem;
            color: #0066a1;
            transition: all 0.3s ease;
        }

        .menu-card:hover i {
            color: #0099cc;
            transform: scale(1.1);
        }

        .menu-card h3 {
            font-size: 1.3rem;
            color: #0066a1;
            margin: 0;
        }

        .menu-card p {
            color: #666;
            font-size: 0.95rem;
            margin: 0;
        }

        @media (max-width: 768px) {
            nav .container {
                flex-direction: column;
                gap: 1rem;
            }

            nav .nav-menu {
                gap: 1rem;
            }

            h1 {
                font-size: 1.8rem;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="container">
            <a href="halamanadmin.php" class="logo">
                <i class="bi bi-heart-fill"></i>
                Aspirasi
            </a>
            <div class="nav-menu">
                <a href="#data-aspirasi">Data Aspirasi</a>
                <a href="#histori">Histori</a>
                <a href="../login.php" class="logout-btn">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h1><i class="bi bi-shield-check"></i> Dashboard Admin</h1>
            
            <div class="menu-grid">
                <a href="inputdatasiswa.php" class="menu-card">
                    <i class="bi bi-person-plus"></i>
                    <h3>Input Data Siswa</h3>
                    <p>Tambahkan data siswa baru ke sistem</p>
                </a>
                <a href="inputkategori.php" class="menu-card">
                    <i class="bi bi-tag-fill"></i>
                    <h3>Input Kategori Baru</h3>
                    <p>Tambahkan kategori pengaduan baru</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>