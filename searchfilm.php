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
			<center><h3>Film by Film ID</h3></center>
  		<div class="row justify-content-center">
				<div class="card">
					<div class="card-header"><center><b>Film</b></center></div>
  					<form action="" method="POST">
      				<div class="form-group">
        			<label>Enter Film ID</label>
        				<input type="text" name="id" class="form-control" placeholder="Enter ID">
      				</div>
      				<div class="form-group">
        				<center><button type="submit" class="btn btn-primary" name="search">Search</button></center>
      				</div>
    				</form>
					</div>
  		</div>
	<div class="container">
    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      <thead class="thead-dark">
    <tr>
      <th class="th-sm">Film ID</th>
      <th class="th-sm">Title</th>
      <th class="th-sm">Description</th>
      <th class="th-sm">Category</th>
      <th class="th-sm">Price</th>
			<th class="th-sm">Length</th>
			<th class="th-sm">Rating</th>
			<th class="th-sm">Actor</th>
    </tr>
  </thead>
  <?php
				if(isset($_POST['search'])): ?>
				<?php
					$var = $_POST['id'];
					$sqli = new mysqli('localhost','hfysi2mercury','doinyourmomdoindoinyourmom','hfysi2me_Coursework2') or die(mysqli_error($sqli));
					
					$found = $sqli->query("SELECT
																	film.film_id AS FID,
  																film.title AS title,
  																film.description AS description,
  																category.name AS category,
  																film.rental_rate AS price,
  																film.length AS length,
  																film.rating AS rating,
  																GROUP_CONCAT(CONCAT(actor.first_name,' ', actor.last_name) SEPARATOR ', ') AS actors
																FROM category
  															LEFT JOIN film_category ON category.category_id = film_category.category_id
  															LEFT JOIN film ON film_category.film_id = film.film_id
  															JOIN film_actor ON film.film_id = film_actor.film_id
  															JOIN actor ON film_actor.actor_id = actor.actor_id
																WHERE film.film_id = $var") or die($sqli->error());

		
        while($row = mysqli_fetch_array($found)): ?>
		<?php echo test ?>
          <tr>
              <td><?php echo $row['FID']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['category']; ?></td>
							<td><?php echo $row['price']; ?></td>
							<td><?php echo $row['length']; ?></td>
							<td><?php echo $row['rating']; ?></td>
							<td><?php echo $row['actors']; ?></td>
          </tr>
        <?php endwhile; ?>
			<?php endif; ?>
      </table>
  </div>

</body>
</html>
