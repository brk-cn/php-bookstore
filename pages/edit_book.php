<?php
require_once "../db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
  $id = $_GET["id"];

  $sql = "SELECT * FROM books WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $book = $result->fetch_assoc();
  } else {
    echo "Book not found";
    exit();
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Book</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

  <div class="container mt-5">
    <h2 class="mb-4">Edit Book</h2>
    <form method="POST" action="../update.php">
      <input type="hidden" id="id" name="id" value="<?= $_GET["id"] ?>">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $book["title"] ?>" required>
      </div>
      <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" name="author" value="<?= $book["author"] ?>" required>
      </div>
      <div class="mb-3">
        <label for="image_path" class="form-label">Image Path</label>
        <input type="text" class="form-control" id="image_path" name="image_path" value="<?= $book["image_path"] ?>" required>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?= $book["price"] ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
  </div>

</body>

</html>