<?php

session_start();

$mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$title ='';
$description ='';

if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $mysqli->query("INSERT INTO film_text (film_id,title,description) VALUES ('$ID','$title','$description')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: film_text.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM film_category WHERE film_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: film_text.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM film_text WHERE film_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['film_id'];
    $title = $row['title'];
    $description = $row['description'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];

  $mysqli->query("UPDATE film_text SET title='$title',description='$description', WHERE film_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: film_text.php");
}
?>
