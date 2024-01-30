<?php include 'connexion.php'?>
<?php
if(isset($_POST['codeP'])){
    $code = $_POST['codeP'];
    $nom = $_POST['nomP'];
    $prenom =$_POST['prenomP'];
    $numTel = $_POST['numP'];

        $req = "INSERT INTO patients(codeP,nomP,prenomP,numTel) VALUES('$code','$nom','$prenom','$numTel')";
        $db ->exec($req);
        header("Location: /projetExamenPatient/listeDesPatients.php");
        exit();
        
}else{
    header("Location: /projetExamenPatient/nouveauPatient.php");
}


?>