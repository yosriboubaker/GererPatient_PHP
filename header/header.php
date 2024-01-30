<html lang="en">

<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Navbar with Login Form in Dropdown</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-lg navbar-light" style="background: rgba(0, 255, 240, 0.52);">
        <a href="#" class="navbar-brand">Doctor<b>Yosri</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <a href="/projetExamenPatient/user/home.php" class="nav-item nav-link">Home</a>
                <a href="/projetExamenPatient/user/about.php" class="nav-item nav-link">About</a>
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">Services</a>
                    <div class="dropdown-menu">
                        <a href="../user/listedessoins.php" class="dropdown-item">Nos Soins</a>
                        <a href="../user/listedesseances.php" class="dropdown-item"> Nos Seances</a>
                        <a href="../user/listedepatients.php" class="dropdown-item">Nos Patients</a>
                    </div>
                </div>
                <a href="/projetExamenPatient/user/blog.php" class="nav-item nav-link">Blog</a>
                <a href="/projetExamenPatient/user/contact.php" class="nav-item nav-link">Contact</a>
            </div>

            <div class="navbar-nav action-buttons ml-auto">
                <?php
                    // Check if the user is logged in
                    if (isset($_SESSION["user_phone_number"])) {
                    // Display the logout button
                        echo '<a href="/projetExamenPatient/login/logOut.php" style="color:black" class="nav-item nav-link">Logout</a>';
                        }
                    ?>

            </div>
        </div>
    </nav>
    <script src="./style.js"></script>
    </body>

</html>