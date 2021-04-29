<?php

session_start();

$mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = '';
$name ='';

if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $name = $_POST['name'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO language (language_id,name,last_update) VALUES ('$ID','$name','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: language.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM category WHERE category_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: language.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM language WHERE language_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['language_id'];
    $name = $row['name'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $name = $_POST['name'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE language SET name='$name',last_update='$now' WHERE language_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: language.php");
}
?>
