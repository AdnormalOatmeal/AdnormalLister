<?php 
	require_once '../bootstrap.php';

	if (Input::has("username")) {
	$user = new User();

	$user->user_name = Input::get('username');
	$user->first_name = Input::get('first_name');
	$user->last_name = Input::get('last_name');
	$user->location = Input::get('location');
	$user->email = Input::get('email');
	$user->organization = Input::get('organization');
	$user->id = $_SESSION['id'];

	$user->save();
	}

	$id = $_GET["id"]; 
	if ($_SESSION["id"] != $id) {
	$id = $_SESSION["id"];
	}
	$user = new User();
	$currentUser = $user->find($id);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../assets/ico/favicon.png">

		<title>View/Edit Profile - AdNormal Oatmeal</title>

		<!-- Bootstrap core CSS -->
  		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="/css/main.css" rel="stylesheet">

		<style type="text/css">
			td:nth-child(1) {
				font-weight: bold;
			}
			.panel-heading {
				font-weight: bold;
				font-size: 1.2em;
			}
			.panel {
				max-width: 100%;
				width: 500px;
				margin: 10px auto;
			}

		</style>
	</head>

	<body>
		<!-- NAVBAR -->
		<?php require_once '../views/partials/navbar.php'; ?>
		<!--===-->

		<div class="container">
		<!-- NAVBAR -->
		<?php require_once '../views/partials/header.php'; ?>
		<!--===-->
		<!-- BEGINNING OF PAGE BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="POST">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" value="<?= $currentUser->attributes[0]["user_name"] ?>" autofocus required>
					</div>
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" class="form-control" id="first_name" name="first_name" value="<?= $currentUser->attributes[0]["first_name"] ?>" required>
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name" value="<?= $currentUser->attributes[0]["last_name"] ?>" required>
					</div>
					<div class="form-group">
						<label for="location">Location</label>
						<input type="text" class="form-control" id="location" name="location" value="<?= $currentUser->attributes[0]["location"] ?>" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="<?= $currentUser->attributes[0]["email"] ?>" >
					</div>
					<div class="form-group">
						<label for="organization">Organization</label>
						<input type="text" class="form-control" id="organization" name="organization"value="<?= $currentUser->attributes[0]["organization"] ?>" >
					</div>
					<div class="form-group">
						<button class="btn btn-default save">save</button>
					</div>
				</form>
			</div>
		</div>
		<!-- END OF PAGE BODY. DO NOT PUT CUSTOM CODE AFTER HERE -->
		</div>
		

		<!-- FOOTER -->
		<!-- Note: Includes JS -->
		<?php require_once '../views/partials/footer.php'; ?>
		<!--===-->
	</body>
</html>