<?php
require_once "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $remember_me = isset($_POST["remember-me"]) ? true : false;

  $hashed_password = hash("sha256", $password);

  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hashed_password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    session_start();
    $_SESSION["email"] = $email;

    if ($remember_me) {
      setcookie("email", $email, time() + (86400 * 30), "/");
    }

    header("Location: index.php");
    exit();
  }
}

$conn->close();
