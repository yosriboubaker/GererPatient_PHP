<?php
session_start();

if (!isset($_SESSION["user_phone_number"])) {
    header("Location: /projetExamenPatient/login/login.php");
    }else{
?>
<!DOCTYPE html>

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

    <h5>votre numero de telephone est : <?php echo $_SESSION["user_phone_number"]?></h5>
    <br><br>
    <h3 style="text-align: center">Listes des Patients</h3>
    <br>
    <table>
        <tr>
            <th>Code Patient</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>telephone </th>
        </tr>
        <?php include '../connexion.php'?>
        <?php 
            $req = $db->query('SELECT * FROM gestionpatient.patients');
            while ($tuple = $req->fetch()) {
        ?>
        <tr>
            <td><?php echo $tuple['codeP'] ?></td>
            <td><?php echo $tuple['nomP'] ?></td>
            <td><?php echo $tuple['prenomP'] ?></td>
            <td class="obfuscatedNumber"><?php echo $tuple['numTel'] ?></td>
        </tr>
        <?php } ?>
    </table>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var obfuscatedNumbers = document.querySelectorAll('.obfuscatedNumber');

        obfuscatedNumbers.forEach(function(element) {
            var fullNumber = element.textContent;
            var obfuscatedNumber = fullNumber.substring(0, 4) + '****' + fullNumber.substring(8);
            element.textContent = obfuscatedNumber;
        });
    });
    </script>
</body>
<footer>
    <?php include '../footer/footer.php' ?>
</footer>

</html>
<?php } ?>