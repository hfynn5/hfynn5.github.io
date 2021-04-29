<?php

session_start();

$mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$filmID ='';
$storeID ='';

if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $filmID = $_POST['filmID'];
    $storeID = $_POST['storeID'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO inventory (inventory_id,film_id,store_id,last_update) VALUES ('$ID','$filmID','$storeID','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: inventory.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM inventory WHERE inventory_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: inventory.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM inventory WHERE inventory_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['inventory_id'];
    $filmID = $row['film_id'];
    $storeID = $row['store_id'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $filmID = $_POST['filmID'];
  $storeID = $_POST['storeID'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE inventory SET film_id='$filmID',store_id='$storeID',last_update='$now' WHERE inventory_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: inventory.php");
}
?>
