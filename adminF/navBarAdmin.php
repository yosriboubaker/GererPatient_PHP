<body translate="no" data-new-gr-c-s-check-loaded="14.1152.0" data-gr-ext-installed="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span
                                class="icon-bar"></span><span class="icon-bar"></span><span
                                class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand" style="color:#26eacd;">Doctor<b>Yosri</b></a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerer Patients<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/projetExamenPatient/nouveauPatient.php">Ajouter Patient</a></li>
                                    <li><a href="/projetExamenPatient/listeDesPatients.php">Liste Des Patients</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerer Soins<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/projetExamenPatient/gererSoins/ajoutSoins.php">Ajouter soins </a></li>
                                    <li><a href="/projetExamenPatient/gererSoins/listeDesSoins.php">Liste des soins</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerer Seances<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/projetExamenPatient/gererSeances/nouveauSeance.php">ajouter seance</a>
                                    </li>
                                    <li><a href="/projetExamenPatient/gererSeances/listeDesSeances.php">liste des
                                            seances</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerer Admins<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/projetExamenPatient/adminF/ajoutAdmin.php">ajouter admin</a></li>
                                    <li><a href="/projetExamenPatient/adminF/listeDesAdmins.php">liste des admins</a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                    // Check if the user is logged in
                    if (isset($_SESSION["user_nom"])) {
                    // Display the logout button
                        echo '<li><a  style="color:#26eacd;margin-left: 660px;" href="/projetExamenPatient/adminF/logOutAdmin.php">LogOut</a></li>';
                        }
                    ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>






</body>