<?php
require_once "../db_conn.php";

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <title>Admin Panel</title>
</head>

<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-0" style="height: 3rem;">Admin Panel</h2>
      <a href="add_book.html" class="btn btn-success">Add Book</a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Title</th>
          <th>Author</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0) : ?>
          <?php foreach ($result as $row) : ?>
            <tr>
              <td><?= $row["id"] ?></td>
              <td><img src="<?= $row["image_path"] ?>" alt="Book Image" style="max-width: 100px;"></td>
              <td><?= $row["title"] ?></td>
              <td><?= $row["author"] ?></td>
              <td><?= $row["price"] ?></td>
              <td>
                <a href="edit_book.php?id=<?= $row["id"] ?>" class="btn btn-primary me-2">Edit</a>
                <a href="../delete.php?id=<?= $row["id"] ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="6">No books found</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>

</html>