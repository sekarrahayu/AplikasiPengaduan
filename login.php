<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aspirasi</title>
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

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 102, 161, 0.2);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        .login-container h1 {
            color: #0066a1;
            margin-bottom: 30px;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-container h1 i {
            color: #0099cc;
            font-size: 2rem;
        }

        .role-buttons {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }

        .role-buttons button {
            flex: 1;
            padding: 10px;
            background: rgba(0, 102, 161, 0.1);
            color: #0066a1;
            border: 2px solid #0066a1;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .role-buttons button:hover,
        .role-buttons button.active {
            background: linear-gradient(135deg, #0099cc 0%, #0066a1 100%);
            color: white;
            border-color: transparent;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #0099cc;
            box-shadow: 0 0 0 3px rgba(0, 153, 204, 0.1);
            background: #f8fbff;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #0099cc 0%, #0066a1 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 102, 161, 0.3);
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 102, 161, 0.4);
            background: linear-gradient(135deg, #00c9ff 0%, #0099cc 100%);
        }

        @media (max-width: 480px) {
            .login-container {
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
    <a href="halamanutama.php" class="back-btn">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

    <div class="login-container">
        <h1>
            <i class="bi bi-lock-fill"></i>
            <span id="loginTitle">Login</span>
        </h1>

        <div class="role-buttons">
            <button type="button" onclick="setrole('admin')">Admin</button>
            <button type="button" onclick="setrole('siswa')">Siswa</button>
        </div>

        <form method="POST" action="proseslogin.php">
            <input type="hidden" name="role" id="role" value="siswa">

            <!-- ADMIN -->
            <div class="form-group" id="usernameField" style="display:none;">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username">
            </div>

            <div class="form-group" id="passwordadmin" style="display:none;">
                <label>Password</label>
                <input type="password" name="passwordadmin" placeholder="Masukkan password">
            </div>

            <!-- SISWA -->
            <div class="form-group" id="nisField">
                <label>NIS</label>
                <input type="text" name="nis" placeholder="Masukkan NIS">
            </div>

            <div class="form-group" id="passwordsiswa" style="position: relative;">
                <label>Password</label>
                <input type="password" name="passwordsiswa" id="inputPasswordSiswa" placeholder="Masukkan password">
                <i class="bi bi-eye" id="toggleSiswa"
                    style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer; font-size:1.1rem; color:#333; margin-top: 12px;"></i>
            </div>


            <?php if (isset($_SESSION['error'])): ?>
                <p style="color:red; margin-bottom:15px; text-align:center;">
                    <?= $_SESSION['error']; ?>
                </p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>


            <button type="submit" name="login" class="login-btn">Login</button>
        </form>
    </div>

    <script>
        //untuk hide 
        function setrole(role) {
            document.getElementById('role').value = role;

            if (role === 'admin') {
                document.getElementById('usernameField').style.display = 'block';
                document.getElementById('passwordadmin').style.display = 'block';
                document.getElementById('nisField').style.display = 'none';
                document.getElementById('passwordsiswa').style.display = 'none';
            } else {
                document.getElementById('usernameField').style.display = 'none';
                document.getElementById('passwordadmin').style.display = 'none';
                document.getElementById('nisField').style.display = 'block';
                document.getElementById('passwordsiswa').style.display = 'block';
            }
        }

        // toggle password siswa
        const toggleSiswa = document.getElementById('toggleSiswa');
        const inputPasswordSiswa = document.getElementById('inputPasswordSiswa');

        toggleSiswa.addEventListener('click', function() {
            const type = inputPasswordSiswa.getAttribute('type') === 'password' ? 'text' : 'password';
            inputPasswordSiswa.setAttribute('type', type);

            // Ganti icon
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>

</body>

</html>