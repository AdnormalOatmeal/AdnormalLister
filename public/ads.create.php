<?php
    require_once '../bootstrap.php';
    
    // Authenticating Data from Input form in ads.create.php
    $errors = array();

    if (!empty($_POST)) {


        try {
            $title = Input::getString('title', 1, 255);
        } catch (InvalidArguementException $e) {
            $errors[] = $e->getMessage();
        } catch (OutOfRangeException $e) {
            $errors[] = $e->getMessage();
        } catch (DomainException $e) {
            $errors[] = $e->getMessage();
        } catch (LengthException $e) {
            $errors[] = $e->getMessage();
        }
        
        try {
            $price = Input::getNumber('price');
        } catch (InvalidArguementException $e) {
            $errors[] = $e->getMessage();
        } catch (OutOfRangeException $e) {
            $errors[] = $e->getMessage();
        } catch (DomainException $e) {
            $errors[] = $e->getMessage();
        } catch (RangeException $e) {
            $errors[] = $e->getMessage();
        }

        if ($_FILES) {

            $uploadsDirectory = 'img/uploads/';

            $filename = $uploadsDirectory . basename($_FILES['image_url']['name']);

            if (!move_uploaded_file($_FILES['image_url']['tmp_name'], $filename)) {

                $errors[] = "Sorry, there was an error uploading your file.";  
            }
        }

        try {
            $sale_end_date = Input::getDate('sale_end_date');
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }

        try {
            $categories = Input::getString('categories');
        } catch (InvalidArguementException $e) {
            $errors[] = $e->getMessage();
        } catch (OutOfRangeException $e) {
            $errors[] = $e->getMessage();
        } catch (DomainException $e) {
            $errors[] = $e->getMessage();
        } catch (LengthException $e) {
            $errors[] = $e->getMessage();
        }

        try {
            $description = Input::getString('description', 1, 1000);
        } catch (InvalidArguementException $e) {
            $errors[] = $e->getMessage();
        } catch (OutOfRangeException $e) {
            $errors[] = $e->getMessage();
        } catch (DomainException $e) {
            $errors[] = $e->getMessage();
        } catch (LengthException $e) {
            $errors[] = $e->getMessage();
        }


        if (empty($errors)) {

            $ad = new Ad();

            $ad->title = $title;
            $ad->image_url = $filename;
            $ad->price = $price;
            $postDate = date('Y-m-d');
            $ad->post_date = $postDate;
            $ad->sale_end_date = $sale_end_date;
            $ad->categories = $categories;
            $ad->description = $description;
            $ad->user_id = $_SESSION['id'];

            $ad->save();            
        }

    }
    
    if ($_FILES) {

        $uploadsDirectory = 'csv/';

        $filepath = $uploadsDirectory . basename($_FILES['csv_upload']['name']);

        if (!move_uploaded_file($_FILES['csv_upload']['tmp_name'], $filepath)) {

            $errors[] = "Sorry, there was an error uploading your file.";  
        }

        if ($handle = fopen($filepath, "r")) {
            
            $ad = new Ad();

            $headers = fgetcsv($handle, '0', ',');

            if (count($headers) == 6) {
                if (strtolower($headers[0]) == 'title' &&
                    strtolower($headers[1]) == 'price' &&
                    strtolower($headers[2]) == 'image' &&
                    strtolower($headers[3]) == 'sale end date' &&
                    strtolower($headers[4]) == 'category' &&
                    strtolower($headers[5]) == 'description') {

                    while (($bulkAds = fgetcsv($handle, '0', ',')) !== false) {
                        
                        $bulkTitle = $bulkAds[0];

                        $bulkPrice = $bulkAds[1];

                        $bulkImage = $bulkAds[2];

                        $bulkEndDate = $bulkAds[3];

                        $bulkCategory = $bulkAds[4];
                       
                        $bulkDescription = $bulkAds[5];
                        
                        if (empty($errors)) {
                            $ad->title = $bulkTitle;
                            $ad->price =$bulkPrice;
                            $ad->image_url = $bulkImage;
                            $postDate = date('Y-m-d');
                            $ad->post_date = $postDate;
                            $ad->sale_end_date = $bulkEndDate;
                            $ad->categories = $bulkCategory;
                            $ad->description = $bulkDescription;
                            $ad->user_id = $_SESSION['id'];

                            $ad->save();

                        }
                    }

                } else {

                    $errors[] = "Sorry, there was an error uploading your file.";
                    $errors[] = "Please verify that your header line is formatted to: Title, Price, Image, Sale End Date, Category, Description. Not Case Sensitive.";
                }
            } else {
                $errors[] = "Sorry, there was an error uploading your file.";
                $errors[] = "Please verify that your header file includes a total of six columns formatted to: Title, Price, Image, Sale End Date, Category, Description. Not Case Sensitive.";
            }
        }
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

        <title>Create Your Post - AdNormal Oatmeal</title>

        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/main.css" rel="stylesheet">

        <style type="text/css">
            .panel {
                width: 500px;
                margin: 10px auto;
            }

            #errors-display {
                background-color: yellow;
                color: red;
            }
            .margin-control {
                background-color: #f0ad4e;
                color: white;
            }
        </style>
    </head>

    <body>
        <!-- NAVBAR -->
        <?php require_once '../views/partials/navbar.php'; ?>
        <!--===-->

        <div class="container">
        <!-- HEADER -->
        <?php require_once '../views/partials/header.php'; ?>
        <!--===-->
        <!-- BEGINNING OF PAGE BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
        <div class="modal fade" id="bulk_file_upload_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Upload Bulk CSV File <br> <small>100 Rows or Less</small></h4>
                    </div>
                    <div class="modal-body">
                    <!-- BEGINNING OF MODAL BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
                        <form method="POST" action="/ads.create.php" enctype="multipart/form-data" id="csv">
                            <div class="form-group">
                                <label for="csv_upload">Upload Bulk CSV File</label>
                                <input type="file" id="csv_upload" name="csv_upload">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default" id="bulk_upload">Bulk Upload</button>
                            </div>
                        </form>
                    <!-- END OF PAGE MODAL. DO NOT PUT CUSTOM CODE AFTER HERE -->
                    </div>
                </div>
            </div>
        </div>
        
        <?php foreach ($errors as $key => $error) : ?>
            <div class="panel panel-danger">
                <div class="panel-heading">
                <?= $error; ?>
                </div>
            </div>
        <?php endforeach ?>        

        <div class="panel panel-default">
            <div class="panel-body">
                <form method="POST" action="ads.create.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="image_url">Upload an image</label>
                        <input type="file" id="image_url"name="image_url">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="sale_end_date">When is your sale ending?; </label>
                        <input type="text" class="form-control" id="sale_end_date" name="sale_end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="categories">Choose a category for your ad:</label>
                        <select class="form-control" id="categories" name="categories" required>
                            <option id='default-select' disabled selected>Select Category</option>
                            <option disabled></option>
                            <option disabled>----------------------</option>
                            <option disabled></option>
                            <option value="breakfast">Breakfast</option>
                            <option value="second_breakfast">Second Breakfast</option>
                            <option value="elevensies">Elevensies</option>
                            <option value="luncheon">Luncheon</option>
                            <option value="afternoon_tea">Afternoon Tea</option>
                            <option value="supper">Supper</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Enter a short description for your ad: <small>(Description must be 1000 characters or less.)</small></label>
                        <textarea class="form-control" rows="8" name="description" id="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default">Submit</button>
                    </div>
                </form>
                <div class="test">
                    <div class="form-group">
                        <label for="csv_upload_link" class="sr-only">Click to upload a bulk CSV File</label>
                        <a id='csv_upload_link' data-toggle="modal" data-target="#bulk_file_upload_modal">Upload Bulk CSV File</a>
                    </div>
                </div>
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