<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi - Website Pengaduan SMK TI Muhammadiyah Cikampek</title>
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
        }

        nav .logo i {
            font-size: 2rem;
        }

        /* Main Content */
        .hero {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
            text-align: center;
        }

        .hero-content {
            max-width: 700px;
        }

        .hero-content h1 {
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .hero-content h1 i {
            color: #ffffff;
            font-size: 3.2rem;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .hero-content p {
            color: #ffffff;
            font-size: 1.3rem;
            line-height: 1.8;
            margin-bottom: 3rem;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            font-weight: 500;
        }

        /* Login Button */
        .login-btn {
            display: inline-flex;
            background: linear-gradient(135deg, #0099CC 0%, #0066a1 50%, #004d7a 100%);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 102, 161, 0.35);
            cursor: pointer;
            align-items: center;
            gap: 10px;
        }

        .login-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0, 102, 161, 0.5);
            background: linear-gradient(135deg, #00c9ff 0%, #0099cc 50%, #0066a1 100%);
        }

        .login-btn i {
            font-size: 1.3rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav .container {
                flex-direction: column;
                gap: 1rem;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .login-btn {
                padding: 0.8rem 2rem;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="container">
            <a href="#" class="logo">
                <i class="bi bi-heart-fill"></i>
                Aspirasi
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" style="color: white;" width="70" height="70" fill="currentColor" class="bi bi-bluesky" viewBox="0 0 16 16">
                    <path d="M3.468 1.948C5.303 3.325 7.276 6.118 8 7.616c.725-1.498 2.698-4.29 4.532-5.668C13.855.955 16 .186 16 2.632c0 .489-.28 4.105-.444 4.692-.572 2.04-2.653 2.561-4.504 2.246 3.236.551 4.06 2.375 2.281 4.2-3.376 3.464-4.852-.87-5.23-1.98-.07-.204-.103-.3-.103-.218 0-.081-.033.014-.102.218-.379 1.11-1.855 5.444-5.231 1.98-1.778-1.825-.955-3.65 2.28-4.2-1.85.315-3.932-.205-4.503-2.246C.28 6.737 0 3.12 0 2.632 0 .186 2.145.955 3.468 1.948" />
                </svg>
            </div>
            <h1>
                <i class="bi "></i>
                Selamat Datang
            </h1>
            <p>Di website pengaduan SMK TI Muhammadiyah Cikampek</p>
            <a href="login.php" class="login-btn">
                <i class="bi bi-hand-thumbs-up-fill"></i>
                Login
            </a>
        </div>
    </div>
</body>

</html>