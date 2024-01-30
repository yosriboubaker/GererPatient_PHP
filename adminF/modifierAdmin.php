<?php include '../connexion.php'?>
<?php
if(isset($_POST['nomAdmin'])){
    $anciennNom = $_POST['nomAdmin']; 
    $NomAdmin = $_POST['newNomAdmin'];
    $prenomAdmin =$_POST['newPrenomAdmin'];
    $mdp = $_POST['newmotDePasseAdmin'];
    
    $req = "UPDATE admins SET nomAdmin = '$NomAdmin',prenomAdmin = '$prenomAdmin'  ,motDePasseAdmin = '$mdp' WHERE nomAdmin = '$anciennNom'";
    $db ->exec($req);
    header("Location: /projetExamenPatient/adminF/listeDesAdmins.php");
    exit();  
}else{
    echo 'modification non effectue !';
}
?>