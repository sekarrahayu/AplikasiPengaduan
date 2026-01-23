<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h1 {
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #764ba2;
        }
    </style>
</head>

<div class="login-container">
    <h1 id="loginTitle">Admin Login</h1>

    <div style="margin-bottom:15px;">
        <button type="button" onclick="setrole('admin')">Admin</button>
        <button type="button" onclick="setrole('siswa')">Siswa</button>
    </div>

    <form method="POST" action="proseslogin.php">
        <input type="hidden" name="role" id="role" value="siswa">

        <!-- ADMIN -->
        <div class="form-group" id="usernameField" style="display:none;">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="form-group" id="passwordadmin" style="display:none;">
            <label>Password</label>
            <input type="password" name="passwordadmin">
        </div>

        <!-- SISWA -->
        <div class="form-group" id="nisField" >
            <label>NIS</label>
            <input type="text" name="nis">
        </div>

        <div class="form-group" id="passwordsiswa" >
            <label>Password</label>
            <input type="text" name="passwordsiswa">
        </div>

        <button type="submit" name="login">Login</button>
    </form>
</div>
<script>
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
</script>
</body>
</html>