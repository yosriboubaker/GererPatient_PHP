<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION["user_phone_number"])) {
    header("Location: /projetExamenPatient/login/login.php");
    }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <?php include '../header/header.php'?>
</header>

<body>
    <h1>contact page</h1>
</body>
<footer>
    <?php include '../footer/footer.php'?>
</footer>

</html>
<?php } ?>