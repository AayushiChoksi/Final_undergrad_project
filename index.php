<?php include("connect.php");
include("./includes/logs.php");
session_start();

if (isset($_SESSION["loggedin"])) {
  $u_mail = $_SESSION['email'];
  //echo ("<script>location.href='index.php'</script>");

  //$u_mail = $_SESSION['email'];



  $qry_get_user = "SELECT * FROM customers where email='$u_mail';";
  $qes_user = $conn->query($qry_get_user);
  while ($res_user = $qes_user->fetch_assoc()) {
    $u_id = $res_user['customer_id'];
    $_SESSION['$u_id'] = $u_id;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>EShopper</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div class="row align-items-center py-3 px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
      <a href="" class="text-decoration-none">
        <h1 class="m-0 display-5 font-weight-semi-bold"><span
            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
      </a>
    </div>
    <div class="col-lg-6 col-6 text-left">
      <form action="search.php?search_data" method="GET">
        <div class="input-group">
          <input type="text" class="form-control" name="search_data" placeholder="Search for products">
          <div class="input-group-append">
            <input type="submit" name="search_data_product" class="form-control text-primary" value="Search">
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-3 col-6 text-right">
      <a href="cart_view.php" class="btn border">
        <i class="fas fa-shopping-cart text-primary"></i>
        <span class="badge">
          <?php
          $i = 0;
          if (isset($_SESSION["loggedin"])) {
            $qry_get_cart = "SELECT * FROM cart where customer_id='$u_id';";
            $qes_cart = $conn->query($qry_get_cart);
            while ($res_cart = $qes_cart->fetch_assoc()) {
              $i += 1;
            }
            echo $i;
          } else {
            echo $i;
          }
          ?>
        </span>
      </a>
    </div>
  </div>
  </div>
  <!-- Topbar End -->

  <!-- Navbar Start -->
  <div class="container-fluid mb-10">
    <div class="row border-top ">
      <div class="col-lg-3 d-none d-lg-block">
        <a class="btn shadow-none d-flex p-2 align-items-center justify-content-between bg-primary text-white w-100"
          data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
          <h6 class="m-0 px-3">Categories</h6>
          <i class="fa fa-angle-down text-dark"></i>
        </a>
        <nav
          class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
          id="navbar-vertical">
          <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i
                  class="fa fa-angle-down float-right mt-1"></i></a>
              <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                <a href="mens.php" class="dropdown-item">Men's Dresses</a>
                <a href="womens.php" class="dropdown-item">Women's Dresses</a>
              </div>
            </div>
            <a href="" class="nav-item nav-link">Shirts</a>
            <a href="" class="nav-item nav-link">Jeans</a>
            <a href="" class="nav-item nav-link">Sportswear</a>
            <a href="" class="nav-item nav-link">Blazers</a>
            <a href="" class="nav-item nav-link">Jackets</a>
            <a href="" class="nav-item nav-link">Shoes</a>
          </div>
        </nav>
      </div>
      <div class="col-lg-9">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
          <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span
                class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
          </a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
              <a href="index.php" class="nav-item nav-link active">Home</a>
              <a href="mens.php" class="nav-item nav-link">Mens</a>
              <a href="womens.php" class="nav-item nav-link">Womens</a>
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Accessories</a>
                <div class="dropdown-menu rounded-0 m-0">
                  <a href="" class="dropdown-item">Shirts</a>
                  <a href="" class="dropdown-item">Jeans</a>
                  <a href="" class="dropdown-item">Sportswear</a>
                  <a href="" class="dropdown-item">Blazers</a>
                  <a href="" class="dropdown-item">Jackets</a>
                  <a href="" class="dropdown-item">Shoes</a>
                </div>
              </div>
              <a href="" class="nav-item nav-link">Shopping Cart</a>
              <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 m-0">
                  <a href="" class="dropdown-item">Shopping Cart</a>
                  <a href="checkout.html" class="dropdown-item">Checkout</a>
                </div>
              </div> -->
              <a href="contact.html" class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="navbar-nav ml-auto py-0">
              <?php
              if (isset($_SESSION['loggedin']) and isset($_SESSION['verify_otp'])) {
                echo '<ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                  <a class="dropdown-toggle profile-pic p-2 mb-1" data-toggle="dropdown" href="#"><b><class="hidden-xs"><b>' . $_SESSION['email'] . '</b></b></a>';
                echo '<ul class="dropdown-menu dropdown-user m-2">
                <li><a href="logout.php"><i class="fa fa-power-off p-2"></i>Logout</a></li>
              </ul>';
              } else {
                echo '<a href="login.php" class="nav-item nav-link">Login</a><a href="register.php" class="nav-item nav-link">Register</a>';
              }
              ?>
            </div>
          </div>
        </nav>
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" style="height: 410px;">
              <img class="img-fluid" src="img/mens.jpg" alt="Image">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                  <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                  <h3 class="display-4 text-white font-weight-semi-bold mb-4">Mens Dresses</h3>
                  <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="height: 410px;">
              <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                  <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                  <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                  <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
              <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
          </a>
          <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
              <span class="carousel-control-next-icon mb-n2"></span>
            </div>
          </a>
        </div>
      </div>
      <!-- Featured Start -->
      <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
          <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
              <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
              <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
              <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
              <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
              <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
              <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
              <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
              <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
          </div>
        </div>
      </div>
      <!-- Featured End -->

      <?php include('footer.php'); ?>