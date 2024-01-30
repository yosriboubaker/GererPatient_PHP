<?php include '../connexion.php'?>
<?php
if(isset($_POST['nomAdmin'])){
    $nom = $_POST['nomAdmin'];

    $req = "DELETE FROM  gestionpatient.admins   WHERE nomAdmin = '$nom'";
    $db -> exec($req);
    header("Location: /projetExamenPatient/adminF/listeDesAdmins.php");
    exit();
}else{
    echo("delete non efectue");
}

?>