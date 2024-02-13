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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
  <title>Admin Panel</title>
</head>

<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0" style="height: 2.5rem;">Admin Panel</h2>
        <a href="add_book.html" class="btn btn-success ms-5">Add Book</a>
      </div>

      <div class="flex-shrink-0 dropdown">
        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user text-dark ms-3" style="font-size: 1.6rem;"></i>
        </a>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item" href="../index.php">Home Page</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
        </ul>
      </div>
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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>