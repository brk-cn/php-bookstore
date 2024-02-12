<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
  <title>Bookstore</title>
</head>

<body>
  <header class="p-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <i class="fa-solid fa-book-open-reader me-3 text-warning" style="font-size: 3rem;"></i>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-dark">Link</a></li>
          <li><a href="#" class="nav-link px-2 text-dark">Link</a></li>
          <li><a href="#" class="nav-link px-2 text-dark">Link</a></li>
        </ul>

        <div class="text-end">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <a href="pages/cart.php" class="text-decoration-none">
                <i class="fa-solid fa-cart-shopping position-relative text-warning me-3" style="font-size: 2.4rem;">
                  <span id="cart-item-count" class="position-absolute translate-middle badge" style="font-size: 0.8rem; top: 34%; left: 56%;">0</span>
                </i>
              </a>
            </div>

            <div>
              <?php if (isset($_SESSION["email"])) : ?>
                <i class="fa-solid fa-user text-dark mx-3" style="font-size: 1.6rem;"></i>
              <?php else : ?>
                <a href="pages/login.html" class="btn">Login</a>
                <a href="pages/sign-up.html" class="btn btn-primary mx-3">Sign-up</a>
              <?php endif; ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </header>

</body>

</html>