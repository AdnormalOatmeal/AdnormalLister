<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../assets/ico/favicon.png">

		<title>Sign Up - AdNormal Oatmeal</title>

		<!-- Bootstrap core CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="/css/main.css" rel="stylesheet">

		<style type="text/css">
			.panel {
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
		<?php  

		if (Input::has("username")) {
			$insertUsers = "INSERT INTO users (user_name, PASSWORD, first_name, last_name, location, email, organization) VALUES (:user_name, :PASSWORD, :first_name, :last_name, :location, :email, :organization)";

			$stmt = $dbc->prepare($insertUsers);

			$stmt->bindValue(':user_name', Input::get('username'), PDO::PARAM_STR);
			$stmt->bindValue(':PASSWORD', password_hash(Input::get('passwrd'), PASSWORD_DEFAULT), PDO::PARAM_STR);
			$stmt->bindValue(':first_name', Input::get('first_name'), PDO::PARAM_STR);
			$stmt->bindValue(':last_name', Input::get('last_name'), PDO::PARAM_STR);
			$stmt->bindValue(':location', Input::get('location'), PDO::PARAM_STR);
			$stmt->bindValue(':email', Input::get('email'), PDO::PARAM_STR);
			$stmt->bindValue(':organization', Input::get('organization'), PDO::PARAM_STR);

			$stmt->execute();
		}


		?>

		<div class="panel panel-default">
			<div class="panel-body">
				<form method="POST">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" autofocus required>
					</div>
					<div class="form-group">
						<label for="passwrd">Password</label>
						<input type="password" class="form-control" id="passwrd" name="passwrd" required>
					</div>
					<div class="form-group">
						<label for="confirmPass">Confirm Password</label>
						<input type="password" class="form-control" id="confirmPass" name="confirmPass" required>
					</div>
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" class="form-control" id="first_name" name="first_name" required>
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name" required>
					</div>
					<div class="form-group">
						<label for="location">Location</label>
						<input type="text" class="form-control" id="location" name="location" placeholder="e.g. San Fransisco, CA" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="organization">Organization</label>
						<input type="text" class="form-control" id="organization" name="organization">
					</div>
					<div class="form-group">
						<button class="btn btn-default signup">Sign Up</button>
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

		<script>
		$(".signup").click(function(evt) {
			var fPass = $("#passwrd");
			var cPass = $("#confirmPass");
			console.log("first " + fPass.val());
			console.log("confirm " + cPass.val());
			if (fPass.val() != cPass.val()) {
				alert("Passwords do not match");
				evt.preventDefault();
			}
		})
		</script>
</html>