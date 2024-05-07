<!DOCTYPE html>
<html lang="en">
<?php include('./includes/encryption.php');
include('./includes/decryption.php');
include('./includes/otp_function.php');
include("connect.php");
date_default_timezone_set("Asia/Kolkata");
session_start(); ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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
        <form action="" class="login" method="post">
          <div class="field">
            <input type="text" placeholder="Email Address" name="email" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
              required>
          </div>
          <!-- <div class="pass-link"><a href="#">Forgot password?</a></div> -->
          <div class="field btn my-2">
            <div class="btn-layer"></div>
            <input type="submit" value="Login" name="submit">
          </div>
          <div class="signup-link">Not a member? <a href="register.php">Signup now</a></div>
        </form>

      </div>
    </div>
  </div>
  <?php
  $conn = new mysqli("localhost", "root", "", "style_sanctuary");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password =  filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    // Select the user from the database
    $sql = "SELECT * FROM customers WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        $decrypt = $row['password'];
        $decrypt_pass = decrypt_data($decrypt);
        if ($password == $decrypt_pass) {
          $_SESSION['email'] = $email;
          $_SESSION["loggedin"] = true;

          $email =  $_SESSION["email"];
          $sql = "SELECT * FROM customers WHERE email='$email'";
          $result = $conn->query($sql);
          $count = mysqli_num_rows($result);
          if ($count > 0) {
            $otp = rand(100000, 999999);
            $mail_status = sendOTP($email, $otp);

            if ($mail_status == 1) {
              $result_otp = mysqli_query($conn, "UPDATE customers SET otp = '" . $otp . "',is_expired = '0',creation_time='" . date('Y-m-d H:i:s') . "' WHERE email = '" . $email . "'");
              $current_id = mysqli_insert_id($conn);

              if (!empty($current_id)) {
                $success = 1;
              }
            }
          }
          header("Location: otp_verification.php");
          exit();
        } else {
          echo "<div class='alert alert-danger' role='alert'>
          Invalid Email or Password
        </div>";
          function log_message($message, $level = 'INFO')
          {
            global $conn;
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $select_email = "Select * from customers where email = '$email'";
            $select_id = $conn->query($select_email);
            while ($row = $select_id->fetch_assoc()) {
              $u_id = $row['customer_id'];
              $email = $row['email'];
              $_SESSION['u_id'] = $u_id;
              $_SESSION['email'] = $email;
            }

            $conn = mysqli_connect('localhost', 'root', '', 'style_sanctuary');
            $message = mysqli_real_escape_string($conn, $message);
            $level = mysqli_real_escape_string($conn, $level);
            // Get the current date and time
            $date = date('Y-m-d H:i:s');
            // Insert the log message into the database
            $sql = "INSERT INTO customer_logs  (customer_id,log_message, log_level, log_date) VALUES ('$u_id','$message', '$level', '$date')";
            mysqli_query($conn, $sql);

            // Close the database connection
          }

          $message = "Invalid Login by user - " .  $email;
          log_message($message, 'ERROR');
        }
      }
    } else {
      echo "<div class='alert alert-danger' role='alert'>
      Invalid Email or Password
    </div>";

      $message = "Invalid Login by user - " . $_SESSION['email'];
      log_message($message, 'ERROR');
    }
    $conn->close();
  }
  ?>
  <script src="./js/login.js"></script>
</body>

</html>