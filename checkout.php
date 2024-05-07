<?php
include('header.php');
include('connect.php');
include("./includes/logs.php");

if (!isset($_SESSION["email"])) {
  echo ("<script>location.href='login.php'</script>");
}
$u_mail = $_SESSION['email'];

$qry_get_user = "SELECT * FROM customers where email='$u_mail';";
$qes_user = $conn->query($qry_get_user);
while ($res_user = $qes_user->fetch_assoc()) {
  $u_id = $res_user['customer_id'];
}


?>


<!-- Shop Product Start -->


<div class="container-fluid pt-3">
  <div class="row ">
    <div class="col-lg-8">
      <div class="mb-1">
        <h4 class="font-weight-semi-bold mb-4">Address Details</h4>
        <form action="" method="post">
          <div class="row">
            <div class="col-md-6 form-group">
              <label>First Name</label>
              <input class="form-control" type="text" name="f_name" placeholder="John"
                onkeypress='return blockSpecialChar(event)' title="special characters are not allowed" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Last Name</label>
              <input class="form-control" type="text" name="l_name" placeholder="Doe"
                onkeypress='return blockSpecialChar(event)' title="special characters are not allowed" required>
            </div>
            <div class="col-md-6 form-group">
              <label>E-mail</label>
              <input class="form-control" type="text" name="email" placeholder="example@email.com" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Mobile No</label>
              <input class="form-control" type="text" name="mobile" placeholder="123456789" maxlength="10"
                onkeypress="return validateNumber(event)" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Shipping Address</label>
              <input class="form-control" type="text" name="s_address" placeholder="123 Street" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Billing Address</label>
              <input class="form-control" type="text" name="b_address" placeholder="123 Street" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Country</label>
              <select class="custom-select" name="country" required>
                <option selected>India</option>
                <option>Afghanistan</option>
                <option>Albania</option>
                <option>Algeria</option>
                <option>United States</option>
                <option>France</option>
                <option>Germany</option>
                <option>Russia</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>City</label>
              <input class="form-control" type="text" name="city" placeholder="New York" required>
            </div>
            <div class="col-md-6 form-group">
              <label>State</label>
              <input class="form-control" type="text" name="state" placeholder="New York" required>
            </div>
            <div class="col-md-6 form-group">
              <label>ZIP Code</label>
              <input class="form-control" type="text" name="zip--" placeholder="123321" maxlength="6" required>
            </div>

            <div class="collapse mb-4" id="card">
              <h4 class="font-weight-semi-bold mb-4">Account Details</h4>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Amount</label>
                  <input type="text" class="form-control" type="text" placeholder="<?php $o_email = $_SESSION['all_total'];
                                                                                    echo $o_email ?>" disabled>
                </div>
                <div class="col-md-6 form-group">
                  <label>Card Number</label>
                  <input type="text" class="form-control" id="cardNumber" type="text" placeholder="0000 0000 0000 0000"
                    maxlength="19" oninput="formatCardNumber()">
                </div>
                <div class="col-md-6 form-group">
                  <label>Expiration Year</label>
                  <input class="form-control" type="text" placeholder="MM/YY" size=5 maxlength=5
                    onkeydown="this.value=this.value.replace(/^(\d\d)(\d)$/g,'$1/$2').replace(/^(\d\d\/\d\d)(\d+)$/g,'$1/$2').replace(/[^\d\/]/g,'')">
                </div>

                <div class="col-md-6 form-group">
                  <label>CVV</label>
                  <input class="form-control" type="text" placeholder="000" maxlength="3">
                </div>
              </div>
            </div>
            <?php
            if (isset($_POST['place_order'])) {

              $f_name = $_POST['f_name'];
              $l_name = $_POST['l_name'];
              $email = $_POST['email'];
              $mobile = $_POST['mobile'];
              $s_address = $_POST['s_address'];
              $b_address = $_POST['b_address'];
              $country = $_POST['country'];
              $city = $_POST['city'];
              $state = $_POST['state'];
              $zip = $_POST['zip'];
              $o_total = $_SESSION['all_total'];

              $insert_order = "INSERT INTO orders(customer_id,first_name,last_name,email,mobile_no,shipping_address,billing_address,country,city,state,zip,order_total,order_date,status) VALUES ('$u_id','$f_name','$l_name','$email','$mobile','$s_address','$b_address','$country','$city','$state','$zip','$o_total',NOW(),'Pending');";
              $detail_result = mysqli_query($conn, $insert_order);

              $select_order = "SELECT * FROM orders where customer_id = '$u_id'";
              $result_select = mysqli_query($conn, $select_order);
              while ($fetch_order = mysqli_fetch_array($result_select)) {
                $_SESSION['$o_id'] = $fetch_order['order_id'];
              }
            }
            ?>

          </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card border-secondary mb-5">
        <div class="card-header bg-secondary border-0">
          <h4 class="font-weight-semi-bold m-0">Order Total</h4>
        </div>
        <div class="card-body">
          <h5 class="font-weight-medium mb-3">Products</h5>
          <?php
          $total = 0;
          $qry_get_cart = "SELECT * FROM cart where customer_id='$u_id';";
          $qes_cart = $conn->query($qry_get_cart);
          while ($res_cart = $qes_cart->fetch_assoc()) {
            $p_id = $res_cart['product_id'];
            $qty = $res_cart['quantity'];
            $qry_get_product = "SELECT * FROM product where product_id='$p_id';";
            $qes_product = $conn->query($qry_get_product);
            while ($res_product = $qes_product->fetch_assoc()) {
              $total = $total + ($res_product['price'] * $res_cart['quantity']);

          ?>
          <div class="d-flex justify-content-between">
            <p class="text-dark">
              <?php echo $res_product['name']; ?>
              <small class="text-muted fs-5">
                x<?php echo $qty ?>
              </small>
            </p>

            <p><i class="fas fa-rupee-sign "><?php echo  $res_product['price'] * $res_cart['quantity']; ?>/-</i></p>
          </div>
          <?php }
          }
          ?>
          <hr class="mt-0">
          <div class="d-flex justify-content-between mb-3 pt-1">
            <h6 class="font-weight-medium">Subtotal</h6>
            <h6 style="color:	#696969"><i class="fas fa-rupee-sign"><?php
                                                                      echo $_SESSION['total'] ?>/-</i></h6>
          </div>
          <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Shipping</h6>
            <h6 style="color:	#696969"><i class="fas fa-rupee-sign">160/-</i></h6>
          </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
          <div class="d-flex justify-content-between mt-2">
            <h5 class="font-weight-bold">Total</h5>
            <h5 style="color:	#696969"><i class="fas fa-rupee-sign"><?php $total = $_SESSION['total'];
                                                                      $total = $total + 160;
                                                                      $_SESSION['all_total'] = $total;
                                                                      echo $total ?>/-</i></h5>
          </div>
        </div>
      </div>

      <div class="card border-secondary mb-5">
        <div class="card-header bg-secondary border-0">
          <h4 class="font-weight-semi-bold m-0">Payment</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" name="payment" id="paypal" value="Credit/Debit Card">
              <label class="custom-control-label" for="paypal" data-toggle="collapse"
                data-target="#card:not(.in)">Credit/Debit Card</label>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="Net Banking">
              <label class="custom-control-label" for="directcheck">Net
                Banking</label>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="UPI/Paytm">
              <label class="custom-control-label" for="banktransfer">UPI/Paytm</label>
            </div>
          </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
          <input type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" name="place_order"
            value="Place Order"></input>
        </div>
      </div>
      </form>
      <?php
      if (isset($_POST['place_order'])) {

        $select_order = "SELECT * FROM orders where customer_id = '$u_id'";
        $result_select = mysqli_query($conn, $select_order);
        if ($result_select->num_rows > 0) {
          while ($fetch_order = mysqli_fetch_array($result_select)) {
            $o_id = $fetch_order['order_id'];
            $o_total = $_SESSION['all_total'];
            $status = $_POST['payment'];
            $insert_pay = "INSERT INTO payments(order_id,customer_id,amount,payment_method,payment_status) VALUES ('$o_id','$u_id','$o_total','$status','DONE');";
            $verify_pay = mysqli_query($conn, $insert_pay);
          }
        }
        if (isset($verify_pay)) {
          $truncate = "TRUNCATE TABLE cart";
          $empty = mysqli_query($conn, $truncate);
          echo "<script>alert('Successfully Ordered!')</script>";
          $message = "User " . $_SESSION['email'] . " Ordered Successfully";
          log_message($message, 'ORDERED');

          echo "<script>window.location.href='index.php'</script>";
          exit;
        } else {
          echo "<script>alert('Payment Issue')</script>";
        }
      }
      ?>

    </div>
  </div>
</div>
</div>
</div>
<!-- Shop Product End -->
<script>
function validateNumber(e) {
  const pattern = /^[0-9]$/;

  return pattern.test(e.key)
}

function blockSpecialChar(e) {
  var k;
  document.all ? k = e.keyCode : k = e.which;
  return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
}

function formatCardNumber() {
  var cardNumber = document.getElementById("cardNumber");
  var value = cardNumber.value.replace(/\D/g, '');
  var formattedValue = "";
  for (var i = 0; i < value.length; i++) {
    if (i % 4 == 0 && i > 0) {
      formattedValue += " ";
    }
    formattedValue += value[i];
  }
  cardNumber.value = formattedValue;
}
</script>
<!-- Shop End -->
<?php include('footer.php'); ?>