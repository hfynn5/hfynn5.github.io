<?php

session_start();

$mysqli = new mysqli('localhost','hfysi2mercury','doinyourmomdoindoinyourmom','hfysi2me_Coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$country ='';


if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $country = $_POST['country'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO country (country_id,country,last_update) VALUES ('$ID','$country','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: country.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM country WHERE country_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: country.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM country WHERE country_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['country_id'];
    $firstname = $row['country'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $country = $_POST['country'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE country SET country='$country',last_update='$now' WHERE country_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: country.php");
}
?>
