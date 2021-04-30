<?php

session_start();

$mysqli = new mysqli('localhost','hfysi2mercury','doinyourmomdoindoinyourmom','hfysi2me_Coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = '';
$address ='';
$address2 ='';
$district ='';
$cityid ='';
$postalcode ='';
$phone ='';

if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $district = $_POST['district'];
    $cityid = $_POST['city_id'];
    $postalcode = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO address (address_id,address,address2,district,city_id,postal_code,phone,last_update) VALUES ('$ID','$address','$address2','$district','$cityid','$postalcode','$phone','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: address.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM address WHERE address_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: address.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM address WHERE address_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['address_id'];
    $address = $row['address'];
    $address2 = $row['address2'];
    $district = $row['district'];
    $cityid = $row['city_id'];
    $postalcode = $row['postal_code'];
    $phone = $row['phone'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $address = $_POST['address'];
  $address2 = $_POST['address2'];
  $district = $_POST['district'];
  $cityid = $_POST['city_id'];
  $postalcode = $_POST['postal_code'];
  $phone = $_POST['phone'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE address SET address='$address',address2='$address2',district='$district',city_id='$cityid',postal_code='$postalcode',phone='$phone',last_update='$now' WHERE address_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: address.php");
}
?>
