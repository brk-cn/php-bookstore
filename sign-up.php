<?php
require_once "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $hashed_password = hash("sha256", $password);

  $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

  if ($conn->query($sql) !== TRUE) {
    echo $conn->error;
  } else {
    header("Location: index.php");
    exit();
  }
}

$conn->close();
