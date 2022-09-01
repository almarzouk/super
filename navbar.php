<?php 
$rep_default="/super-main%20(3)/super-main/";
$url_standard="http://".$_SERVER['HTTP_HOST'].$rep_default;
 echo $url_standard;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Super</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- condition-->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="landing.php">Liste des objets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?php echo $url_standard?>emprunts.php?option_page=0">Historique des emprunts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>emprunts.php?option_page=1">les emprunts en cours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>admin/insert-objet.php">insert objet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>admin/insert-user.php">insert user</a>
                </li>
				   <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>admin/update-objet.php">update objet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>admin/update-user.php">update user</a>
                </li>
				   <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>admin/delete-objet.php">delete objet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $url_standard ?>admin/delete-user.php">delete user</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
