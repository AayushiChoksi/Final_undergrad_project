<?php
include('header.php');
include('connect.php');
include("./includes/logs.php");

// if (!isset($_SESSION["email"])) {
//   echo ("<script>location.href='login.php'</script>");
// }
// $u_mail = $_SESSION['email'];

// $qry_get_user = "SELECT * FROM customers where email='$u_mail';";
// $qes_user = $conn->query($qry_get_user);
// while ($res_user = $qes_user->fetch_assoc()) {
//   $u_id = $res_user['customer_id'];
// }
?>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
    <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
    <div class="d-inline-flex">
      <p class="m-0"><a href="index.php">Home</a></p>
      <p class="m-0 px-2">-</p>
      <p class="m-0">Mens</p>
    </div>
  </div>
</div>
<!-- Page Header End -->


<!-- Shop Product Start -->
<div class="col-lg-10 col-md-12">
  <div class="row pb-3">
    <!-- <div class="col-12 pb-1">
       <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="dropdown ml-4">
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
            <a class="dropdown-item" href="#">Latest</a>
            <a class="dropdown-item" href="#">Popularity</a>
            <a class="dropdown-item" href="#">Best Rating</a>
          </div>
        </div>
      </div>
    </div> -->
    <?php
    $select_query = "SELECT * FROM product where category = 'mens'";
    $result_query = mysqli_query($conn, $select_query);
    while ($row = mysqli_fetch_array($result_query)) {
      $product_id = $row['product_id'];
      $product_name = $row['name'];
      $product_price = $row['price'];
      $product_image = $row['image'];
      $product_cat = $row['category'];
      echo "<div class='col-lg-4 col-md-6 col-sm-12 pb-1'>
      <div class='card product-item border-0 mb-4'>
        <div class='card-header product-img position-relative overflow-hidden bg-transparent border p-0'>
          <img class='img-fluid w-100 h-auto style='object-fit: contain' src='$product_image' alt=''>
        </div>
        <div class='card-body border-left border-right text-center p-0 pt-4 pb-3'>
          <h6 class='text-truncate mb-3'>$product_name</h6>
          <div class='d-flex justify-content-center'>
            <h6><i class='fas fa-rupee-sign'>$product_price</i></h6>
          </div>
        </div>
        <div class='card-footer d-flex justify-content-between bg-light border'>
          <a href='detail.php' class='btn btn-sm text-dark p-0'><i class='fas fa-eye text-primary mr-1'></i>View Detail</a>
          <a href='mens.php?add_to_cart=$product_id' class='btn btn-sm text-dark p-0'><i class='fas fa-shopping-cart text-primary mr-1'></i>Add To
            Cart</a>
        </div>
      </div>
    </div>";
    }
    ?>

    <?php

    if (isset($_SESSION["loggedin"])) {
      if (isset($_GET['add_to_cart'])) {
        $p_id = $_GET['add_to_cart'];

        $select_query = "SELECT * FROM cart Where product_id = $p_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows > 0) {
          echo "<script>alert('This items is already present inside cart')</script>";
          echo "<script>window.open('mens.php','_self')</script>";
        } else {
          $insert_query = "INSERT INTO cart (product_id ,customer_id,quantity) values ('$p_id','$u_id',1)";
          $result = mysqli_query($conn, $insert_query);
          echo "<script>alert('Successfully Added');</script><script>
                        window.open('mens.php','_self')</script>";
          $message = "User " . $_SESSION['email'] . " Added to Cart Successfully ";
          log_message($message, 'ADD');
        }
      }
    } else {
      echo ("<script>location.href='login.php'</script");
    }




    ?>

  </div>
</div>
</div>
</div>
<!-- Shop Product End -->
</div>
</div>
<!-- Shop End -->
<?php include('footer.php'); ?>