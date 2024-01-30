<?php include '../connexion.php'?>
<?php
if(isset($_POST['codeSoin'])){
    $ancienCode = $_POST['codeSoin']; 
    $codeS = $_POST['newcodeS'];
    $desig = $_POST['newdesig'];
    
    $req = "UPDATE soins SET codeSoin = '$codeS',designation = '$desig' WHERE codeSoin = $ancienCode";
    $db ->exec($req);
    header("Location: /projetExamenPatient/gererSoins/listeDesSoins.php");
    exit();
}else{
    echo 'update non effectué ! ';
}
?>