
<?php
include "inc/connection.php";


	// si je reviens de la page fiche , je réaffecte les valeurs de get dans post pour avoir la bonne base de variables post
	if (isset($_GET['recup_id_cat'])&& isset($_GET['recup_id_subcat']))
	{
		$_POST['recup_id_cat']=$_GET['recup_id_cat'];
		$_POST['recup_id_subcat']=$_GET['recup_id_subcat'];
		$requete0 ="SELECT * FROM category,sub_category WHERE category.id_category=2 AND sub_category.id_subcategory=6 AND category.id_category=sub_category.id_category";
		//requête pour tester la connexion
		$query0=$pdo->query($requete0);
		$resultat0=$query0->fetchAll();
			foreach($resultat0 as $key0 => $variable0)
			{
			$category_res=$resultat0[$key0]['nom_category'];
			$subcategory_res=$resultat0[$key0]['nom_subcategory'];
			
			$_POST['recup_cat_sec']=$category_res;
			$_POST['recup_subcat']=$subcategory_res;
						
			}
	}
	
		
		// La catégorie a été choisie, je peux choisir la sous-catégorie
		if (isset($_POST['recup_cat']))
		{
		$category=$_POST['recup_cat'];
		$requete="SELECT * FROM sub_category,category WHERE nom_category='$category' AND category.id_category=sub_category.id_category";
		//requête pour tester la connexion
		$query=$pdo->query($requete);
		$resultat=$query->fetchAll();
		//afficher le résultat dans un tableau
		echo "<form action='landing.php' method='post'>";
		echo "<label>Choisir une sous-catégorie</label><br/>";
		echo "<select name='recup_subcat'>";
			foreach($resultat as $key => $variable)
			{
			$subcategory=$resultat[$key]['id_subcategory'];
			$id_category=$resultat[$key]['id_category'];
			echo "<option>";
			echo $resultat[$key]['nom_subcategory'];
			echo "</option>";
			}
		echo "</select>";	
		echo "<input type='hidden' name='recup_id_subcat' value='$subcategory'>";
		echo "<input type='hidden' name='recup_cat_sec' value='$category'>";
		echo "<input type='hidden' name='recup_id_cat_sec' value='$id_category'>";
		echo "<button type='submit'>Go</button>";
		echo "</form>";	
		}

		// La catégorie n'a pas été choisie,je choisis donc la catégorie
		else 
		{
		echo "<form action='landing.php' method='post'>";	
		$requete2="SELECT * FROM category";
		//requête pour tester la connexion
		$query2=$pdo->query($requete2);
		$resultat2=$query2->fetchAll();
		//afficher le résultat dans un tableau
		echo "<label>Choisir une catégorie</label><br/>";
		echo "<select name='recup_cat'>";
			foreach($resultat2 as $key2 => $variable2)
			{
			$id_category=$resultat2[$key2]['id_category'];
			echo "<option>";
			echo $resultat2[$key2]['nom_category'];
			echo "</option>";
			}
		echo "</select>";	
		echo "<button type='submit'>Go</button>";
		echo "</form>";
		}
	
		echo "<br/>";
		
		// la sous-catégorie est choisie, je peux afficher les éléments concernés
		if (isset($_POST['recup_id_subcat']))
		{	

		$id_subcat=$_POST['recup_id_subcat'];
		echo "<br/>";
		echo "Dans la catégorie :".$_POST['recup_cat_sec'];
		echo "<br/>";
		echo "Dans la sous-catégorie :".$_POST['recup_subcat'];
		echo "<br/>";echo "<br/>";
		$requete3 ="SELECT * FROM objets,category,sub_category WHERE sub_category.id_subcategory=$id_subcat AND sub_category.id_subcategory=objets.id_subcategory AND category.id_category=objets.id_category_objet";
		//requête pour tester la connexion
		$query3=$pdo->query($requete3);
		$resultat3=$query3->fetchAll();
		//afficher le résultat dans un tableau

			foreach($resultat3 as $key3 => $variable3)
			{
			$category_res=$resultat3[$key3]['nom_category'];
			$subcategory_res=$resultat3[$key3]['nom_subcategory'];
			$id_objet=$resultat3[$key3]['id_objet'];
			$photo=$resultat3[$key3]['photo_objet'];
			echo $resultat3[$key3]['model_objet'];
			echo "<br/>";
			echo "<img src='assets/thumbs/$category_res/$subcategory_res/$photo.png' alt='$photo.png'";
			echo "<br/>";echo "<br/>";
			echo "<a href='single.php?id_objet=$id_objet'>Emprunter</a>";
			echo "<br />";
			echo "<br/>";
			echo "<br/>";
			}
	
		}
	
	
	
	?>
	

