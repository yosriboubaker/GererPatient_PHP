<?php 

try {
    $username = "root";
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=gestionpatient;port=3306;
    charset=utf8';
    $db = new PDO($dsn, $username, $password, array(PDO::
    ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    }
    
    
?>