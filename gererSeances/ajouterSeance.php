<?php include '../connexion.php'?>
<?php include '../navbar/menu.php'?>
<?php
if(isset($_POST['codeP'])){
    $codep = $_POST['codeP'];
    $codes = $_POST['codeS'];
    $date =$_POST['dateSoin'];
        $req = "INSERT INTO seances(codeP,codeSoin,dateSoin) VALUES('$codep','$codes','$date')";
        $db ->exec($req);
        header("Location: /projetExamenPatient/gererSeances/listeDesSeances.php");
        exit();
        
}else{
    echo("ajout non effectueé");
}


?>