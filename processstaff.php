<?php

session_start();

$mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$firstname = '';
$lastname = '';
$addressID = '';
$picture = '';
$email = '';
$storeID = '';
$active = '';
$username = '';
$password = '';


if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $addressID = $_POST['addressID'];
    $picture = $_POST['picture'];
    $email = $_POST['email'];
    $storeID = $_POST['storeID'];
    $active = $_POST['active'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO staff (staff_id,first_name,last_name,address_id,picture,email,store_id,active,username,password,last_update) VALUES ('$ID','$firstname','$lastname','$addressID','$picture','$email','$storeID','$active','$username','$password','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: staff.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM staff WHERE staff_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: staff.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM staff WHERE staff_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['staff_id'];
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $addressID = $row['address_id'];
    $picture = $row['picture'];
    $email = $row['email'];
    $storeID = $row['store_id'];
    $active = $row['active'];
    $username = $row['username'];
    $password = $row['password'];

  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $addressID = $_POST['addressID'];
  $picture = $_POST['picture'];
  $email = $_POST['email'];
  $storeID = $_POST['storeID'];
  $active = $_POST['active'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE staff SET first_name='$firstname',last_name='$lastname',address_id='$addressID',picture='$picture',email='$email',store_id='$storeID',active='$active',username='$username',password='$password',last_update='$now' WHERE staff_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: staff.php");
}
?>
