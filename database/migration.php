<?php
    require_once 'ads_config.php';
    require_once 'db_connect.php';

    $dropSql = "DROP TABLE IF EXISTS ads";

    $createSql = "CREATE TABLE ads (
        id INT UNSIGNED AUTO_INCREMENT,
        title CHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        image_url CHAR(255),
        location CHAR(255) NOT NULL,
        sell_by DATE NOT NULL,
        categories CHAR(255) NOT NULL,
        description VARCHAR(1000) NOT NULL,
        PRIMARY KEY(id)
        )";

    $dbc->exec($createSql);
?>

