<?php
session_start();


if (!isset($_SESSION["user_phone_number"])) {
    header("Location: /projetExamenPatient/login/login.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Welcome </title>
</head>
<style></style>

<body>

    <header>
        <?php include '../header/header.php'?>
    </header>
    <h5>Home Page</h5>
    <h4>Welcome, <?php echo $_SESSION["user_phone_number"]; ?>!</h4>




    <footer>
        <?php include '../footer/footer.php'?>
    </footer>

</body>

</html>

<?php } ?>