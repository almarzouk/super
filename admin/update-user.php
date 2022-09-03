<?php
session_start(); 

// ouverture de session
// si pas de session - retour a l'index 
if (!$_SESSION['nom_user'])
{
header('location:../index.php');	
}

// si session ok, je vois le contenu
else
{
	include '../inc/header.php' ;
	include '../inc/navbar.php' ;
	
	//je rajoute une condition
	// si je suis admin, je vois le contenu destiné à l'admin
	

	if ($_SESSION['auth']!=1)
	{
	header("location:$url_standard/landing.php");	
	}
	else
	{
		echo "<h3>Module d'administration</h3>";
		echo "<h4>Modification des données utilisateur</h4>";
	

        ?>
<div class="container ">
    <form class="mb-5 w-50 p-5 m-auto">
        <h3>Update info</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">prénom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">adresse</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">mot de pass</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
</div>
<?php 
    }//Fermeture session admin
?>
<?php include '../inc/footer.php';

 }//Fermeture session 
 
 ?>