<?php include '../connexion.php'?>
<?php
if(isset($_POST['codeSoin'])){
    $code = $_POST['codeSoin'];
    $req = "DELETE FROM  Soins WHERE codeSoin = '$code'";
    $db -> exec($req);
    header("Location: /projetExamenPatient/gererSoins/listeDesSoins.php");
    exit();
}else{
    echo 'delete non effectue !';
}  

?>