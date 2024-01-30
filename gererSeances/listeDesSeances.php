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
    <link rel="stylesheet" href="./seance.css">
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
    <?php include '../connexion.php'?>
    <?php include '../adminF/navBarAdmin.php'?>
    <h3 style="text-align:left">bonjour <span style="color:#26eacd;"><?php echo($_SESSION["user_nom"]); ?></span></h3>
    <h3>Listes des Seances</h3><br>
    <table style="width:80%;margin:auto">
        <tr>
            <th>Code Patient</th>
            <th>code soins</th>
            <th>date Soins</th>
            <th>Modifier</th>
            <th>Suprimer</th>
        </tr>
        <?php 
            $req = $db->query('SELECT * FROM gestionpatient.seances');
            while ($tuple = $req->fetch()) {
        ?>
        <tr>
            <td><?php echo $tuple['codeP'] ?></td>
            <td><?php echo $tuple['codeSoin'] ?></td>
            <td><?php echo $tuple['dateSoin'] ?></td>
            <td>
                <button class="button-59">Modifier</button>
                <!-- The popup form -->
                <div class="popup">
                    <div class="popup-content">
                        <span class="close">&times;</span>
                        <!-- Your form content goes here -->
                        <form action="modifierSeance.php" method="POST">
                            <input type="hidden" name="codeP" value="<?php echo $tuple['codeP']?>">
                            <input type="hidden" name="codeSoin" value="<?php echo $tuple['codeSoin']?>">
                            <label for="nom">code Soins:</label><br>
                            <input type="text" id="codeSoin" name="newcodeS"
                                value="<?php echo $tuple['codeSoin'] ?>"><br>
                            <label for="dateS">date soins:</label><br>
                            <label for="dateSoin">Date :</label> <br>
                            <input type="date" id="dateS" name="newdateS" value="<?php echo $tuple['dateSoin']?>"><br>
                            <input type="reset" value="Annuler">
                            <input type="submit" value="Modifier">
                        </form>
                    </div>
                </div>
            </td>
            <td>
                <form action="deleteSeance.php" method="POST">
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