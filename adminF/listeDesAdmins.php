<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION["user_nom"])) {
    header("Location: /projetExamenPatient/adminF/logAdmin.php");
} else {
    include '../connexion.php';

    // Check if the search form is submitted
    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];

        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM gestionpatient.admins WHERE nomAdmin LIKE :searchTerm OR prenomAdmin LIKE :searchTerm";

        // Prepare the query
        $stmt = $db->prepare($query);

        // Bind parameters
        $searchPattern = "%$searchTerm%";
        $stmt->bindParam(':searchTerm', $searchPattern, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();
    } else {
        // Default query without search
        $query = "SELECT * FROM gestionpatient.admins";
        $stmt = $db->query($query);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./admin.css">
</head>

<body>
    <?php include './navBarAdmin.php' ?>
    <h4 style="text-align: left;margin-left: 15px;">bonjour <b><span
                style="color:#26eacd;"><?php echo ($_SESSION["user_nom"]); ?></span></b></h4>

    <ul class="nav navbar-nav">
        <li>
            <form action="" method="GET" class="navbar-form">
                <div class="form-group">
                    <div class="input-group">
                        <input type="search" name="search" id="search" placeholder="Search Admin" class="form-control">
                        <br><br><input type="submit" value="Search">
                    </div>
                </div>
            </form>
        </li>
    </ul><br><br><br><br>

    <h3 style="text-align:center;">Liste des Admins</h3><br>
    <table style="width:80%;margin:auto">
        <tr>
            <th>Nom admin</th>
            <th>Prenom admin</th>
            <th>Mot de passe admin</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>

        <?php
        while ($tuple = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $tuple['nomAdmin'] ?></td>
            <td><?php echo $tuple['prenomAdmin'] ?></td>
            <td><?php echo $tuple['motDePasseAdmin'] ?></td>
            <td>
                <button class="button-59">Modifier</button>
                <!-- The popup form -->
                <div class="popup">
                    <div class="popup-content">
                        <span class="close">&times;</span>
                        <!-- Your form content goes here -->
                        <form action="modifierAdmin.php" method="POST">
                            <input type="hidden" name="nomAdmin" value="<?php echo $tuple['nomAdmin'] ?>">
                            <label for="fname">Nom admin</label><br>
                            <input type="text" id="newNomAdmin" name="newNomAdmin"
                                value="<?php echo $tuple['nomAdmin'] ?>"><br>
                            <label for="nom">Prenom admin:</label><br>
                            <input type="text" id="newPrenomAdmin" name="newPrenomAdmin"
                                value="<?php echo $tuple['prenomAdmin'] ?>"><br>
                            <label for="prenom">mot de passe :</label><br>
                            <input type="text" id="motDePasseAdmin" name="newmotDePasseAdmin"
                                value="<?php echo $tuple['motDePasseAdmin'] ?>"><br>
                            <input type="reset" value="Annuler">
                            <input type="submit" value="Enregistrer">
                        </form>
                    </div>
                </div>
            </td>
            <td>
                <form action="deleteAdmin.php" method="POST">
                    <input type="hidden" name="nomAdmin" value="<?php echo $tuple['nomAdmin'] ?>">
                    <input class="btn-64R" type="submit" value="Supprimer">
                </form>
            </td>
        </tr>
        <?php
        }

        // Close the cursor
        $stmt->closeCursor();
        ?>
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