<?php
	require_once '../bootstrap.php';
	require_once '../models/Ad.php';

	$ads = Ad::all();
	
	$ads = $ads->attributes;

	asort($ads);

	$featuredAds[] = array_pop($ads);
	$featuredAds[] = array_pop($ads);
	$featuredAds[] = array_pop($ads);	

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../assets/ico/favicon.png">

		<title>Adnormal Oatmeal</title>

		<!-- Bootstrap core CSS -->
  		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/main.css" rel="stylesheet">

		<style type="text/css">
			.linked-images {
				float: right;
				margin-right: 10px;
			}
			.thing {
				font-size: 1.2em;
			}
		</style>
	</head>

	<body>
		<!-- NAVBAR -->
		<?php require_once '../views/partials/navbar.php'; ?>
		<!--===-->

		<div class="container">
		<!-- BEGINNING OF PAGE BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
			<!-- NAVBAR -->
			<?php require_once '../views/partials/header.php'; ?>
			<!--===-->

			<div class="container">
			<h1>Featured Ads</h1>
				<?php foreach ($featuredAds as $ad): ?>
					<div class="container col-sm-6 col-md-4">
						
						<!-- NEEDS TO INCLUDE A TAGS TO MAKE IT CLICKABLE -->
						<h2><?= $ad['title']; ?></h2>
						<!-- END HEADER LINK -->
						
						<img src="<?= $ad['image_url']; ?>" class="linked-images">
						<p class="thing">
						<strong>Price: </strong>$<?= $ad['price']; ?> <br>
						<strong>Description: </strong><?= $ad['description']; ?><br>
						</p>
					</div>
				<?php endforeach; ?>
			</div>

		<!-- END OF PAGE BODY. DO NOT PUT CUSTOM CODE AFTER HERE -->
		</div>
		<!-- FOOTER -->
		<!-- Note: Includes JS -->
		<?php require_once '../views/partials/footer.php'; ?>
		<!--===-->
	</body>
</html>