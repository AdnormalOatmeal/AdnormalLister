<?php
	require_once '../bootstrap.php';

	$id = $_GET["id"];
	$currentAd = Ad::find($id);

	$userId = $currentAd->attributes[0]["user_id"];
	$currentUser = User::find($userId);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../assets/ico/favicon.png">

		<title><?= $currentAd->attributes[0]["title"] ?></title>

		<!-- Bootstrap core CSS -->
  		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="/css/main.css" rel="stylesheet">

		<style type="text/css">
			.linked-images {
				float: right;
				margin-right: 10px;
			}
			.thing {
				font-size: 1.2em;
			}
			.row {
				margin-bottom: 10px
			}
		</style>
	</head>

	<body>
		<!-- NAVBAR -->
		<?php require_once '../views/partials/navbar.php'; ?>
		<!--===-->

		<div class="container">
		<!-- BEGINNING OF PAGE BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
			<!-- HEADER -->
			<?php require_once '../views/partials/header.php'; ?>
			<!--===-->

			<div class="container">
				<div class="row">
					<h2>
						<?= $currentAd->attributes[0]["title"] ?>
						<?php if (isset($_SESSION['id'])) : ?>
							<?php if ($_SESSION["id"] == $userId) : ?>
								<a href="http://adnormallister.dev/ads/edit?id=<?= $currentAd->attributes[0]["id"] ?>"><button class="btn btn-default editUser">Edit Ad</button></a>
							<?php endif; ?>
						<?php endif; ?>
					</h2>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-4">
						<div>
						<strong>Posted by: </strong><a href="http://adnormallister.dev/users/show?id=<?= $userId ?>"><?= $currentUser->attributes[0]["user_name"] ?></a>
						</div>
						<div>
						<strong>Location: </strong><?= $currentUser->attributes[0]["location"] ?>
						</div>
						<div>
						<strong>Organization: </strong><?= $currentUser->attributes[0]["organization"] ?>
						</div>
						<div>
						<strong>Catagory: </strong><?= $currentAd->attributes[0]["categories"] ?>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<br>
						<div>
						<strong>Price:</strong> $<?= $currentAd->attributes[0]["price"] ?>
						</div>
						<div>
						<strong>Date Posted: </strong><?= $currentAd->attributes[0]["post_date"] ?>
						</div>
						<div>
						<strong>Sell by Date: </strong><?= $currentAd->attributes[0]["sale_end_date"] ?>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<img class="img-thumbnail" src="http://adnormallister.dev/<?= $currentAd->attributes[0]["image_url"] ?>">
					</div>
				</div>
				<div class="row">
					<?= $currentAd->attributes[0]["description"] ?>
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