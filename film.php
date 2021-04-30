<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
	$(document).ready(function() {
		$('#tablee').DataTable();
	} );


	</script>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

	  <a class="navbar-brand" href="index.html">Database</a>

	  <ul class="navbar-nav">
			<li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        Search Film
	      </a>
	      <div class="dropdown-menu">
	        <a class="dropdown-item" href="searchcategory.php">Category</a>
	        <a class="dropdown-item" href="searchfilm.php">Film ID</a>
	      </div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Search Sales
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="searchsalebyfilmcategory.php">Film Category</a>
					<a class="dropdown-item" href="searchsalebystore.php">Store ID</a>
				</div>
			</li>

	    <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        Show
	      </a>
	      <div class="dropdown-menu">
	        <a class="dropdown-item" href="actor.php">Actor</a>
	        <a class="dropdown-item" href="address.php">Address</a>
	        <a class="dropdown-item" href="category.php">Category</a>
					<a class="dropdown-item" href="city.php">City</a>
					<a class="dropdown-item" href="country.php">Country</a>
					<a class="dropdown-item" href="customer.php">Customer</a>
					<a class="dropdown-item" href="film_actor.php">Film Actor</a>
					<a class="dropdown-item" href="film_category.php">Film Category</a>
					<a class="dropdown-item" href="film_text.php">Film Text</a>
					<a class="dropdown-item" href="film.php">Film</a>
					<a class="dropdown-item" href="inventory.php">Inventory</a>
					<a class="dropdown-item" href="language.php">Language</a>
					<a class="dropdown-item" href="payment.php">Payment</a>
					<a class="dropdown-item" href="rental.php">Rental</a>
					<a class="dropdown-item" href="staff.php">Staff</a>
					<a class="dropdown-item" href="store.php">Store</a>
	      </div>
	    </li>
	  </ul>
	</nav>
<br>

  <?php
        $mysqli = new mysqli('localhost','hfysi2mercury','doinyourmomdoindoinyourmom','hfysi2me_Coursework2') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM film") or die($mysqli->error);
  ?>

<?php require_once 'processfilm.php'; ?>
  <?php
    if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
    ?>
    </div>
  <?php endif ?>

  <div class="row justify-content-center">
  <form action="processfilm.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $ID; ?>" readonly="readonly">
      <div class="form-group">
        <label>Film ID</label>
        <input type="text" name="id" class="form-control" value="<?php echo $ID ?>" placeholder="Enter Film ID">
      </div>
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>" placeholder="Enter Title">
      </div>
			<div class="form-group">
        <label>Description</label>
        <textarea type="text" name="description" class="form-control" value="<?php echo $description ?>" placeholder="Enter Description" rows="4" cols="50"></textarea>
      </div>
			<div class="form-group">
        <label>Release Year</label>
        <input type="text" name="releaseyear" class="form-control" value="<?php echo $releaseyear ?>" placeholder="Enter Release Year">
      </div>
			<div class="form-group">
        <label>Language ID</label>
        <input type="text" name="languageID" class="form-control" value="<?php echo $languageID ?>" placeholder="Enter Title">
      </div>
			<div class="form-group">
        <label>Original Language ID</label>
        <input type="text" name="originallanguageID" class="form-control" value="<?php echo $originallanguageID ?>" placeholder="Enter Original Language ID (if any)">
      </div>
			<div class="form-group">
        <label>Rental Duration</label>
        <input type="text" name="rentalduration" class="form-control" value="<?php echo $rentalduration ?>" placeholder="Enter Title">
      </div>
			<div class="form-group">
        <label>Rental Rate</label>
        <input type="text" name="rentalrate" class="form-control" value="<?php echo $rentalrate ?>" placeholder="Enter Title">
      </div>
			<div class="form-group">
        <label>Length</label>
        <input type="text" name="length" class="form-control" value="<?php echo $length ?>" placeholder="Enter Title">
      </div>
			<div class="form-group">
        <label>Replacement Cost</label>
        <input type="text" name="replacement" class="form-control" value="<?php echo $replacement ?>" placeholder="Enter Title">
      </div>
			<div class="form-group">
        <label>Rating</label>
        <input type="text" name="rating" class="form-control" value="<?php echo $rating ?>" placeholder="Enter Title">
      </div>
			<div class="form-group">
        <label>Special Feature</label>
        <input type="text" name="specialfeature" class="form-control" value="<?php echo $specialfeature ?>" placeholder="Enter Title">
      </div>
      <div class="form-group">
        <?php
        if($update == true):
          ?>
          <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else:?>
        <button type="submit" class="btn btn-primary" name="save">Save</button>
      <?php endif; ?>
      </div>
    </form>
  </div>

  <div class="container">
    <table id="tablee" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      <thead>
    <tr>
      <th class="th-sm">Film ID</th>
      <th class="th-sm">Title</th>
      <th class="th-sm">Description</th>
			<th class="th-sm">Release Year</th>
			<th class="th-sm">Language ID</th>
			<th class="th-sm">Original Language ID</th>
			<th class="th-sm">Rental Duration</th>
			<th class="th-sm">Rental Rate</th>
			<th class="th-sm">Length</th>
			<th class="th-sm">Replacement Cost</th>
			<th class="th-sm">Rating</th>
			<th class="th-sm">Special Feature</th>
      <th class="th-sm">Last Update</th>
      <th class="th-sm">Action</th>
    </tr>
  </thead>
  <?php
        while($row = $result->fetch_assoc()): ?>
          <tr>
              <td><?php echo $row['film_id']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['description']; ?></td>
							<td><?php echo $row['release_year']; ?></td>
							<td><?php echo $row['language_id']; ?></td>
							<td><?php echo $row['original_language_id']; ?></td>
							<td><?php echo $row['rental_duration']; ?></td>
							<td><?php echo $row['rental_rate']; ?></td>
							<td><?php echo $row['length']; ?></td>
							<td><?php echo $row['replacement_cost']; ?></td>
							<td><?php echo $row['rating']; ?></td>
							<td><?php echo $row['special_features']; ?></td>
              <td><?php echo $row['last_update']; ?></td>
              <td><center><a href="film.php?edit=<?php echo $row['film_id']; ?>" class="btn btn-info">Edit</a>
              <a href="film.php?delete=<?php echo $row['film_id']; ?>" class="btn btn-danger">Delete</a></center></td>
          </tr>
        <?php endwhile; ?>
      </table>
  </div>
</body>
</html>
