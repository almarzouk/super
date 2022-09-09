<?php
session_start();


// ouverture de session
// si pas de session - retour a l'index 
if (!$_SESSION['nom_user']) {
	header('location: ../index.php');
}

// si session ok, je vois le contenu
else {
	if ($_SESSION['auth'] != 1) {
		header("location:../landing.php");
	} 
	else {
		
		include('../inc/connection.php');
		
		// insertion de la nouvelle catégorie dans la bdd
					if(isset ($_POST['nom_cat']))
					{
					$nom_cat=$_POST['nom_cat'];
					$nom_cat = strtolower($nom_cat);
					$query_check = $pdo->query("SELECT * FROM `category` WHERE nom_category='$nom_cat'");
					$resultat_check = $query_check->fetchAll();
					$count = $query_check->rowCount();
					// si la catégorie existe déja , je n'écris pas
						if ($count == 0)
						{
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$req = $pdo->prepare('INSERT INTO `category` (`nom_category`) VALUES (:category)');
						$req->bindValue(':category', $nom_cat, PDO::PARAM_STR);
						$req->execute();	
						
						// une fois la nouvelle catégorie écrite en base, je crée le nouveau répertoire
						$dir="../assets/images/".$nom_cat;
							if( is_dir($dir) === false )
							{
							mkdir($dir);
							
							}
						
						}
					}
					
		include '../inc/header.php';
		include '../inc/navbar.php';


		//je rajoute une condition
		// si je suis admin, je vois le contenu destiné à l'admin

		//Requete pour tester la connexion
		
?>

		<div class="container min-vh-100">
			<?= "<h4 class='mt-5'>Ajouter une catégorie</h4>" ?>
			<div class="container mt-5 m-0 p-0">
			<p> Attention : la création d'une catégorie ou sous-catégorie <br/>provoque également la création d'un répertoire ou sous-répertoire dans le répertoire  <b><?php echo $url_standard."/" ?></b></p>
			<p>Pensez à sauvegarder vos contenus images dans un autre répertoire avant de procéder à la suppression d'une catégorie ou sous-catégorie.</p>
			
				<table class="table table-dark table-striped">
					<th>ID catégorie</th>
					<th>Nom catégorie</th>
					<th> </th>
					<th> </th>
					
					<?php
					
					
					//Afficher les catégories				
					$query = $pdo->query("SELECT * FROM `category`");
					$resultat = $query->fetchAll();
					foreach ($resultat as $key => $variable) {
						$id_cat=$resultat[$key]['id_category'];
						// afficher les sous-catégories
						echo "<tr>";
						echo ("<td>" . $resultat[$key]['id_category'] . "</td>");
						echo ("<td>" . $resultat[$key]['nom_category'] . "</td>");
						$dir="../assets/images/".$resultat[$key]['nom_category'];
					
						// je vérifie que le répertoire catégorie existe avant de créer
						if( is_dir($dir) === false )
						{
						echo ("<td>Répertoire $dir <b style='color:red'>n'existe pas</b></td>");
						// mkdir($dir);
						}
						else
						{
						echo ("<td>Répertoire $dir <b style='color:green'>existe</b></td>");	
						}
						
						// echo "<td><a href='insert-subcat.php?id_cat=$id_cat'>Ajouter une sous-catégorie</a></td>";
						echo "<td><form action='insert-subcat.php' method='post'><input type='hidden' name='id_cat' value='$id_cat'><input type='submit' value='Ajouter une sous-catégorie'></form></td>";
						

						echo "</tr>";
						
						
						$query2 = $pdo->query("SELECT * FROM `sub_category` WHERE id_category=$id_cat");
						$resultat2 = $query2->fetchAll();
						foreach ($resultat2 as $key => $variable) 
						{
							echo "<tr>";
							$nom_subcategory=$resultat2[$key]['nom_subcategory'];
							echo "<td>  </td><td>$nom_subcategory</td><td></td>";
							// je vérifie que le répertoire catégorie existe avant de créer
						if( is_dir($dir) === false )
						{
						echo ("<td>Répertoire $dir <b style='color:red'>n'existe pas</b></td>");
						// mkdir($dir);
						}
						else
						{
						echo ("<td>Répertoire $dir <b style='color:green'>existe</b></td>");	
						}
							
							echo "</tr>";
						}
						
					}
					?>
					<form action="insert-cat.php" method="post">
					<tr><td><label>Saisissez le nom d'une nouvelle catégorie :</label></td>
					<td><input type="text" name="nom_cat"></td>
					<td><input type="submit" value="Créer"></td><td></td></tr>
					</form>
				</table>
				
			</div>
					
		</div>
		
		<?php
		/**** AJOUTER UNE CATEGORIE ****/
		// saisie des données dans un formulaire 
		//ajouter une ligne catégorie dans la table category
		
		//ajouter un répertoire nouvelle_catégorie dans le répertoire image
		unset ($_POST['nom_cat']);
		unset ($nom_cat);
		//Fermeture de la connexion 
		$pdo = null;

		include '../inc/footer.php';
	} //fermeture session admin

} //fermeture session 
?>
