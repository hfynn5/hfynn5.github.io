<?php

session_start();

$mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$customerID ='';
$staffID ='';
$rentalID ='';
$amount ='';
$paymentdate ='';


if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $customerID = $_POST['customerID'];
    $staffID = $_POST['staffID'];
    $rentalID = $_POST['rentalID'];
    $amount = $_POST['amount'];
    $paymentdate = $_POST['paymentdate'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO film (payment_id,customer_id,staff_id,rental_id,amount,payment_date,last_update) VALUES ('$ID','$customer','$staffID','$rentalID','$amount','$paymentdate','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: payment.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM payment WHERE payment_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: payment.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM payment WHERE payment_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['payment_id'];
    $customerID = $row['customer_id'];
    $staffID = $row['staff_id'];
    $rentalID = $row['rental_id'];
    $amount = $row['amount'];
    $paymentdate = $row['payment_date'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $customerID = $_POST['customerID'];
  $staffID = $_POST['staffID'];
  $rentalID = $_POST['rentalID'];
  $amount = $_POST['amount'];
  $paymentdate = $_POST['paymentdate'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE payment SET customer_id='$customer',staff_id='$staffID',rental_id='$rentalID',amount='$amount',payment_date='$paymentdate',last_update='$now' WHERE payment_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: payment.php");
}
?>
