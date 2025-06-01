<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $input_username = $_POST["username"];
  $input_password = $_POST["password"];

  $sql = "SELECT id, username, password FROM users WHERE username=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $input_username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($input_password, $row["password"])) {
      // Login berhasil
      $_SESSION["user_id"] = $row["id"];
      $_SESSION["username"] = $row["username"];
      header("Location: welcome.php"); // Redirect ke halaman selamat datang
      exit();
    } else {
      // Password salah
      $_SESSION["login_error"] = "Password salah";
      header("Location: index.php");
      exit();
    }
  } else {
    // Akun tidak ditemukan
    $_SESSION["login_error"] = "Akun tidak ditemukan";
    header("Location: index.php");
    exit();
  }
  $stmt->close();
}
$conn->close();
?>