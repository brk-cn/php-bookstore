<?php
require_once "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $author = $_POST["author"];
  $image_path = $_POST["image_path"];
  $price = $_POST["price"];

  $sql = "INSERT INTO books (title, author, image_path, price) VALUES ('$title', '$author', '$image_path', '$price')";
  if ($conn->query($sql) !== TRUE) {
    echo $conn->error;
  }

  header("Location: admin_panel.php");
  exit();
  $conn->close();
}
