<?php
session_start();
$mysqli = new mysqli('localhost','hfysi2mercury','doinyourmomdoindoinyourmom','hfysi2me_Coursework2') or die(mysqli_error($mysqli));

$update = false;
$ID = 0;
$filmID ='';
$storeID ='';

if(isset($_POST['search'])){

    $found = $mysqli->query("SELECT f.title,f.description,f.rental_rate,f.length,f.rating
                             FROM film f,category c,film_category fc
                             WHERE f.film_id = fc.film_id AND c.category_id = fc.category_id AND c.category_id =$i") or die($mysqli->error());
    header("location: searchactor.php");
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
