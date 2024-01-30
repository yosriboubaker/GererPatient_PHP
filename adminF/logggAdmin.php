<?php
include '../connexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted values
    $nom = $_POST["nomAdmin"];
    $mdpA = $_POST["motDePasseAdmin"];

    // Perform a query to check if the admin exists in the database
    $req = $db->prepare('SELECT * FROM gestionpatient.admins WHERE nomAdmin = :nom AND motDePasseAdmin = :mdpA');

    // Check if the prepare statement succeeded
    if ($req === false) {
        die('Error in prepare statement: ' . $db->errorInfo()[2]);
    }

    // Bind the parameters
    $req->bindParam(':nom', $nom, PDO::PARAM_STR);
    $req->bindParam(':mdpA', $mdpA, PDO::PARAM_STR);

    // Execute the statement
    $req->execute();

    // Get the result
    $result = $req->fetch(PDO::FETCH_ASSOC);

    // Check if the admin exists
    if ($result) {
        // Admin exists, set user session and redirect
        $_SESSION["user_nom"] = $nom;  // Assuming you want to store the admin's name in the session
        header("Location: /projetExamenPatient/ajoutPatient.php");
        exit();
    } else {
        header("Location: /projetExamenPatient/adminF/logAdmin.php");
    }

    // Close the statement
    $req = null;
}
?>