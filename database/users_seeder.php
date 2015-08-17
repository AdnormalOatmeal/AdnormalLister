<?php
    require_once '../bootstrap.php':

    $truncateUsers = "TRUNCATE users";

    $dbc->exec($truncateUsers);

    $users = [
    ['user_name' => 'BobFromAccounting', 'PASSWORD' => password_hash('password', PASSWORD_DEFAULT), 'first_name' => 'Tarek', 'last_name' => 'Hafez', 'location' => 'San Antonio, TX', 'email' => 'thafez@ymail.com', 'organization' => 'codeup'],
    ['user_name' => 'tbirrell', 'PASSWORD' => password_hash('password321', PASSWORD_DEFAULT), 'first_name' => 'Timothy', 'last_name' => 'Birrell', 'location' => 'San Antonio, TX', 'email' => 'tbirrell@mastersolutions.biz', 'organization' => 'codeup'],
    ['user_name' => 'franklinHacks1', 'PASSWORD' => password_hash('hacker4life', PASSWORD_DEFAULT), 'first_name' => 'John', 'last_name' => 'Hacks', 'location' => 'Lafayette, LA', 'email' => 'hacker@123fakedomain.com', 'organization' => 'Fundraiser Dev'],
    ['user_name' => 'DeadPool', 'PASSWORD' => password_hash('needone', PASSWORD_DEFAULT), 'first_name' => 'Wade', 'last_name' => 'Wilson', 'location' => 'New York, NY', 'email' => 'deadpoolrulez@yahoo.gov', 'organization' => 'Weapon X'],
    ];

    $insertUsers = "INSERT INTO users (user_name, PASSWORD, first_name, last_name, location, email, organization) VALUES (:user_name, :PASSWORD, :first_name, :last_name, :location, :email, :organization)";

    $stmt = $dbc->prepare($insertUsers);

    foreach ($users as $user) {
        $stmt->bindValue(':user_name', $user['user_name'], PDO::PARAM_STR);
        $stmt->bindValue(':PASSWORD', $user['PASSWORD'], PDO::PARAM_STR);
        $stmt->bindValue(':first_name', $user['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $user['last_name'], PDO::PARAM_STR);
        $stmt->bindValue(':location', $user['location'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
        $stmt->bindValue(':organization', $user['organization'], PDO::PARAM_STR);

        $stmt->execute();
    }
?>