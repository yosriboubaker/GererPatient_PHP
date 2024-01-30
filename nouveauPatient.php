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
    <link rel="stylesheet" href="./adminF/admin.css">
</head>

<body style="text-align:center">
    <?php include 'connexion.php'?>
    <?php include './adminF/navBarAdmin.php'?>

    <h3 style="text-align:left">bonjour <span style="color:#26eacd;"><?php echo($_SESSION["user_nom"]); ?></span></h3>
    <h3>Ajouter un Patient </h3><br>
    <form action="ajoutPatient.php" method="POST">
        <label for="fname">code Patient</label><br>
        <input type="text" id="codeP" name="codeP" value="" class="inputFormY"><br>
        <label for="nom">Nom Patient:</label><br>
        <input type="text" id="nomP" name="nomP" value="" class="inputFormY"><br>
        <label for="prenom">Prenom Patient</label><br>
        <input type="text" id="prenomP" name="prenomP" value="" class="inputFormY"><br>
        <label for="adresse">Numero De Patient</label><br>
        <input type="text" id="numP" name="numP" value="" class="inputFormY"><br><br>
        <input class="button-59" type="reset" value="Annuler">
        <input class="button-59" type="submit" value="Enregistrer">
    </form>


</body>

</html>
<?php } ?>