<?php
session_start();

if (isset($_SESSION["shoppingCart"])) {
  $shopping_cart = $_SESSION["shoppingCart"];
  $total_book_count = $shopping_cart["summary"]["total_book_count"];
  $total_price = $shopping_cart["summary"]["total_price"];
  $books = $shopping_cart["books"];
} else {
  $total_book_count = 0;
  $total_price = 0.0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
  <title>Cart</title>
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-4">Shopping Cart</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="text-center">Image</th>
          <th class="text-center">Title</th>
          <th class="text-center">Author</th>
          <th class="text-center">Price</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Total</th>
          <th class="text-center">-</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($total_book_count > 0) : ?>
          <?php foreach ($books as $book) : ?>
            <tr>
              <td class="text-center" style="vertical-align: middle !important;"><img src=" <?= $book["image_path"] ?>" alt="Book Image" style="max-width: 100px;"></td>
              <td class="text-center" style="vertical-align: middle !important;"><?= $book["title"] ?></td>
              <td class="text-center" style="vertical-align: middle !important;"><?= $book["author"] ?></td>
              <td class="text-center" style="vertical-align: middle !important;">$<?= number_format($book["price"], 2) ?></td>
              <td class="text-center" style="vertical-align: middle !important;">
                <a href="../handle-cart.php?opr=dec&book_id=<?= $book["id"] ?>" class="btn btn-xs btn-danger"><i class="fa-solid fa-minus"></i></a>
                <b class="mx-2 fs-6"><?= $book["count"] ?></b>
                <a href="../handle-cart.php?opr=inc&book_id=<?= $book["id"] ?>" class="btn btn-xs btn-success"><i class="fa-solid fa-plus"></i></a>
              </td>
              <td class="text-center" style="vertical-align: middle !important;">$<?= number_format($book["price"] * $book["count"], 2) ?></td>
              <td class="text-center" style="vertical-align: middle !important;"><button data-book-id=<?= $book["id"] ?> class="removeFromCartBtn btn btn-danger">Remove from cart</button></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
      <tfoot>
        <td colspan=7 class="text-end"><b>Total book count is <span class="text-danger"><?= $total_book_count ?></span> and total price is <span class="text-danger">$<?= $total_price ?></span></b></td>
      </tfoot>
    </table>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="../custom.js"></script>
</body>

</html>