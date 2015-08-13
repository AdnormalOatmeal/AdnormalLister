<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../assets/ico/favicon.png">

		<title>View/Edit Users - AdNormal Oatmeal</title>

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
			.editUser {
				position: relative;
				top: -5px;
			}
			.test {
				text-align: right;
				float: right;
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
		<?php 

		require_once '../models/User.php';
		
		$id = $_GET["id"]; 
		$user = new User();
		$currentUser = $user->find($id);

		// var_dump($currentUser);
		// var_dump("GET ID: " . $id);
		// var_dump("Session ID: " . $_SESSION["id"]);

		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<?= $currentUser->attributes[0]["first_name"] . " " . $currentUser->attributes[0]["last_name"]?>
				<?php if ($_SESSION["id"] == $id) : ?>
				<div class="test">
				<a href="http://adnormallister.dev/users/edit?id=<?= $_SESSION["id"] ?>"><button class="btn btn-default editUser">Edit User</button></a>
				</div>
				<?php endif; ?>
			</div>
			<div class="panel-body">
				<table class="table">
					<tr>
						<td>Username</td>
						<td><?= $currentUser->attributes[0]["user_name"] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?= $currentUser->attributes[0]["email"] ?></td>
					</tr>
					<tr>
						<td>Location</td>
						<td><?= $currentUser->attributes[0]["location"] ?></td>
					</tr>
					<tr>
						<td>Organization</td>
						<td><?= $currentUser->attributes[0]["organization"] ?></td>
					</tr>
				</table>		
			</div>
		</div>

		<!-- END OF PAGE BODY. DO NOT PUT CUSTOM CODE AFTER HERE -->
		</div>
		

		<!-- FOOTER -->
		<!-- Note: Includes JS -->
		<?php require_once '../views/partials/footer.php'; ?>
		<!--===-->
</html>