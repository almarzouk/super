<?php
include "inc/connection.php";

// La catégorie a été choisie, je peux choisir la sous-catégorie
$id_objet=$_GET['id_objet'];

$requete ="SELECT * FROM objets,category,sub_category WHERE id_objet=$id_objet AND objets.id_category_objet=category.id_category AND objets.id_subcategory=sub_category.id_subcategory";
//requête pour tester la connexion
$query=$pdo->query($requete);
$resultat=$query->fetchAll();
//afficher le résultat dans un tableau

foreach($resultat as $key => $variable)
{
	$category_res=$resultat[$key]['nom_category'];
	$subcategory_res=$resultat[$key]['nom_subcategory'];
	$id_category=$resultat[$key]['id_category'];
	$id_subcategory=$resultat[$key]['id_subcategory'];
	$id_objet=$resultat[$key]['id_objet'];
	$modele=$resultat[$key]['model_objet'];
	$marque=$resultat[$key]['marque_objet'];
	$description=$resultat[$key]['description_objet'];
	$photo=$resultat[$key]['photo_objet'];
	
	echo "Catégorie :".$resultat[$key]['nom_category'];
	echo "<br>";
	echo "Sous-Catégorie :".$resultat[$key]['nom_subcategory'];
	echo "<br>";
	echo "Marque :".$resultat[$key]['marque_objet'];
	echo "<br>";
	echo "Modèle :".$resultat[$key]['model_objet'];
	echo "<br>";
	echo "Description :<p style='width:50%'>".$resultat[$key]['description_objet']."</p>";
	echo "<br/>";
	echo "<img src='assets/thumbs/$category_res/$subcategory_res/$photo.png' alt='$photo.png'>";
	echo "<br>";
	echo "<br>";
	echo "<a href='single.php?id_objet=$id_objet'>Confirmer l'emprunt</a>";
	echo "<br/>";
	echo "<br/>";
	echo "<a href='landing.php?recup_id_cat=$id_category&recup_id_subcat=$id_subcategory'>Revenir à la liste</a>";

}
	
	
	
	
	
	?>
	

