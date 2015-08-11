
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>AdNormal Oatmeal</title>

	<!-- Bootstrap core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/main.css" rel="stylesheet">
	<style type="text/css">
	#welcome {
		height: 250px;
		background-color: red;
	}

	.linked-images {
		float: left;
		margin-right: 10px;
	}

	.ad-text {
		font-size: 1.2em;
	}


	</style>

</head>

<body>
<!-- HEADER -->
<?php require_once '../views/partials/header.php'; ?>
<!--===-->
<div class="container-fluid">
	<div class="row">
	<!-- NAVBAR -->
	<?php require_once '../views/partials/navbar.php'; ?>
	<!--===-->
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<!-- BEGINNING OF PAGE BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
		<div class="container" id="welcome">
		<h1 class="text-center">Welcome to AdNormal Oatmeal!</h1>


		placeholder for logo
		</div>

		<div class="container">
		 <h1>Featured Ads</h1>
			<div class="container col-sm-6 col-md-4">
				<img src="img/hotdog.jpg" class="linked-images">
				<h2>Item <small>TITLE</small></h2>

				<p class="ad-text">
					location - San Antonio, Tx
					sell_by - 2015-08-15
					categories - Continental
					Hotdog styled in your preference, offering Chicago Style, New York Style, and South West Style dogs.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
			<div class="container col-sm-6 col-md-4">
				<img src="img/hotdog.jpg" class="linked-images">
				<h2>Item <small>TITLE</small></h2>

				<p class="ad-text">
					location - San Antonio, Tx
					sell_by - 2015-08-15
					categories - Continental
					Hotdog styled in your preference, offering Chicago Style, New York Style, and South West Style dogs.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
			<div class="container col-sm-6 col-md-4">
				<img src="img/hotdog.jpg" class="linked-images">
				<h2>Item <small>TITLE</small></h2>

				<p class="ad-text">
					location - San Antonio, Tx
					sell_by - 2015-08-15
					categories - Continental
					Hotdog styled in your preference, offering Chicago Style, New York Style, and South West Style dogs.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>

		<!-- END OF PAGE BODY. DO NOT PUT CUSTOM CODE AFTER HERE -->
	</div>
	</div>
</div>

	<!-- FOOTER -->
	<!-- Note: JS is in footer -->
	<?php require_once '../views/partials/footer.php'; ?>
	<!--===-->
</body>
</html>
