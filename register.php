<!DOCTYPE html>
<html lang="en">
<?php include('connect.php');
include("./includes/logs.php");
include('./includes/encryption.php');
include('./includes/decryption.php'); ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/login.css">
  <!-- CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
</head>

<body>
  <div class="wrapper">
    <div class="title-text">
      <div class="title signup">Register</div>
      <div class="title login">Register</div>
    </div>
    <div class="form-container">
      <input type="radio" name="slide" id="signup">
      <div class="slider-tab"></div>
      <div class="form-inner">
        <form action="" class="signup" method="post">
          <div class="field">
            <input type="text" placeholder="First Name" name="first_name" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Last Name" name="last_name" required>
          </div>
          <div class="field">
            <input type="email" placeholder="email" name="email" required>
          </div>
          <div class="field">
            <input type="text" placeholder="mobile number" name="mobile_number" maxlength="10" required>
          </div>
          <div class="field">
            <input type="password" placeholder=" password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
              required>
          </div>
          <div class="field">
            <input type="text" placeholder="shipping address" name="shipping" required>
          </div>
          <div class="field btn">
            <div class="btn-layer" id="response"></div>
            <input type="submit" value="Signup" name="Signup" id="btn">
          </div>
        </form>
        <?php if (isset($_POST['Signup'])) {
          $first_name = $_POST["first_name"];
          $last_name = $_POST["last_name"];
          $email = $_POST["email"];
          $mobile = $_POST['mobile_number'];
          $encrypted_mobile = encrypt_data($mobile);
          $password = $_POST["password"];
          $encrypted_pass = encrypt_data($password);
          $shipping_adr = $_POST["shipping"];

          $Duplicate_email = mysqli_query($conn, "SELECT * FROM customers where email = '$email'");
          if (mysqli_num_rows($Duplicate_email)) { ?>

        ?>
      </div>
    </div>
  </div>
  <script src="./js/login.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
  alertify.warning('This Email is Already Taken');
  </script><?php } else {
            mysqli_query($conn, "INSERT INTO customers (first_name, last_name,
        email,mobile_number,password,shipping_address,creation_time) Values
        ('$first_name','$last_name','$email','$encrypted_mobile','$encrypted_pass','$shipping_adr',NOW())");
            ?>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
  alertify.success('Successfully Account Created');
  </script><?php
            $message = "Customer Registered Successfully";
            log_message($message, 'CREATE');
            header("refresh:3;url=login.php");
          }
        } ?>

</body>

</html>