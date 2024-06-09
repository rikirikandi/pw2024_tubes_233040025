<?php
session_start();

if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $id = $_GET['id'];

  hapus($id);
  header("Location: haladmin.php");
  exit();
}
?>
