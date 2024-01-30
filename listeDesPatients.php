<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION["user_nom"] )) {
    header("Location: /projetExamenPatient/adminF/logAdmin.php");
    }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./adminF/admin.css">
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

<body style="text-align:center;">
    <?php include 'connexion.php'?>
    <?php include './adminF/navBarAdmin.php'?>
    <h3>bonjour <span style="color:#26eacd;"><?php echo($_SESSION["user_nom"]); ?></span></h3>
    <h3>Listes des Patients</h3>
    <table style="width:80%;margin:auto">
        <tr>
            <th>Code Patient</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Modifier</th>
            <th>Suprimer</th>
        </tr>

        <?php 
            $req = $db->query('SELECT * FROM gestionpatient.patients');
            while ($tuple = $req->fetch()) {
        ?>
        <tr>
            <td><?php echo $tuple['codeP'] ?></td>
            <td><?php echo $tuple['nomP'] ?></td>
            <td><?php echo $tuple['prenomP'] ?></td>
            <td><?php echo $tuple['numTel'] ?></td>
            <td>
                <button class="button-59">Modifier</button>
                <!-- The popup form -->
                <div class="popup">
                    <div class="popup-content">
                        <span class="close">&times;</span>
                        <!-- Your form content goes here -->
                        <form action="modifierPatient.php" method="POST">
                            <input type="hidden" name="codeP" value="<?php echo $tuple['codeP']?>">
                            <label for="fname">code Patient:</label><br>
                            <input type="text" id="codeP" name="newcodeP" value="<?php echo $tuple['codeP'] ?>"><br>
                            <label for="nom">Nom Patient:</label><br>
                            <input type="text" id="nomP" name="newnomP" value="<?php echo $tuple['nomP'] ?>"><br>
                            <label for="prenom">Prenom Patient:</label><br>
                            <input type="text" id="prenomP" name="newprenomP"
                                value="<?php echo $tuple['prenomP']?>"><br>
                            <label for="adresse">Numero De Patient:</label><br>
                            <input type="text" id="numP" name="newnumP" value="<?php echo $tuple['numTel'] ?>"><br>
                            <input type="reset" value="Annuler">
                            <input type="submit" value="Enregistrer">
                        </form>
                    </div>
                </div>
            </td>
            <td>
                <form action="deletePatient.php" method="POST">
                    <input type="hidden" name="codeP" value="<?php echo $tuple['codeP']?>">
                    <input class="btn-64R" type="submit" value="Supprimer">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get references to the buttons and popups
        var editBtns = document.querySelectorAll('.button-59');
        var popups = document.querySelectorAll('.popup');
        var closeBtns = document.querySelectorAll('.close');

        // Show the appropriate popup when an "Modifier" button is clicked
        editBtns.forEach(function(editBtn, index) {
            editBtn.addEventListener('click', function() {
                popups[index].style.display = 'block';
            });
        });

        // Close the popup when the close button is clicked
        closeBtns.forEach(function(closeBtn) {
            closeBtn.addEventListener('click', function() {
                closeBtn.closest('.popup').style.display = 'none';
            });
        });

        // Close the popup if the user clicks outside of it
        window.addEventListener('click', function(event) {
            popups.forEach(function(popup) {
                if (event.target == popup) {
                    popup.style.display = 'none';
                }
            });
        });
    });
    </script>
</body>

</html>
<?php } ?>