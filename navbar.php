<?php echo $_SERVER['PHP_SELF'] ;
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/landing.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/emprunts.php'){$pref='';}

if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/delete-action-objet.php'){$pref='../';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/delete-emprunt.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/delete-objet.php'){$pref='../';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/delete-user-action.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/delete-user.php'){$pref='../';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/insert-action-objet.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/insert-objet.php'){$pref='../';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/insert-emprunt.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/insert-objet.php'){$pref='../';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/insert-user.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/insert-user-action.php'){$pref='../';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/insert-user.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/mail-alerte.php'){$pref='../';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/new-user-action.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/new-user.php'){$pref='../';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/update-action-objet.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/update-objet.php'){$pref='../';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/update-user-action.php'){$pref='';}
if ($_SERVER['PHP_SELF']=='/super-main (2)/super-main/admin/update-user.php'){$pref='';}


echo "<br />";

function lister_fichiers($rep)  
{  
	if(is_dir($rep))  
	{  
		if($iteration = opendir($rep))  
		{  
			while(($fichier = readdir($iteration)) !== false)  
			{  
				if($fichier != "." && $fichier != ".." && $fichier != "Thumbs.db")  
				{  
					echo '<a href="'.$rep.$fichier.'" target="_blank" >'.$rep.$fichier.'</a><br />'."\n";  
				} 
				
				if($rep=='admin'){echo "okkkkkkkkkkkkkk";}
				
			}  
			closedir($iteration);  
		}  
	}  
} 

lister_fichiers("./");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="http://localhost/super-1/index.php">Super</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- condition-->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?php echo $pref ?>landing.php">Liste des objets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?php echo $pref ?>emprunts.php?option_page=0">Historique des emprunts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $pref ?>emprunts.php?option_page=1">les emprunts en cours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $pref ?>admin/insert-objet.php">insert objet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $pref ?>admin/insert-user.php">insert user</a>
                </li>
				   <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $pref ?>admin/update-objet.php">update objet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $pref ?>admin/update-user.php">update user</a>
                </li>
				   <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $pref ?>admin/delete-objet.php">delete objet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  me-4" aria-current="page" href="<?php echo $pref ?>admin/delete-user.php">delete user</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
