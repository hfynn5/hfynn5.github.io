<?php

session_start();

$mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$managerstaffID ='';
$addressID ='';

if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $managerstaffID = $_POST['managerstaffID'];
    $addressID = $_POST['addressID'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO store (store_id,manager_staff_id,address_id,last_update) VALUES ('$ID','$managerstaffID','$addressID','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: store.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM store WHERE store_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: store.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM store WHERE store_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['store_id'];
    $managerstaffID = $row['manager_staff_id'];
    $addressID = $row['address_id'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $managerstaffID = $_POST['managerstaffID'];
  $addressID = $_POST['addressID'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE store SET manager_staff_id='$managerstaffID',address_id='$addressID',last_update='$now' WHERE store_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: store.php");
}
?>
