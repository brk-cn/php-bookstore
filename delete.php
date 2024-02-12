<?php
require_once "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
  $id = $_GET["id"];

  $sql = "DELETE FROM books WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    header("Location: pages/admin_panel.php");
    exit();
  } else {
    echo $conn->error;
  }
}

$conn->close();
