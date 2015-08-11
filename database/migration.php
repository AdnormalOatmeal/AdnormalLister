<?php
    require_once 'ads_config.php';
    require_once 'db_connect.php';

    $dropUsers = "DROP TABLE IF EXISTS users";

    $createUsers = "CREATE TABLE users (
        id INT UNSIGNED AUTO_INCREMENT,
        user_name VARCHAR(20) NOT NULL,
        first_name CHAR(100) NOT NULL,
        last_name CHAR(100) NOT NULL,
        location VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        organization VARCHAR(255) NOT NULL,
        PRIMARY KEY(id)
        )";

    $dbc->exec($createUsers);
    
    $dropAds = "DROP TABLE IF EXISTS ads";

    $createAds = "CREATE TABLE ads (
        id INT UNSIGNED AUTO_INCREMENT,
        title CHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        image_url CHAR(255),
        post_date DATE NOT NULL,
        sale_end_date DATE NOT NULL,
        categories CHAR(255) NOT NULL,
        description VARCHAR(1000) NOT NULL,
        user_id INT UNSIGNED NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY(user_id) REFERENCES users (id)
        )";

    $dbc->exec($createAds);
?>

