<?php
session_start();

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
    <br>
    <h3> Blog page </h3>
    <section id="blog">
        <?php 
            $x = 2;
            for($i=0;$i<$x;$i++){
            ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">blog title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <?php 
              }
            ?>

        <!-- Ajoutez d'autres articles selon votre besoin -->
    </section>
</body>
<footer>
    <?php include '../footer/footer.php'?>
</footer>

</html>
<?php } ?>