<?php include '../connexion.php'?>
<?php
if(isset($_POST['codeP'])){
    $code = $_POST['codeP'];
    $req = "DELETE FROM  Seances WHERE codeP = '$code'";
    $db -> exec($req);
    header("Location: /projetExamenPatient/gererSeances/listeDesSeances.php");
    exit();
}else{
    header("Location: /projetExamenPatient/gererSeances/nouveauSeance.php");
    exit();
}  

?>