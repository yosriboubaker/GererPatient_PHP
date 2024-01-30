<?php include 'connexion.php'?>
<?php
if(isset($_POST['codeP'])){
    $code = $_POST['codeP'];

    $req = "DELETE FROM  gestionpatient.patients WHERE codeP = '$code'";
    $db -> exec($req);
    header("Location: /projetExamenPatient/listeDesPatients.php");
    exit();
}else{
    header("Location: /projetExamenPatient/listeDesPatients.php");
}

?>