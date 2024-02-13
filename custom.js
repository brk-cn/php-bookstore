$(document).ready(function () {
  $(".addToCartBtn").click(function () {
    let url = "http://localhost/php-bookstore/handle-cart.php";
    let data = {
      operation: "addToCart",
      book_id: $(this).data("book-id"),
    };
    $.post(url, data, function (response) {
      $(".cartBookCount").text(response);
    });
  });

  $(".removeFromCartBtn").click(function () {
    let url = "http://localhost/php-bookstore/handle-cart.php";
    let data = {
      operation: "removeFromCart",
      book_id: $(this).data("book-id"),
    };
    $.post(url, data, function (response) {
      window.location.reload();
    });
  });
});
