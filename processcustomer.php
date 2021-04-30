<?php

session_start();

$mysqli = new mysqli('localhost','hfysi2mercury','doinyourmomdoindoinyourmom','hfysi2me_Coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$storeID ='';
$firstname ='';
$lastname ='';
$email ='';
$addressID ='';
$active ='';
$createdate ='';

if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $storeID = $_POST['storeID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $addressID = $_POST['addressID'];
    $active = $_POST['active'];
    $createdate = $_POST['createdate'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO country (customer_id,store_id,first_name,last_name,email,address_id,active,create_date,last_update) VALUES ('$ID','$storeID','$firstname','$lastname','$email','$addressID','$active','$createdate','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: customer.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM customer WHERE customer_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: customer.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM customer WHERE customer_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['customer_id'];
    $storeID = $row['store_id'];
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $email = $row['email'];
    $addressID = $row['address_id'];
    $active = $row['active'];
    $createdate = $row['create_date'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $storeID = $_POST['storeID'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $addressID = $_POST['addressID'];
  $active = $_POST['active'];
  $createdate = $_POST['createdate'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE customer SET store_id='$storeID',first_name='$firstname',last_name='$lastname',email='$email',address_id='$addressID',active='$active',create_date='$createdate',last_update='$now' WHERE customer_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: customer.php");
}
?>
