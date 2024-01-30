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
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fefefe;
        padding: 20px;
        border: 1px solid #ccc;
        z-index: 1;
    }

    .popup-content {
        text-align: center;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>
<header>
    <?php include '../header/header.php'?>
</header>

<body>
    <br><br>
    <h5>votre numero de telephone est : <?php echo $_SESSION["user_phone_number"]?></h5>
    <h3 style="text-align: center">Listes des Soins</h3><br>

    <table>
        <tr>
            <th>Code Soins</th>
            <th>Designation</th>
        </tr>
        <?php include '../connexion.php'?>
        <?php 
            $req = $db->query('SELECT * FROM gestionpatient.soins');
            while ($tuple = $req->fetch()) {
        ?>
        <tr>
            <td><?php echo $tuple['codeSoin'] ?></td>
            <td><?php echo $tuple['designation'] ?></td>
        </tr>
        <?php } ?>
    </table>

    <script>
    </script>
</body>
<footer>
    <?php include '../footer/footer.php' ?>
</footer>

</html>
<?php } ?>