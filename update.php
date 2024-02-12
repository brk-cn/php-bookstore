<?php
require_once "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
  // Formdan gelen verileri al
  $id = $_POST["id"];
  $title = $_POST["title"];
  $author = $_POST["author"];
  $image_path = $_POST["image_path"];
  $price = $_POST["price"];

  $sql = "UPDATE books SET title = '$title', author = '$author', image_path = '$image_path', price = '$price' WHERE id = $id";
  if ($conn->query($sql) === TRUE) {
    header("Location: pages/admin_panel.php");
    exit();
  } else {
    echo $conn->error;
  }
}

$conn->close();
