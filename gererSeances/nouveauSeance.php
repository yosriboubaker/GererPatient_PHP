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
    <link rel="stylesheet" href="./seance.css">
</head>

<body style="text-align:center;">
    <?php include '../connexion.php'?>
    <?php include '../adminF/navBarAdmin.php'?>
    <h3>bonjour <span style="color:green;"><?php echo($_SESSION["user_nom"]); ?></span></h3>
    <h3>Ajouter Seance :</h3>

    <form action="ajouterSeance.php" method="POST" autocomplete="off">
        <label for="codePatients"> code patient </label><br>
        <input style="width:344px;height: 40px;border: 2px solid #000;" list="codePatients" name="codeP" id="codeP">
        <datalist id="codePatients">
            <?php 
            $req = $db->query('SELECT * FROM gestionpatient.patients');
            while ($tuple = $req->fetch()) {
            ?>
            <option value="<?php echo $tuple['codeP']?>">
                <?php } ?>
        </datalist><br>
        <label for="codeSoins"> code soins </label><br>
        <input style="width:344px;height: 40px;border: 2px solid #000;" list="codeSoins" name="codeS" id="codeS">
        <datalist id="codeSoins">
            <?php 
            $req = $db->query('SELECT * FROM gestionpatient.soins');
            while ($tuple = $req->fetch()) {
            ?>
            <option value="<?php echo $tuple['codeSoin']?>">
                <?php } ?>
        </datalist><br>
        <label for="dateSoin">Date </label> <br>
        <input style="width:344px;height: 40px;border: 2px solid #000;" type="date" id="dateSoin"
            name="dateSoin"><br><br>
        <input class="button-59" type="reset" value="Annuler">
        <input class="button-59" type="submit" value="Envoyer">

    </form>


</body>


</html>
<?php } ?>