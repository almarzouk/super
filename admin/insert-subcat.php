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
		
		if (!isset($_POST['id_cat']))
		{
			header("location:insert-cat.php");
		}
			
		else
		{
		
		
		include('../inc/connection.php');
		// insertion de la nouvelle catégorie dans la bdd
					if(isset ($_POST['nom_subcat']))
					{
					$id_cat=$_POST['id_cat'];
					$nom_cat=$_POST['nom_cat'];
					$nom_subcat=$_POST['nom_subcat'];
					$nom_subcat = strtolower($nom_subcat);
					$query_check = $pdo->query("SELECT * FROM `sub_category` WHERE nom_subcategory='$nom_subcat'");
					$resultat_check = $query_check->fetchAll();
					$count = $query_check->rowCount();
					//si la sous-catégorie existe déja , je n'écris pas
						if ($count == 0)
						{
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$req = $pdo->prepare('INSERT INTO `sub_category` (`nom_subcategory`,`id_category`) VALUES (:nom_subcategory,:id_category)');
						$req->bindValue(':nom_subcategory', $nom_subcat, PDO::PARAM_STR);
						$req->bindValue(':id_category', $id_cat, PDO::PARAM_STR);
						$req->execute();	
						
						//une fois la nouvelle catégorie écrite en base, je crée le nouveau répertoire
						$dir="../assets/images/$nom_cat/".$nom_subcat;
							if( is_dir($dir) === false )
							{
							mkdir($dir);
							header("location:insert-cat.php");
							}
						
						}
					}
					
					
		include '../inc/header.php';
		include '../inc/navbar.php';
	
?>

<div class="container min-vh-100">
			<?= "<h4 class='mt-5'>Ajouter une sous-catégorie</h4>" ?>
			<div class="container mt-5 m-0 p-0">
			
			
					<?php
					
					
					$id_category=$_POST['id_cat'];	
					$query = $pdo->query("SELECT * FROM `category` WHERE id_category=$id_category ");
					$resultat = $query->fetchAll();
					//Afficher les résultats dans un tableau
					foreach ($resultat as $key => $variable) 
					{
						
						$id_cat=$resultat[$key]['id_category'];
						$nom_category=$resultat[$key]['nom_category'];
									
					}
					?>

				</table>

			</div>
			
			<div class="container mt-5 m-0 p-0">
			<p> Attention : la création d'une catégorie ou sous-catégorie <br/>provoque également la création d'un répertoire ou sous-répertoire dans le répertoire  <b><?php echo $url_standard."/" ?></b></p>
			<p>Pensez à sauvegarder vos contenus images dans un autre répertoire avant de procéder à la suppression d'une catégorie ou sous-catégorie.</p>
			<form action="insert-subcat.php" method="post">
			<label>Saisissez le nom d'une nouvelle sous-catégorie dans la catégorie <b><?php echo $nom_category ?></b> :</label>
			<input type="text" name="nom_subcat">
			<input type="hidden" name="id_cat" value="<?php echo $id_cat ?>">
			<input type="hidden" name="nom_cat" value="<?php echo $nom_category ?>">
			<input type="submit" value="Créer">
			</form>
			<br/>
			
			
			</div>
		
		
		</div>
		
		<?php
		} // fin isset id cat
		/**** AJOUTER UNE CATEGORIE ****/
		// saisie des données dans un formulaire 
		//ajouter une ligne catégorie dans la table category
		
		//ajouter un répertoire nouvelle_catégorie dans le répertoire image
		unset ($_POST['nom_cat']);
						unset ($nom_category);
		//Fermeture de la connexion 
		$pdo = null;

		include '../inc/footer.php';
	} //fermeture session admin

} //fermeture session 
?>
