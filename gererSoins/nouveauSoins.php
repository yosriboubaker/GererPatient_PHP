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
    <h3>AJOUTER SOINS </h3>
    <form style="text-align: center;display:flex;flex-direction: column;" action="ajoutSoins.php" method="POST">
        <table>
            <tr>
                <td><label for="codeS">code Soins:</label><br></td>
            </tr>
            <tr>
                <td><input style="width:344px;height: 40px;border: 2px solid #000;" type="text" id="codeS" name="codeS"
                        value=""><br></td>
            </tr>
            <tr>
                <td><label for="desig">designation :</label><br></td>
            </tr>
            <tr>
                <td><textarea style="width:344px;height: 40px;border: 2px solid #000;" id="desig" name="desig" rows="4"
                        cols="50" value="your designation here ?"></textarea>
                </td>
            </tr>

            <tr>
                <br>
                <td><input class="button-59" type="reset" value="Annuler"> <input class="button-59" type="submit"
                        value="Enregistrer"></td>
            </tr>

        </table>


    </form>


</body>

</html>
<?php } ?>