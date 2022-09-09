<?php
include '../inc/header.php';
session_start();
// ouverture de session
// si pas de session - retour a l'index 
if (!$_SESSION['nom_user']) {
	header('location:../index.php');
}

// si session ok, je vois le contenu
else {
	if ($_SESSION['auth'] != 1) {
		header("location:../landing.php");
	} else {

		include '../inc/connection.php';
		include '../inc/functions.php';
		require "../inc/thumbimage.class.php";


		/*** écriture des données en base ***/
		$filename = $_FILES['upload']['name'];
		$filetype = $_FILES['upload']['type'];
		$filesize = $_FILES['upload']['size'];
		$marque = $_POST['marque'];
		$modele = $_POST['modele'];
		$descriptif = $_POST['descriptif'];
		$category = $_POST['category'];
		$subcategory = $_POST['subcategory'];
		$quantite = $_POST['quantite'];


		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$req = $pdo->prepare('INSERT INTO `objets` (`marque_objet`, `model_objet`, `photo_objet`, `description_objet`,`id_category_objet`, `id_subcategory`,`quantite`) VALUES (:marque, :modele, :photo, :descriptif, :category, :subcategory, :quantite)');
		$req->bindValue(':marque', $marque, PDO::PARAM_STR);
		$req->bindValue(':modele', $modele, PDO::PARAM_STR);
		$req->bindValue(':photo', $modele, PDO::PARAM_STR);
		$req->bindValue(':descriptif', $descriptif, PDO::PARAM_STR);
		$req->bindValue(':category', $category, PDO::PARAM_STR);
		$req->bindValue(':subcategory', $subcategory, PDO::PARAM_STR);
		$req->bindValue(':quantite', $quantite, PDO::PARAM_STR);

		if ($req->execute()) {
			echo "<div class='alert alert-success text-center' role='alert'>";
			echo ("les données ont bien été enregistrées dans la base de données!");
			echo "</div>";

			/*** écriture du fichier uploadé***/

			/** récupération des données de catégorie/sous catégorie pour écrire le chemin**/

			//Requete pour tester la connexion
			$query = $pdo->query("SELECT * FROM category,sub_category WHERE sub_category.id_subcategory=$subcategory AND category.id_category=sub_category.id_category ");
			$resultat = $query->fetchAll();
			//Afficher les résultats dans un tableau
			foreach ($resultat as $key => $variable) {
				$rep_category = $resultat[$key]['nom_category'];
				$rep_subcategory = $resultat[$key]['nom_subcategory'];
			}
			$rep_photos = "../assets/images/";
			$rep_thumbs = "../assets/thumbs/";
			$separateur = "/";

			$chemin = $rep_photos . $rep_category . $separateur . $rep_subcategory . $separateur;
			$chemin_thumbs = $rep_thumbs . $rep_category . $separateur . $rep_subcategory . $separateur;

			// penser à ajouter une thumb dans le répertoire thumb

			if (isset($_FILES['upload']) && $_FILES['upload']['error'] == 0) {
				$format = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");


				// vérifie l'extension fichier
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if (!array_key_exists($ext, $format)) die("Erreur:Veuillez sélectionner un format de fichier valide."); {
					// vérifie la taille du fichier - 5mo max
					$maxsize = 5 * 1024 * 1024;
					if ($filesize > $maxsize) die("Erreur:La taille du fichier est supérieur à celle autorisée (5Mo).");

					// Vérifie le type MIME du fichier
					if (in_array($filetype, $format)) {
						// vérifie si le fichier existe 
						if (file_exists($chemin . $_FILES['upload']['name'])) {
							echo "<div class='alert alert-danger text-center' role='alert'>";

							echo $_FILES['upload']['name'] . " existe déja.";
							echo "</div>";
						} 
						else 
						{
							
							
							$file_dirname = $chemin.$modele;
							
							
							if ($filetype=='image/jpg' OR $filetype=='image/jpeg')
							{
							$file_dirname=$file_dirname.".jpg";							
							move_uploaded_file($_FILES['upload']['tmp_name'], $file_dirname);
							$file_thumb= $chemin_thumbs.$modele.".jpg";
							
							$objThumbImage = new ThumbImage($file_dirname);
							$objThumbImage->createThumbjpg($file_thumb, 200);
							}
							if ($filetype=='image/png')
							{
							$file_dirname=$file_dirname.".png";	
							move_uploaded_file($_FILES['upload']['tmp_name'], $file_dirname);
							$file_thumb= $chemin_thumbs.$modele.".png";						
							$objThumbImage = new ThumbImage($file_dirname);
							$objThumbImage->createThumbpng($file_thumb, 200);
							}
							
							echo "<div class='alert alert-success text-center' role='alert'>";
							echo "Votre fichier a été téléchargé avec succès";
							echo "</div>";
							
							
						}
					} else {
						echo "<div class='alert alert-success text-center' role='alert'>";
						echo "Erreur, Il y a eu un problème de téléchargement de votre fichier, veuillez réessayer.";
						echo "</div>";
					}
				}
			} else {
				echo "<div class='alert alert-danger text-center' role='alert'>";
				echo "Error:" . $_FILES['upload']['error'];
				echo "<br/>";
				echo "Attention, peut-être taille fichier"; /// erreur
				echo "</div>";
			}




			header('Refresh: 3; ../landing.php');
		}

		// Fermeture de la connexion
		$pdo = null;
	} // fin session admin

}// fin session