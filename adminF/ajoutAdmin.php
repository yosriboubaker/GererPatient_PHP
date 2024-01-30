<?php include '../connexion.php'?>
<?php
if(isset($_POST['nomA'])){
    $nomA = $_POST['nomA'];
    $prenomA =$_POST['prenomA'];
    $password = $_POST['password'];

        $req = "INSERT INTO admins(nomAdmin,prenomAdmin,motDePasseAdmin) VALUES('$nomA','$prenomA','$password')";
        $db ->exec($req);
        header("Location: /projetExamenPatient/adminF/listeDesAdmins.php");
        exit();
        
}else{
    header("Location: /projetExamenPatient/adminF/nouveauAdmin.php");
        exit();
}


?>