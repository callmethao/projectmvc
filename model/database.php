<?php
    $dsn = 'mysql:host=localhost;dbname=mohinhmvc';
    $username = 'root';

    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('view/loi.php');
        exit();
    }