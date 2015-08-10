
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Dashboard Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/main.css" rel="stylesheet">

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
