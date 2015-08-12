<?php  


require_once '../bootstrap.php';


$user = Input::get("username");
$firsttime = true;

// is first time?
if (Input::has("password")) {
	$password = Input::get("password");
	$firsttime = false;
} else {
	$password = "";
}

// check credentials
if (Auth::attempt($password, $user, $dbc)) { 
	$_SESSION["isLoggedIn"] = true;
	header("Location: http://adnormallister.dev");
	exit();
} else {
	$_SESSION["isLoggedIn"] = false;
}



?>

<html>
<head>
	<title>Login</title>
	<!-- Bootstrap -->
  		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<style>

	.failed {
		color: #F00;
	}
	.panel {
		width: 40%;
		margin: 50px auto;
	}

	</style>
</head>
<body>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title test">Login</h3>
		</div>
		<div class="panel-body">
			<form method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" autofocus>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>
				<?php if (!$firsttime) : ?>
					<h6 class="failed">Login Failed</h6>
				<?php endif; ?>
				<div class="form-group">
					<button class="btn btn-default">Login</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>