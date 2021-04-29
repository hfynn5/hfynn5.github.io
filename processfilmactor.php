<?php

session_start();

$mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$filmID ='';


if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $filmID = $_POST['filmID'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO film_actor (actor_id,film_id,last_update) VALUES ('$ID','$filmID','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: film_actor.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM film_actor WHERE actor_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: film_actor.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM film_actor WHERE actor_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['actor_id'];
    $filmID = $row['film_id'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $filmID = $_POST['filmID'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE film_actor SET film_id='$filmID',last_update='$now' WHERE actor_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: film_actor.php");
}
?>
