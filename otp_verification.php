<!DOCTYPE html>
<html lang="en">
<?php
include("connect.php");
include("./includes/logs.php");
session_start();
$email = $_SESSION['email'];
if (!empty($_POST["submit_otp"])) {
  $result = mysqli_query($conn, "SELECT * from customers where otp ='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(creation_time, INTERVAL 10 MINUTE)");
  $count = mysqli_num_rows($result);
  if (!empty($count)) {
    $result = mysqli_query($conn, "UPDATE customers SET is_expired = 1 WHERE otp ='" . $_POST["otp"] . "'");
  } else {
    $error_message = "Invalid OTP!";
  }
}
// Retrieve the OTP submitted by the user

if (isset($_POST["submit_otp"])) {
  $otp = trim($_POST["otp"]);

  $query = "SELECT * FROM customers WHERE email = '$email'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $stored_otp = $row['otp'];

  // Verify whether the OTP submitted by the user matches the OTP stored in the database
  if ($otp == $stored_otp) {
    $_SESSION['verify_otp'] = true;
    if ($_SESSION['verify_otp']) {
      $message = "Successfully Login by user " . $_SESSION['email'];
      log_message($message, 'LOGIN');
    }
    header("Location: index.php");
  } else {
    echo "<div class='alert alert-danger' role='alert'>
          Invalid Email or Password
        </div>";
  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/login.css">
</head>

<body>
  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
      <input type="radio" name="slide" id="login" checked>
      <input type="radio" name="slide" id="signup">
      <div class="slider-tab"></div>
      <div class="form-inner">

        <form action="" class="" method="post">
          <div class="field">
            <input type="text" placeholder="Enter OTP From Your Mail" name="otp" class="login-input" maxlength="6"
              required>
          </div>
          <div class="field btn my-2">
            <div class="btn-layer"></div>
            <input type="submit" value="Submit" name="submit_otp" class="btnSubmit">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="./js/login.js"></script>
</body>

</html>