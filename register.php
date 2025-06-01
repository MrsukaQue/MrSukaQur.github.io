<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["signup_username"];
  $password = $_POST["signup_password"];

  // Validasi sederhana
  if (empty($username) || empty($password)) {
    $_SESSION["register_error"] = "Username dan password harus diisi.";
    header("Location: signup.html");
    exit();
  }

  // Hash password untuk keamanan
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Cek apakah username sudah ada
  $sql_check = "SELECT username FROM users WHERE username=?";
  $stmt_check = $conn->prepare($sql_check);
  $stmt_check->bind_param("s", $username);
  $stmt_check->execute();
  $stmt_check->store_result();

  if ($stmt_check->num_rows > 0) {
    $_SESSION["register_error"] = "Username sudah terdaftar.";
    $stmt_check->close();
    header("Location: signup.html");
    exit();
  } else {
    $stmt_check->close();
    // Simpan user baru ke database
    $sql_insert = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ss", $username, $hashed_password);

    if ($stmt_insert->execute()) {
      $_SESSION["register_success"] = "Pendaftaran berhasil. Silakan login.";
      header("Location: index.php");
      exit();
    } else {
      $_SESSION["register_error"] = "Terjadi kesalahan saat mendaftar.";
      header("Location: signup.html");
      exit();
    }
    $stmt_insert->close();
  }
}
$conn->close();
?>