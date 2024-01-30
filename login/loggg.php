<?php
include '../connexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted phone number
    $phone_number = $_POST["numTel"];

    // Perform a query to check if the phone number exists in the database
    $req = $db->prepare('SELECT * FROM gestionpatient.patients WHERE numTel = :phone_number');
     
    // Check if the prepare statement succeeded
    if ($req === false) {
        die('Error in prepare statement: ' . $db->errorInfo()[2]);
    }

    // Bind the parameter
    $req->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);

    // Execute the statement
    $req->execute();

    // Get the result
    $result = $req->fetch(PDO::FETCH_ASSOC);

    // Check if the phone number exists
    if ($result) {
        // Phone number exists, set user session and redirect
        $_SESSION["user_phone_number"] = $phone_number;
        header("Location: /projetExamenPatient/user/home.php");
        exit();
    } else {
        header("Location: /projetExamenPatient/login/login.php");
    }

    // Close the statement
    $req = null;
}
?>