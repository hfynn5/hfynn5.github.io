<?php

session_start();

$mysqli = new mysqli('localhost','hfysi2mercury','doinyourmomdoindoinyourmom','hfysi2me_Coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$city ='';
$countryID ='';

if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $city = $_POST['city'];
    $countryID = $_POST['countryID'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO city (city_id,city,country_id,last_update) VALUES ('$ID','$city','$countryID','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: city.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM city WHERE city_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: city.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM city WHERE city_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['city_id'];
    $city = $row['city'];
    $countryID = $row['country_id'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $city = $_POST['city'];
  $countryID = $_POST['countryID'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE city SET city='$city',country_id='$countryID',last_update='$now' WHERE city_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: city.php");
}
?>
