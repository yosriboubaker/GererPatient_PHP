<?php include 'connexion.php'?>
<?php
if(isset($_POST['codeP'])){
    $ancienCode = $_POST['codeP']; 
    $code = $_POST['newcodeP'];
    $nom = $_POST['newnomP'];
    $prenom =$_POST['newprenomP'];
    $numTel = $_POST['newnumP'];
    
    $req = "UPDATE patients SET codeP = '$code',nomP = '$nom'  ,prenomP = '$prenom',numTel = '$numTel' WHERE codeP = $ancienCode";
    $db ->exec($req);
    header("Location: /projetExamenPatient/listeDesPatients.php");
    exit();  
}else{
    echo 'modification non effectue !';
}
?>