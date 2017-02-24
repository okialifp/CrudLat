<?php  
    $host = "localhost";
    $dbname = "crud_web";
    $username = "root";
    $password = "123456789";

    try {
       
        $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
       
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception){
        die("Connection error: " . $exception->getMessage());
    }
?>