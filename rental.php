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
        $result = $mysqli->query("SELECT * FROM rental") or die($mysqli->error);
  ?>

  <?php require_once 'processrental.php'; ?>
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
  <form action="processrental.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $ID; ?>" readonly="readonly">
      <div class="form-group">
        <label>Rental ID</label>
        <input type="text" name="id" class="form-control" value="<?php echo $ID ?>" placeholder="Enter Actor ID">
      </div>
      <div class="form-group">
        <label>Rental Date</label>
        <input type="datetime-local" name="rentaldate" class="form-control" value="<?php echo $rentaldate ?>" placeholder="Enter Rental Date">
      </div>
      <div class="form-group">
        <label>Inventory ID</label>
        <input type="text" name="InventoryID" class="form-control" value="<?php echo $inventoryID ?>" placeholder="Enter Inventory ID">
      </div>
			<div class="form-group">
        <label>Customer ID</label>
        <input type="text" name="customerID" class="form-control" value="<?php echo $customerID ?>" placeholder="Enter Customer ID">
      </div>
			<div class="form-group">
        <label>Return Date</label>
        <input type="datetime-local" name="returndate" class="form-control" value="<?php echo $returndate ?>" placeholder="Enter Return Date">
      </div>
			<div class="form-group">
        <label>Staff ID</label>
        <input type="text" name="staffID" class="form-control" value="<?php echo $staffID ?>" placeholder="Enter Staff ID">
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
      <th class="th-sm">Rental ID</th>
      <th class="th-sm">Rental Date</th>
      <th class="th-sm">Inventory ID</th>
			<th class="th-sm">Customer ID</th>
			<th class="th-sm">Return Date</th>
			<th class="th-sm">Staff ID</th>
      <th class="th-sm">Last Update</th>
      <th class="th-sm">Action</th>
    </tr>
  </thead>
  <?php
        while($row = $result->fetch_assoc()): ?>
          <tr>
              <td><?php echo $row['rental_id']; ?></td>
              <td><?php echo $row['rental_date']; ?></td>
              <td><?php echo $row['inventory_id']; ?></td>
							<td><?php echo $row['customer_id']; ?></td>
							<td><?php echo $row['return_date']; ?></td>
							<td><?php echo $row['staff_id']; ?></td>
              <td><?php echo $row['last_update']; ?></td>
              <td><center><a href="rental.php?edit=<?php echo $row['rental_id']; ?>" class="btn btn-info">Edit</a>
              <a href="rental.php?delete=<?php echo $row['rental_id']; ?>" class="btn btn-danger">Delete</a></center></td>
          </tr>
        <?php endwhile; ?>
      </table>
  </div>
</body>
</html>
