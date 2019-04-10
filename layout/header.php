<?php require_once 'db/config.php';session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>library</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-light background bg-light">
		<div class="container">
		<div class="logo-container text-center">
			<a class="navbar-brand" href="#"><img class="logo" src="image/logo.jpg"><br>Online LMS</a>
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	  
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mx-auto">

			<li class="nav-item active">
			  <a class="nav-link" href="<?php echo APPROOT; ?>">Home <span class="sr-only">(current)</span></a>
			</li>

			<li class="nav-item">
			  <a class="nav-link" href="<?php echo APPROOT; ?>books.php">Books</a>
			</li>

			<li class="nav-item">
			  <a class="nav-link" href="pages/feedback.php">Feedback</a>
			</li>

			<?php if(!isset($_SESSION['fname'])): ?>
				<li class="nav-item">
			  	<a class="nav-link" href="<?php echo APPROOT; ?>login.php">Login</a>
				</li>

				<li class="nav-item">
			 	 <a class="nav-link" href="<?php echo APPROOT; ?>register.php">Register</a>
				</li>
			
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo APPROOT; ?>admin.php">Admin-Login</a>
				</li>
			<?php endif; ?>

		  </ul>

			<ul class="navbar-nav">
			<?php if(isset($_SESSION['fname'])): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo APPROOT; ?>profile.php"><?php echo $_SESSION['fname']; ?></a>
				</li>

				<li class="nav-item">
			 	 <a class="nav-link" href="<?php echo APPROOT; ?>logout.php">Logout</a>
				</li>

			<?php endif; ?>

			</ul>
		</div>
	</div>
</nav>