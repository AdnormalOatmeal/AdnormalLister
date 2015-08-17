<?php  
    require_once '../bootstrap.php';

    $id = $_GET["id"];

    $currentAd = Ad::find($id);

    if (Input::has("title")) {

        $ad = new Ad();

        $ad->title = Input::get('title');
        $ad->price = Input::get('price');
        $ad->sale_end_date = Input::get('sale_end_date');
        $ad->categories = Input::get('categories');
        $ad->description = Input::get('description');
        $ad->id = $id;

        $ad->save();

        header("Location: /ads/show?id=" . $id);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.png">

        <title>Edit Your Ad - AdNormal Oatmeal</title>

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
                    <div class="form-group" action="adnormallister.dev/ads.edit.php">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $currentAd->attributes[0]["title"]; ?>" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price ($)</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?= $currentAd->attributes[0]["price"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="sale_end_date">Sale Ends</label>
                        <input type="text" class="form-control" id="sale_end_date" name="sale_end_date" value="<?= $currentAd->attributes[0]["sale_end_date"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="categories">Choose a category for your ad:</label>
                        <select class="form-control" id="categories" name="categories" required>
                            <option id='default-select' disabled selected>Select Category</option>
                            <option disabled></option>
                            <option disabled>----------------------</option>
                            <option disabled></option>
                            <option value="breakfast" <?= ($currentAd->attributes[0]['categories'] == "breakfast") ? 'selected' : ''; ?>>Breakfast</option>
                            <option value="second_breakfast" <?= ($currentAd->attributes[0]['categories'] == "second_breakfast") ? 'selected' : ''; ?>>Second Breakfast</option>
                            <option value="elevensies" <?= ($currentAd->attributes[0]['categories'] == "elevensies") ? 'selected' : ''; ?>>Elevensies</option>
                            <option value="luncheon" <?= ($currentAd->attributes[0]['categories'] == "luncheon") ? 'selected' : ''; ?>>Luncheon</option>
                            <option value="afternoon_tea" <?= ($currentAd->attributes[0]['categories'] == "afternoon_tea") ? 'selected' : ''; ?>>Afternoon Tea</option>
                            <option value="supper" <?= ($currentAd->attributes[0]['categories'] == "supper") ? 'selected' : ''; ?>>Supper</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="8" name="description" id="description" required><?= $currentAd->attributes[0]["description"]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default">Save Changes</button>
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