<?php

include 'functions.php';

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $url_standard ?>/index.php">Super</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- condition-->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">


                <?php

                if ((isset($_SESSION['auth']) && $_SESSION['auth'] == 0)) {
                ?>


                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo $url_standard; ?>/landing.php">Liste des objets</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo $url_standard; ?>/emprunts.php?option_page=0">Historique des emprunts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard; ?>/emprunts.php?option_page=1">les emprunts en cours</a>
                    </li>

                <?php
                }


                // liens administrateur 

                if (isset($_SESSION['auth']) && ($_SESSION['auth'] == 1)) {
                ?>

					<li class="nav-item">
                        <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>/landing.php">Dashboard </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>/admin/insert-objet.php">Ajouter un objet </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>/admin/insert-user.php">Ajouter un utilisateur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>/admin/update-objet.php">update objet<br />(id nécessaire)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>/admin/update-user.php">update user<br />(id nécessaire)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>/admin/delete-objet.php">Supprimer un objet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>/admin/delete-user.php">Supprimer un utilisateur</a>
                    </li>

                <?php
                }

                ?>
            </ul>
        </div>
    </div>


    <div style="color:white;font-weight:bolder">
        <?php

        //affichage des données de session dans un encart dédié
        if (isset($_SESSION['nom_user'])) {
            echo $_SESSION['nom_user'] . " connecté<br />";
            echo "<a href='$url_standard/inc/session_deconnect.php'>Se déconnecter</a>";
        } else {
            echo "non connecté";
        }
        ?>
    </div>
</nav>