<?php include '../connexion.php'?>
<?php
if(isset($_POST['codeS'])){
    $codeS = $_POST['codeS'];
    $desig = $_POST['desig'];
        $req = "INSERT INTO soins(codeSoin,designation) VALUES('$codeS','$desig')";
        $db ->exec($req);
        header("Location: /projetExamenPatient/gererSoins/listeDesSoins.php");
        exit();
}else{
    header("Location: /projetExamenPatient/gererSoins/nouveauSoins.php");
}

?>