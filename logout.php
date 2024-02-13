<?php
// Oturumu başlat
session_start();

// Eğer kullanıcı oturum açık değilse, kullanıcıyı giriş sayfasına yönlendir
if (!isset($_SESSION["email"])) {
  header("Location: login.php");
  exit();
}

// Oturumu sonlandır
session_unset();
session_destroy();

// Eğer "email" çerez varsa, çerez süresini geçmiş yaparak sil
if (isset($_COOKIE["email"])) {
  setcookie("email", "", time() - 3600, "/");
}

// Kullanıcıyı giriş sayfasına yönlendir
header("Location: index.php");
exit();
