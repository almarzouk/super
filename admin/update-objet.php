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
	//je rajoute une condition
	// si je suis admin, je vois le contenu destiné à l'admin
	
		if ($_SESSION['auth']!=1)
		{
		header("location:$url_standard/landing.php");	
		}
		else
		{
		include '../inc/header.php' ;
		include '../inc/navbar.php' ;
		
		echo "<h3>Module d'administration</h3>";
		echo "<h4>Modification des données d'objet</h4>";

        ?>
		
		<div class="container ">
			<form class="mb-5 w-50 p-5 m-auto">
			<h3>Update objet</h3>
				<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Marque</label>
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Modèle</label>
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Descriptif</label>
				<textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
				</div>
				<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">photo</label>
				<input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Category</label>
				<select class="form-select mb-4" aria-label="Default select example">
					<option selected>Open this select menu</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				</select>
				</div>
			<button type="submit" class="btn btn-dark">Update</button>
			</form>
		</div>
	<?php

		}//Fin fermeture session admin
		
		
		include '../inc/footer.php';
		
	}//fermeture session
    ?>
    

