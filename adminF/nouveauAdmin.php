<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION["user_nom"] )) {
    header("Location: /projetExamenPatient/adminF/logAdmin.php");
    }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="text-align:center">
    <?php include '../connexion.php'?>
    <?php include './navBarAdmin.php'?>
    <h3>bonjour <span style="color:green;"><?php echo($_SESSION["user_nom"]); ?></span></h3>

    <h3>Ajouter Admin </h3>
    <form action="ajoutAdmin.php" method="POST">
        <label for="nom">Nom Admin:</label><br>
        <input type="text" id="nomA" name="nomA" value=""><br>
        <label for="prenom">Prenom Admin:</label><br>
        <input type="text" id="prenomA" name="prenomA" value=""><br>
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" value=""><br><br>
        <input type="reset" value="Annuler">
        <input type="submit" value="Enregistrer">
    </form>


</body>

</html>
<?php }  ?>