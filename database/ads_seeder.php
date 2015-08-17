<?php
    require_once '../bootstrap';

    $truncateAds = "TRUNCATE ads";

    $dbc->exec($truncateAds);

    $ads = [
    ['title' => 'Hot Dogs', 'price' => 3.00, 'image_url' => 'img/uploads/hotdog.jpg', 'post_date' => '2015/08/10', 'sale_end_date' => '2015/10/06', 'categories' => 'luncheon', 'description' => 'Hotdog styled in your preference, offering Chicago Style, New York Style, and South West Style dogs.', 'user_id' => mt_rand(1, 4)],
    ['title' => 'Yaki Soba', 'price' => 12.00, 'image_url' => 'img/uploads/yakisoba.jpg', 'post_date' => '2015/08/10', 'sale_end_date' => '2015/10/06', 'categories' => 'elevensies', 'description' => 'Stir-Fry combination of vegetables, your choice of meat(s) and yaki-soba style noodles, in a brown sauce.', 'user_id' => mt_rand(1, 4)],
    ['title' => 'Red Curry Chicken and Saffron Rice', 'price' => 13.00, 'image_url' => 'img/uploads/redcurrywrice.jpg', 'post_date' => '2015/08/10', 'sale_end_date' => '2015/10/06', 'categories' => 'supper', 'description' => 'Chicken in a spicy red curry sauce served with saffron rice. Served with Naan.', 'user_id' => mt_rand(1, 4)],
    ];

    $insertAds = "INSERT INTO ads (title, price, image_url, post_date, sale_end_date, categories, description, user_id) VALUES (:title, :price, :image_url, :post_date, :sale_end_date, :categories, :description, :user_id)";

    $stmt = $dbc->prepare($insertAds);

    foreach ($ads as $ad) {
        $stmt->bindValue(':title', $ad['title'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $ad['price'], PDO::PARAM_INT);
        $stmt->bindValue(':image_url', $ad['image_url'], PDO::PARAM_STR);
        $stmt->bindValue(':post_date', $ad['post_date'], PDO::PARAM_STR);
        $stmt->bindValue(':sale_end_date', $ad['sale_end_date'], PDO::PARAM_STR);
        $stmt->bindValue(':categories', $ad['categories'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $ad['description'], PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $ad['user_id'], PDO::PARAM_INT);

        $stmt->execute();
    }
?>