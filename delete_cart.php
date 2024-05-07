<?php
include("./includes/logs.php");
include("connect.php");
session_start();

$uri = $_SERVER["REQUEST_URI"];
$after_eq = explode('=', $uri)[1];
// echo $after_eq;


$qry = "DELETE from cart where item_id='" . $after_eq . "' ;";
$result = $conn->query($qry);
if ($result) {
  $message = "Product Deleted by user " . $_SESSION['email'] . " from Cart";
  log_message($message, 'DELETE');
}
header('Location: cart_view.php');