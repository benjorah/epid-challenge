<?php


        // import database connection variables
         require_once('db_config.php');
         $pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';charset=utf8mb4', DB_USER, DB_PASSWORD, array(PDO::ATTR_EMULATE_PREPARES => false,
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>
