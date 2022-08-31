<?php include './inc/header.php' ?>
<div class="container min-vh-100 text-center mt-5">
	<?php
	include "inc/connection.php";
	// La catégorie a été choisie, je peux choisir la sous-catégorie
	if (isset($_POST['recup_cat'])) {
		$category = $_POST['recup_cat'];

		// $requete="SELECT * FROM category,sub_category WHERE nom_category='$category' AND category.id_category=sub_category.id_category ";
		$requete = "SELECT * FROM sub_category,category WHERE nom_category='$category' AND category.id_category=sub_category.id_category";
		//requête pour tester la connexion
		$query = $pdo->query($requete);
		$resultat = $query->fetchAll();
		//afficher le résultat dans un tableau
		echo "<form action='landing.php' method='post'>";
		echo "<label  class ='mb-3'>Choisir une catégorie</label><br/>";
		echo "<div class='d-flex justify-content-center'>";
		echo "<select name='recup_subcat' class ='form-select me-4 w-50' aria-label='Default select example'>";
		foreach ($resultat as $key => $variable) {
			$subcategory = $resultat[$key]['id_subcategory'];
			$id_category = $resultat[$key]['id_category'];
			echo "<option>";
			echo $resultat[$key]['nom_subcategory'];
			echo "</option>";
		}
		echo "</select>";
		echo "<input type='hidden' name='recup_id_subcat' value='$subcategory'>";
		echo "<input type='hidden' name='recup_cat_sec' value='$category'>";
		echo "<input type='hidden' name='recup_id_cat_sec' value='$id_category'>";
		echo "<button type='submit' class='btn btn-dark'>Go</button>";
		echo "</div>";
		echo "</form>";
	}

	// La catégorie n'a pas été choisie,je choisis donc la catégorie
	else {
		echo "<form action='landing.php' method='post'>";
		$requete2 = "SELECT * FROM category";
		//requête pour tester la connexion
		$query2 = $pdo->query($requete2);
		$resultat2 = $query2->fetchAll();
		//afficher le résultat dans un tableau
		echo "<h1>Choisir une sous-catégorie</h1><br/>";
		echo "<div class='d-flex justify-content-center'>";
		echo "<select name='recup_cat' class ='form-select me-4 w-50' aria-label='Default select example'>";
		foreach ($resultat2 as $key2 => $variable2) {
			echo "<option>";
			echo $resultat2[$key2]['nom_category'];
			echo "</option>";
		}
		echo "</select>";
		echo "<button type='submit' class ='btn btn-dark'>Go</button>";
		echo "</div>";
		echo "</form>";
	}
	// la sous-catégorie est choisie, je peux afficher les éléments concernés
	if (isset($_POST['recup_id_subcat'])) {
		$id_subcat = $_POST['recup_id_subcat'];
		echo "<div class='d-flex justify-content-center'>";
		echo "<h5 class='me-3'>";
		echo "Dans la catégorie: ";
		echo "<p class = 'badge bg-warning text-dark rounded-pill'>";
		echo $_POST['recup_cat_sec'];
		echo "</p>";
		echo '</h5>';
		echo "<h5>";
		echo "Dans la sous-catégorie: ";
		echo "<p class = 'badge bg-info text-dark text-start rounded-pill'>";
		echo  $_POST['recup_subcat'];
		echo "</p>";
		echo '</h5>';
		echo "</div>";
		$requete3 = "SELECT * FROM objets,category,sub_category WHERE sub_category.id_subcategory=$id_subcat AND sub_category.id_subcategory=objets.id_subcategory AND category.id_category=objets.id_category_objet";
		//requête pour tester la connexion
		$query3 = $pdo->query($requete3);
		$resultat3 = $query3->fetchAll();
		//afficher le résultat dans un tableau
	?>
		<div class="container">
			<div class="row row-cols-4 justify-content-center">
				<?php
				foreach ($resultat3 as $key3 => $variable3) {
					$category_res = $resultat3[$key3]['nom_category'];
					$subcategory_res = $resultat3[$key3]['nom_subcategory'];
					$photo = $resultat3[$key3]['photo_objet'];
					$id_objet = $resultat3[$key3]['id_objet'];
					echo "<div class='col mb-3'>";
					echo "<div class='card ' style='width: 18rem;'>";
					echo "<img src='assets/images/$category_res/$subcategory_res/$photo.jpg' alt='$photo.jpg' class='img-fluid border-bottom border-dark'>";
					echo "<div class='card-body'>";
					echo "<h5 class='card-title'>";
					echo $resultat3[$key3]['model_objet'];
					echo "</h5>";
					echo "<a href='single.php?id_objet=$id_objet' class='btn btn-secondary mt-1 ms-2'>";
					echo "Voir la fiche";
					echo '</a>';
					echo "</div>";
					echo "</div>";
					echo "</div>";
				}
			} else {

				echo "<div class='d-flex justify-content-center'>";
				echo "<h5 class='me-3'>";
				echo "<p class = 'badge bg-warning text-dark rounded-pill'>";
				echo "</p>";
				echo '</h5>';
				echo "<h5>";
				echo "<p class = 'badge bg-info text-dark text-start rounded-pill'>";
				echo "</p>";
				echo '</h5>';
				echo "</div>";
				$requete4 = "SELECT * FROM objets,category,sub_category where objets.id_category_objet=category.id_category AND objets.id_subcategory=sub_category.id_subcategory;";
				//requête pour tester la connexion
				$query4 = $pdo->query($requete4);
				$resultat4 = $query4->fetchAll();
				//afficher le résultat dans un tableau
				?>
				<div class="container">
					<div class="row row-cols-auto justify-content-center">
					<?php
					foreach ($resultat4 as $key4 => $variable4) {
						$category_res = $resultat4[$key4]['nom_category'];
						$subcategory_res = $resultat4[$key4]['nom_subcategory'];
						$photo = $resultat4[$key4]['photo_objet'];
						$id_objet = $resultat4[$key4]['id_objet'];
						echo "<div class='col mb-3 new-div'>";
						echo "<div class='card ' style='width: 18rem;'>";
						echo "<img src='assets/images/$category_res/$subcategory_res/$photo.jpg' alt='$photo.jpg' class='img-fluid border-bottom border-dark'>";
						echo "<div class='card-body'>";
						echo "<h5 class='card-title'>";
						echo $resultat4[$key4]['model_objet'];
						echo "</h5>";
						echo "<a href='single.php?id_objet=$id_objet' class='btn btn-dark mt-1 ms-2'>";
						echo "Voir la fiche";
						echo '</a>';
						echo "</div>";
						echo "</div>";
						echo "</div>";
					}
				}
					?>
					</div>
				</div>
			</div>
			<?php include './inc/footer.php' ?>