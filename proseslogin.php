<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "aspirasi");

if (isset($_POST['login'])) {

    $role = $_POST['role'];

    // Tentukan tabel, field, dan redirect berdasarkan role
    if ($role == 'admin') {
        $field1 = $_POST['username'] ?? '';
        $field2 = $_POST['passwordadmin'] ?? '';
        $table  = "admin";
        $col1   = "username";
        $col2   = "password";
        $redirect = "admin/halamanadmin.php";
    } else {
        $field1 = $_POST['nis'] ?? '';
        $field2 = $_POST['passwordsiswa'] ?? '';
        $table  = "siswa";
        $col1   = "nis";
        $col2   = "password";
        $redirect = "halamansiswa.php";
    }

    $stmt = $conn->prepare("SELECT * FROM $table WHERE $col1=? AND $col2=?");
    $stmt->bind_param("ss", $field1, $field2);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['user_type'] = $role;
        $_SESSION[$col1] = $field1;
        header("Location: $redirect");
        exit;
    } else {
        $_SESSION['error'] = "NIS, username atau password salah!";
        header("Location: login.php");
        exit;
    }
}
