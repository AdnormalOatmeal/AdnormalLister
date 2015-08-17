<?php
    require_once '../bootstrap.php';


    // start of display and pagination logic
    $limit = 12; 
    $offset = 0;
    $stmt = $dbc->query('SELECT count(*) FROM ads');
    $totalPages = ceil(($stmt->fetchColumn())/$limit);

    if (!isset($_GET['page']) ||
        !is_numeric($_GET['page']) ||
        $_GET['page'] < 1) {

        $_GET['page'] = 1;
        $page = 1;
    } else {
        $offset = ($_GET['page'] - 1) * $limit;
        $page = $_GET['page']; 
    }

    if ($_GET['page'] > $totalPages) {
        header("Location: ?page=$totalPages");
        exit();
    }

    if (Input::has("q")) {
        $q = Input::get("q");
    } else {
        $q = "%";
    }

    $query = "SELECT * FROM ads WHERE title LIKE '%' || :q || '%' LIMIT :limit OFFSET :offset";

    $stmt = $dbc->prepare($query);
    // $stmt->fetchAll(PDO::FETCH_ASSOC);

    // $stmt->bindValue(':column', $column, PDO::PARAM_STR);
    $stmt->bindValue(':q', $q, PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();


    $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // end of display and pagination logic

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>View All Posts - AdNormal Oatmeal</title>

    <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/main.css" rel="stylesheet">

        <style type="text/css">
            .thing {
                font-size: 1.2em;
            }

            .linked-images {
                max-width: 150px;
                max-height: 150px;
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
        <?php foreach ($ads as $key => $ad): ?>
            <div class="container col-sm-6 col-md-4">     
                <a href="/ads/show?id=<?= $ad['id']; ?>">
                <!-- NEEDS TO INCLUDE A TAGS TO MAKE IT CLICKABLE -->
                <h2>
                    <?php if (strlen($ad['title']) > 20): ?>
                        <?= substr($ad['title'], 0, 20) . "..."; ?>
                    <?php else : ?>
                        <?= $ad['title']; ?>
                    <?php endif ?>
                </h2>
                <!-- END HEADER LINK -->
                
                <img src="<?= $ad['image_url']; ?>" class="linked-images img-thumbnail">
                </a>
                <p class="thing">
                <strong>Price: </strong>$<?= $ad['price']; ?> <br>
                <strong>Categories: </strong><?= $ad['categories']; ?> <br>
                <strong>Date Created: </strong><?= $ad['post_date']; ?><br>
                </p>
            </div>
        <?php endforeach; ?>
        <!-- PAGINATION STARTS -->

        <div class="container text-center">
            <a class='btn btn-danger' href="?q=<?= $q ?>&page=1">First Page</a>

            <?php if ($page != 1): ?>
                <a class='btn btn-danger' href="?q=<?= $q ?>&page=<?= $page - 1; ?>">Previous</a>
            <?php endif; ?>

                <span> - </span>

            <?php for ($i = 1; $i <= $totalPages; $i += 1) { ?>
                <?php if ($i > ($_GET['page'] - 3) && $i < ($_GET['page'] + 3)) : ?>
                    <a class='btn btn-danger' href="?q=<?= $q ?>&page=<?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php } ?>

                <span> - </span>

            <?php if ($page < $totalPages): ?>
                <a class='btn btn-danger' href="?q=<?= $q ?>&page=<?= $page + 1; ?>">Next</a>
            <?php endif; ?>

            <a class='btn btn-danger' href="?q=<?= $q ?>&page=<?= $totalPages ?>">Last Page</a>
        </div>
        <!-- PAGINATION ENDS -->
    <!-- END OF PAGE BODY. DO NOT PUT CUSTOM CODE AFTER HERE -->
    </div>
    <!-- FOOTER -->
    <!-- Note: Includes JS -->
    <?php require_once '../views/partials/footer.php'; ?>
    <!--===-->
</body>
</html>