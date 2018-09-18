<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=test_db", "root", "1111");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e) {
        exit($e->getMessage());
    }
?>