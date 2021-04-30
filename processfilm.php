<?php

session_start();

$mysqli = new mysqli('localhost','hfysi2mercury','doinyourmomdoindoinyourmom','hfysi2me_Coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$title ='';
$description ='';
$releaseyear ='';
$languageID ='';
$originallanguageID ='';
$rentalduration ='';
$rentalrate ='';
$length ='';
$replacement ='';
$rating ='';
$specialfeature ='';


if(isset($_POST['save'])){
    $ID = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $releaseyear = $_POST['releaseyear'];
    $languageID = $_POST['languageID'];
    $originallanguageID = $_POST['originallanguageID'];
    $rentalduration = $_POST['rentalduration'];
    $rentalrate = $_POST['rentalrate'];
    $length = $_POST['length'];
    $replacement = $_POST['replacement'];
    $rating = $_POST['rating'];
    $specialfeature = $_POST['specialfeature'];
    $now = date('Y-m-d H:i:s');

    $mysqli->query("INSERT INTO film (film_id,title,description,release_year,language_id,original_language_id,rental_duration,rental_rate,length,replacement_cost,rating,special_features,last_update) VALUES ('$ID','$title','$description','$releaseyear','$languageID','$originallanguageID','$rentalduration','$rentalrate','$length','$replacement','$rating','$specialfeature','$now')") or die($mysqli->error());

    $_SESSION['message'] = "Data Saved.";
    $_SESSION['msg_type'] = "success";

    header("location: film.php");
}

if(isset($_GET['delete'])){
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM film WHERE film_id=$ID") or die(mysqli_error($mysqli));
  $_SESSION['message'] = "Data Deleted.";
  $_SESSION['msg_type'] = "danger";

  header("location: film.php");
}

if(isset($_GET['edit'])){
  $ID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM film WHERE film_id = $ID") or die($mysqli->error());
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $ID = $row['film_id'];
    $title = $row['title'];
    $description = $row['description'];
    $releaseyear = $row['release_year'];
    $languageID = $row['language_id'];
    $originallanguageID = $row['original_language_id'];
    $rentalduration = $row['rental_duration'];
    $rentalrate = $row['rental_rate'];
    $length = $row['length'];
    $replacement = $row['replacement_cost'];
    $rating = $row['rating'];
    $specialfeature = $row['special_features'];
  }
}

if(isset($_POST['update'])){
  $ID = $_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $releaseyear = $_POST['releaseyear'];
  $languageID = $_POST['languageID'];
  $originallanguageID = $_POST['originallanguageID'];
  $rentalduration = $_POST['rentalduration'];
  $rentalrate = $_POST['rentalrate'];
  $length = $_POST['length'];
  $replacement = $_POST['replacement'];
  $rating = $_POST['rating'];
  $specialfeature = $_POST['special_features'];
  $now = date('Y-m-d H:i:s');

  $mysqli->query("UPDATE film SET title='$title',description='$description',release_year='$releaseyear',language_id='$languageID',original_language_id='$originallanguageID',rental_duration='$rentalduration',rental_rate='$rentalrate',length='$length',replacement_cost='$replacement',rating='$rating',special_features='$specialfeature',last_update='$now' WHERE film_id=$ID") or die($mysqli->error());

  $_SESSION['message'] = "Record Updated.";
  $_SESSION['msg_type'] = "warning";

  header("location: film.php");
}
?>
