<?php
session_start();
include("connect.php");
if (!isset($_SESSION["email"])) {
  echo ("<script>location.href='login.php'</script>");
}
if (isset($_SESSION["loggedin"])) {
  $u_mail = $_SESSION['email'];

  $qry_get_user = "SELECT * FROM customers where email='$u_mail';";
  $qes_user = $conn->query($qry_get_user);
  while ($res_user = $qes_user->fetch_assoc()) {
    $u_id = $res_user['customer_id'];
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
      <a href="" class="btn border">
        <i class="fas fa-shopping-cart text-primary"></i>
        <span class="badge">
          <?php

          $qry_get_cart = "SELECT * FROM cart where customer_id='$u_id';";
          $qes_cart = $conn->query($qry_get_cart);
          $i = 0;
          while ($res_cart = $qes_cart->fetch_assoc()) {
            $i += 1;
          }
          echo $i;
          ?>
        </span>

      </a>
    </div>
  </div>
  </div>
  <!-- Topbar End -->
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
                echo '<ul class="dropdown-menu dropdown-user">
                <li><a href="logout.php"><i class="fa fa-power-off p-2"></i>Logout</a></li>
              </ul>';
              } else {
                echo '<a href="login.php" class="nav-item nav-link">Login</a><a href="register.php" class="nav-item nav-link">Register</a>';
              }
              ?>
            </div>
          </div>
        </nav>
        <div class="container my-4">
          <div class="row m-0">
            <table class="table table-bordered text-center table-striped m-0">
              <thead class="bg-primary text-dark">
                <tr>
                  <th>Product Title</th>
                  <th>Product Image</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Item Price</th>
                  <th colspan="2">Operations</th>
                </tr>
              </thead>
              <tbody>
                <?php



                $total = 0;
                $ij = 0;
                $qry_get_cart = "SELECT * FROM cart where customer_id='$u_id';";
                $qes_cart = $conn->query($qry_get_cart);
                while ($res_cart = $qes_cart->fetch_assoc()) {
                  $p_id = $res_cart['product_id'];
                  $qry_get_product = "SELECT * FROM product where product_id='$p_id';";
                  $qes_product = $conn->query($qry_get_product);
                  while ($res_product = $qes_product->fetch_assoc()) {
                    $total = $total + ($res_product['price'] * $res_cart['quantity']);
                ?>

                <tr>
                  <td><?php echo $res_product['name']; ?></td>
                  <td class="m-0">
                    <img src="<?php echo $res_product['image']; ?>" alt="" class="cart_img"
                      style="width:100px; height:100px; object-fit: contain;">
                  </td>

                  <td>




                    <form action="update_cart.php?num=<?php echo $ij; ?>" method="post"
                      id="update_form_<?php echo $ij; ?>">
                      <input type="number" name="qty_<?php echo $ij; ?>" class="form-input w-50 text-center" min="1"
                        value='<?php echo $res_cart['quantity']; ?>' />
                      <input type="hidden" name="c_id_<?php echo $ij; ?>" value='<?php echo $res_cart['item_id']; ?>'>
                      <div class="btn btn-sm bg-primary border-0 text-dark m-1"
                        onclick="submit_form('<?php echo $ij; ?>')"><i class="fas fa-edit"></i></div>
                    </form>

                  </td>

                  <script type="text/javascript">
                  function submit_form(data) {
                    document.getElementById("update_form_" + data).submit();
                    alert("Cart Updated Successfully");

                  }
                  </script>

                  <td><i class="fas fa-rupee-sign"><?php echo $res_product['price']; ?>/-</i></td>
                  <td><i class="fas fa-rupee-sign">
                      <?php
                          echo $res_product['price'] * $res_cart['quantity'];
                          ?>/-
                    </i></td>
                  <td>

                    <a class="btn btn-sm bg-primary border-0 text-dark m-1"
                      href="delete_cart.php?id=<?php echo $res_cart['item_id']; ?>"><i class="fa fa-trash"
                        aria-hidden="true"></i></a>

                  </td>
                </tr>

                <?php
                  }
                  $ij += 1;
                }
                ?>
              </tbody>
            </table>
            <div class="d-flex my-3">
              <h4 class="px-3">Subtotal:&nbsp<i class="fas fa-rupee-sign text-primary"></i>&nbsp<strong
                  class="text-primary"><?php $_SESSION['total'] = $total;
                                                                                                                              echo $total ?>/-</strong>
              </h4>
              <a href="index.php"><button class="bg-primary px-3 py-2 mx-3 border-0 text-dark">Continue
                  Shopping</button></a>
              <a href="checkout.php"><button class="bg-primary px-3 py-2 mx-3 border-0 text-dark">Checkout</button></a>
            </div>
          </div>
        </div>
        </form>
      </div>
      <script>

      </script>
      <?php include("footer.php") ?>