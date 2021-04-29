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
        $mysqli = new mysqli('localhost','root','','coursework2') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM staff") or die($mysqli->error);
  ?>

  <?php require_once 'processstaff.php'; ?>
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
  <form action="processstaff.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $ID; ?>" readonly="readonly">
      <div class="form-group">
        <label>Staff ID</label>
        <input type="text" name="id" class="form-control" value="<?php echo $ID ?>" placeholder="Enter Staff ID">
      </div>
      <div class="form-group">
        <label>First Name</label>
        <input type="text" name="firstname" class="form-control" value="<?php echo $firstname ?>" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="lastname" class="form-control" value="<?php echo $lastname ?>" placeholder="Enter Last Name">
      </div>
			<div class="form-group">
        <label>Address ID</label>
        <input type="text" name="addressID" class="form-control" value="<?php echo $addressID ?>" placeholder="Enter Address ID">
      </div>
			<div class="form-group">
        <label>Picture</label>
        <input type="text" name="picture" class="form-control" value="<?php echo $picture ?>" placeholder="Enter picture">
      </div>
			<div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Enter Email">
      </div>
			<div class="form-group">
        <label>Store ID</label>
        <input type="text" name="storeID" class="form-control" value="<?php echo $storeID ?>" placeholder="Enter Store ID">
      </div>
			<div class="form-group">
        <label>Enter Active</label>
        <input type="text" name="active" class="form-control" value="<?php echo $active ?>" placeholder="Enter Active">
      </div>
			<div class="form-group">
        <label>Enter Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username ?>" placeholder="Enter Username">
      </div>
			<div class="form-group">
        <label>Enter password</label>
        <input type="text" name="password" class="form-control" value="<?php echo $password ?>" placeholder="Enter Password">
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
      <th class="th-sm">Staff ID</th>
      <th class="th-sm">First Name</th>
      <th class="th-sm">Last Name</th>
			<th class="th-sm">Address ID</th>
			<th class="th-sm">Piture</th>
			<th class="th-sm">Email</th>
			<th class="th-sm">Store ID</th>
			<th class="th-sm">Active</th>
			<th class="th-sm">Username</th>
			<th class="th-sm">Password</th>
      <th class="th-sm">Last Update</th>
      <th class="th-sm">Action</th>
    </tr>
  </thead>
  <?php
        while($row = $result->fetch_assoc()): ?>
          <tr>
              <td><?php echo $row['staff_id']; ?></td>
              <td><?php echo $row['first_name']; ?></td>
              <td><?php echo $row['last_name']; ?></td>
							<td><?php echo $row['address_id']; ?></td>
							<td><?php echo $row['picture']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['store_id']; ?></td>
							<td><?php echo $row['active']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['password']; ?></td>
              <td><?php echo $row['last_update']; ?></td>
              <td><center><a href="staff.php?edit=<?php echo $row['staff_id']; ?>" class="btn btn-info">Edit</a>
              <a href="staff.php?delete=<?php echo $row['staff_id']; ?>" class="btn btn-danger">Delete</a></center></td>
          </tr>
        <?php endwhile; ?>
      </table>
  </div>
</body>
</html>
