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


    .btn-64R {
        align-items: center;
        background-color: #fff;
        border: 2px solid #000;
        box-sizing: border-box;
        color: #000;
        cursor: pointer;
        display: inline-flex;
        fill: #000;
        font-family: Inter, sans-serif;
        font-size: 16px;
        font-weight: 500;
        height: 30px;
        justify-content: center;
        letter-spacing: -0.8px;
        line-height: 24px;
        min-width: 140px;
        outline: 0;
        padding: 0 17px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .btn-64R:focus {
        color: #171e29;
    }

    .btn-64R:hover {
        border-color: red;
        color: red;
        fill: red;
    }

    .btn-64R:active {
        border-color: #06f;
        color: #06f;
        fill: #06f;
    }

    @media (min-width: 768px) {
        .btn-64R {
            min-width: 170px;
        }
    }


    .button-59 {
        align-items: center;
        background-color: #fff;
        border: 2px solid #000;
        box-sizing: border-box;
        color: #000;
        cursor: pointer;
        display: inline-flex;
        fill: #000;
        font-family: Inter, sans-serif;
        font-size: 16px;
        font-weight: 500;
        height: 30px;
        justify-content: center;
        letter-spacing: -0.8px;
        line-height: 24px;
        min-width: 140px;
        outline: 0;
        padding: 0 17px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-59:focus {
        color: #171e29;
    }

    .button-59:hover {
        border-color: #26eacd;
        color: #26eacd;
        fill: #26eacd;
    }

    .button-59:active {
        border-color: #06f;
        color: #06f;
        fill: #06f;
    }

    @media (min-width: 768px) {
        .button-59 {
            min-width: 170px;
        }
    }
    </style>
</head>

<body style="text-align:center;">
    <?php include '../connexion.php'?>
    <?php include '../adminF/navBarAdmin.php'?>
    <h3 style="text-align:left">bonjour <span style="color:#26eacd;"><?php echo($_SESSION["user_nom"]); ?></span></h3>
    <h3>Listes des Soins</h3><br>
    <table style="width:80%;margin:auto">
        <tr>
            <th>Code Soins</th>
            <th>Designation</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php include '../connexion.php'?>
        <?php 
            $req = $db->query('SELECT * FROM gestionpatient.soins');
            while ($tuple = $req->fetch()) {
        ?>
        <tr>
            <td><?php echo $tuple['codeSoin'] ?></td>
            <td><?php echo $tuple['designation'] ?></td>
            <td>
                <button class="button-59">Modifier</button>
                <!-- The popup form -->
                <div class="popup">
                    <div class="popup-content">
                        <span class="close">&times;</span>
                        <!-- Your form content goes here -->
                        <form action="modifierSoins.php" method="POST">
                            <input type="hidden" name="codeSoin" value="<?php echo $tuple['codeSoin']?>">
                            <label for="codeS">code Soins:</label><br>
                            <input type="text" id="newcodeS" name="newcodeS"
                                value="<?php echo $tuple['codeSoin'] ?>"><br>
                            <label for="desig">Designation Soins:</label><br>
                            <textarea id="newdesig" name="newdesig" rows="4" cols="50"
                                value="<?php echo $tuple['designation'] ?>"></textarea>
                            <input type="reset" value="Annuler">
                            <input type="submit" value="Enregistrer">
                        </form>
                    </div>
                </div>
            </td>
            <td>
                <form action="deleteSoins.php" method="POST">
                    <input type="hidden" name="codeSoin" value="<?php echo $tuple['codeSoin']?>">
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