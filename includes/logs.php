<?php
function log_message($message, $level = 'INFO')
{
  session_start();
  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'style_sanctuary');

  // Escape the message and level

  if (isset($_SESSION["loggedin"])) {
    session_start();
    $u_mail = $_SESSION['email'];
    //echo ("<script>location.href='index.php'</script>");

    //$u_mail = $_SESSION['email'];



    $qry_get_user = "SELECT * FROM customers where email='$u_mail';";
    $qes_user = $conn->query($qry_get_user);
    while ($res_user = $qes_user->fetch_assoc()) {
      $u_id = $res_user['customer_id'];
      $email = $res_user['email'];
      $_SESSION['u_id'] = $u_id;
      $_SESSION['email'] = $email;
    }
  }

  $message = mysqli_real_escape_string($conn, $message);
  $level = mysqli_real_escape_string($conn, $level);
  // Get the current date and time
  $date = date('Y-m-d H:i:s');
  // Insert the log message into the database
  $sql = "INSERT INTO customer_logs (customer_id,log_message, log_level, log_date) VALUES ('$u_id','$message', '$level', '$date')";
  mysqli_query($conn, $sql);

  // Close the database connection
  mysqli_close($conn);
}