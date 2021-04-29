<?php

session_start();

$mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$firstname ='';
$lastname ='';

if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO actor (actor_id,firstname,last_name,last_update) VALUES ('$ID','$name','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: actor.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM actor WHERE actor_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: actor.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM actor WHERE actor_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['actor_id'];
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE actor SET first_name='$firstname',last_name='$lastname',last_update='$now' WHERE actor_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: actor.php");
}
?>
