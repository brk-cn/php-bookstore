<?php

require_once "db_conn.php";
session_start();


function addToCart($book)
{
  if (isset($_SESSION["shoppingCart"])) {
    $shopping_cart = $_SESSION["shoppingCart"];
    $books = $shopping_cart["books"];
  } else {
    $books = array();
  }

  if (array_key_exists($book["id"], $books)) {
    $books[$book["id"]]["count"] += 1;
  } else {
    $books[$book["id"]] = $book;
  }

  $total_price = 0.0;
  $total_book_count = 0;
  foreach ($books as $book) {
    $book["total_price"] = $book["count"] * $book["price"];
    $total_price += $book["total_price"];
    $total_book_count += $book["count"];
  }

  $summary["total_book_count"] = $total_book_count;
  $summary["total_price"] = $total_price;

  $_SESSION["shoppingCart"]["books"] = $books;
  $_SESSION["shoppingCart"]["summary"] = $summary;

  return $total_book_count;
}

function removeFromCart($book_id)
{
  if (isset($_SESSION["shoppingCart"])) {
    $shopping_cart = $_SESSION["shoppingCart"];
    $books = $shopping_cart["books"];

    if (array_key_exists($book_id, $books)) {
      unset($books[$book_id]);
    }

    $total_price = 0.0;
    $total_book_count = 0;

    foreach ($books as $book) {
      $book["total_price"] = $book["count"] * $book["price"];
      $total_price += $book["total_price"];
      $total_book_count += $book["count"];
    }

    $summary["total_book_count"] = $total_book_count;
    $summary["total_price"] = $total_price;

    $_SESSION["shoppingCart"]["books"] = $books;
    $_SESSION["shoppingCart"]["summary"] = $summary;

    return true;
  }
}

function increaseQuantity($book_id)
{
  if (isset($_SESSION["shoppingCart"])) {
    $shopping_cart = $_SESSION["shoppingCart"];
    $books = $shopping_cart["books"];

    if (array_key_exists($book_id, $books)) {
      $books[$book_id]["count"] += 1;
    }

    $total_price = 0.0;
    $total_book_count = 0;
    foreach ($books as $book) {
      $book["total_price"] = $book["count"] * $book["price"];
      $total_price += $book["total_price"];
      $total_book_count += $book["count"];
    }

    $summary["total_book_count"] = $total_book_count;
    $summary["total_price"] = $total_price;

    $_SESSION["shoppingCart"]["books"] = $books;
    $_SESSION["shoppingCart"]["summary"] = $summary;

    return true;
  }
}

function decreaseQuantity($book_id)
{
  if (isset($_SESSION["shoppingCart"])) {
    $shopping_cart = $_SESSION["shoppingCart"];
    $books = $shopping_cart["books"];

    if (array_key_exists($book_id, $books)) {
      $books[$book_id]["count"] -= 1;
    }

    if (!$books[$book_id]->count > '0') {
      unset($books[$book_id]);
    }

    $total_price = 0.0;
    $total_book_count = 0;
    foreach ($books as $book) {
      $book["total_price"] = $book["count"] * $book["price"];
      $total_price += $book["total_price"];
      $total_book_count += $book["count"];
    }

    $summary["total_book_count"] = $total_book_count;
    $summary["total_price"] = $total_price;

    $_SESSION["shoppingCart"]["books"] = $books;
    $_SESSION["shoppingCart"]["summary"] = $summary;

    return true;
  }
}

if (isset($_POST["operation"])) {
  $operation = $_POST["operation"];

  if ($operation == "addToCart") {
    $id = $_POST["book_id"];
    $book = $conn->query("SELECT * FROM books WHERE id={$id}")->fetch_all(MYSQLI_ASSOC)[0];
    $book["count"] = 1;
    echo addToCart($book);
  } else  if ($operation == "removeFromCart") {
    $id = $_POST["book_id"];
    echo removeFromCart($id);
  }
}
if (isset($_GET["opr"])) {
  $operation = $_GET["opr"];

  if ($operation == "inc") {
    $id = $_GET["book_id"];
    if (increaseQuantity($id)) {
      header("Location: pages/cart.php");
    }
  } else  if ($operation == "dec") {
    $id = $_GET["book_id"];
    if (decreaseQuantity($id)) {
      header("Location: pages/cart.php");
    }
  }
}
