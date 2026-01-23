<?php
session_start();

// Koneksi DB
$conn = mysqli_connect("localhost", "root", "", "aspirasi");

$error = '';

if (isset($_POST['login'])) {
    $role = $_POST['role'];

    if ($role === 'admin') {
        $username = $_POST['username'] ?? '';
        $passwordadmin = $_POST['passwordadmin'] ?? '';

        $stmt = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $passwordadmin);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['user_type'] = 'admin';
            $_SESSION['username'] = $username;
            header("Location: halamanadmin.php");
            exit;
        } else {
            $error = "Login admin gagal!";
        }

    } else { // siswa
        $nis = $_POST['nis'] ?? '';
        $passwordsiswa = $_POST['passwordsiswa']?? '';

        $stmt = $conn->prepare("SELECT * FROM siswa WHERE nis=? AND password=?");
        $stmt->bind_param("ss", $nis, $passwordsiswa);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['user_type'] = 'siswa';
            $_SESSION['nis'] = $nis;
            header("Location: halamansiswa.php");
            exit;
        } else {
            $error = "NIS tidak terdaftar!";
        }
    }
}
?>
