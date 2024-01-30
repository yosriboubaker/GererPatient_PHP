<?php include '../connexion.php'?>
<?php
if(isset($_POST['codeSoin'])){
    $ancienCodeS = $_POST['codeSoin'];
    $ancienCodeP = $_POST['codeP'];
    $codeS = $_POST['newcodeS'];
    $date = $_POST['newdateS'];
    
    $req = "UPDATE seances SET codeSoin = '$codeS', dateSoin = '$date'  WHERE codeSoin= $ancienCodeS AND codeP = $ancienCodeP";
    $db ->exec($req);
    header("Location: /projetExamenPatient/gererSeances/listeDesSeances.php");
    exit();
}else{
    header("Location: /projetExamenPatient/gererSeances/listeDesSeances.php");
    exit();
}
?>