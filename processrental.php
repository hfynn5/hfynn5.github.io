<?php

session_start();

$mysqli = new mysqli('localhost','hfysi2mercury','doinyourmomdoindoinyourmom','hfysi2me_Coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$rentaldate = '';
$inventoryID = '';
$customerID = '';
$returndate = '';
$staffID = '';


if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $rentaldate = $_POST['rentaldate'];
    $inventoryID = $_POST['InventoryID'];
    $customerID = $_POST['customerID'];
    $returndate = $_POST['returndate'];
    $staffID = $_POST['staffID'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO rental (rental_id,rental_date,inventory_id,customer_id,return_date,staff_id,last_update) VALUES ('$ID','$rentaldate','$inventoryID','$customerID','$returndate','$staffID','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: rental.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM rental WHERE rental_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: rental.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM rental WHERE rental_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['rental_id'];
    $rentaldate = $row['rental_date'];
    $inventoryID = $row['inventory_id'];
    $customerID = $row['customer_id'];
    $returndate = $row['return_date'];
    $staffID = $row['staff_id'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $rentaldate = $_POST['rentaldate'];
  $inventoryID = $_POST['InventoryID'];
  $customerID = $_POST['customerID'];
  $returndate = $_POST['returndate'];
  $staffID = $_POST['staffID'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE rental SET rental_date='$rentaldate',inventory_id='$inventoryID',customer_id='$customerID',return_date='$returndate',staff_id='$staffID',last_update='$now' WHERE rental_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: rental.php");
}
?>
