<?php
include("./includes/logs.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include("connect.php");

  $uri = $_SERVER["REQUEST_URI"];
  $after_eq = explode('=', $uri)[1];
  // echo $after_eq;


  $qry = "UPDATE cart SET quantity = '" . $_POST["qty_" . $after_eq] . "' WHERE item_id = '" . $_POST["c_id_" . $after_eq] . "';";
  // echo $qry;
  $result = $conn->query($qry);

  if ($result) {
    $message = "Cart Updated by user " . $_SESSION['email'] . " Successfully";
    log_message($message, 'UPDATE');
  }
  header('Location: cart_view.php');
}