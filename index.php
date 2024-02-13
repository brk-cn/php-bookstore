<?php include 'pages/header.php';

require_once "db_conn.php";

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

$books = $result->fetch_all(MYSQLI_ASSOC);
shuffle($books);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookstore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container mt-3">
    <h2 class="mb-4">Welcome to Bookstore</h2>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-4">
      <?php foreach ($books as $book) : ?>
        <div class="col">
          <div class="card h-100 pt-2">
            <img src="<?= $book['image_path'] ?>" class="card-img-top" alt="<?= $book['title'] ?>" style="max-width: 60%; height: auto; margin: 0 auto;">
            <div class="card-body">
              <h5 class="card-title text-center"><?= $book['title'] ?></h5>
              <p class="card-text text-end"><?= $book['price'] ?> $</p>
              <button class="addToCartBtn btn btn-primary d-block mx-auto" data-book-id="<?= $book['id'] ?>">Add to Cart</button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="custom.js"></script>
</body>

</html>