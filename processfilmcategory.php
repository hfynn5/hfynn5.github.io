<?php

session_start();

$mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$categoryID ='';

if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $categoryID = $_POST['categoryID'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO film_category (film_id,category_id,last_update) VALUES ('$ID','$categoryID','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: film_category.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM film_category WHERE film_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: film_category.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM film_category WHERE film_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['film_id'];
    $firstname = $row['category_id'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $categoryID = $_POST['categoryID'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE film_category SET category_id='$categoryID',last_update='$now' WHERE film_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: film_category.php");
}
?>
