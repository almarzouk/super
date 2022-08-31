<?php include './inc/header.php' ?>

<?php	include "inc/connection.php";

// affiche tous les emprunts en cours
// peut afficher les emprunts terminés
// peut terminer un emprunt mais pas supprimer de ligne d'emprunt, cela sert d'historique permanent
if (isset ($_GET['option_page'])){$option_page=$_GET['option_page'];}else{$option_page=0;}

if ($option_page==0)
{
	echo "<h3>Historique</h3>";
	
}

else
{
	echo "<h3>Emprunts en cours</h3>";
}	
// $requete="SELECT * FROM category,sub_category WHERE nom_category='$category' AND category.id_category=sub_category.id_category ";
		$requete = "SELECT * FROM emprunts,users,objets,category,sub_category WHERE emprunts.encours=$option_page AND emprunts.id_emprunteur=users.id_user AND emprunts.id_objet=objets.id_objet AND objets.id_category_objet=category.id_category AND objets.id_subcategory=sub_category.id_subcategory";
		//requête pour tester la connexion
		$query = $pdo->query($requete);
		$resultat = $query->fetchAll();
		//afficher le résultat dans un tableau
		
		foreach ($resultat as $key => $variable) 
		{
			
			echo "<div style='border:1px solid black'>";
			$id_emprunt=$resultat[$key]['id_emprunt'];
			$nom_objet=$resultat[$key]['model_objet'];
			$marque_objet=$resultat[$key]['marque_objet'];
			$categorie=$resultat[$key]['nom_category'];
			$subcategorie=$resultat[$key]['nom_subcategory'];
			$photo=$resultat[$key]['photo_objet'];
			$nom_user=$resultat[$key]['nom_user'];
			$mail_user=$resultat[$key]['mail_user'];
			$date_emprunt=$resultat[$key]['date_emprunt'];
			$date_restitution=$resultat[$key]['date_restitution'];
			
			//calcul nombre jours restants
			$date_now=date("Y-m-d  h:m:s"); 	
			$d1 = new DateTime("$date_now");
			$d2 = new DateTime("$date_restitution 12:00:00");
			$diff = $d1->diff($d2);
			$nb_jours = $diff->d;
			$retard=$diff->invert;
			//print_r($diff);
			
			// $duree_depassement=$resultat[$key]['model_objet']; // si depassement
			
			echo "Nom Objet: $nom_objet";
			echo "<br/>";
			echo "Marque : $marque_objet";
			echo "<br/>";
			echo "Catégorie $categorie";
			echo "<br/>";
			echo "Sous-catégorie $subcategorie";
			echo "<br/>";
			// echo "<img src='assets/thumbs/$categorie/$subcategorie/$photo.png'>";
			
			echo "Emprunté par $nom_user";
			echo "<br/>";
			echo "Mail emprunteur $mail_user";
			echo "<br/>";
			echo "Date d'emprunt : $date_emprunt";
			echo "<br/>";
			echo "Date de restitution :$date_restitution";
			echo "<br/>";
			
			
			
			if ($retard>0)
			{
				echo "<p style='color:red'>Retard de $nb_jours jours</p>";
				echo "<a href='admin/mail-alerte.php?mail-user=$mail_user&nom_objet=$nom_objet&date_restit=$date_restitution'>Relancer emprunteur (non fonctionnel)</a> ";}
			else
			{
				echo "<p style='color:green'>Il reste $nb_jours jours</p>";	
			}
			
			// formulaire pour emprunter avec variable de confirmation
	echo "<form method='post' action='admin/delete-emprunt.php'>";
	echo "<input type='hidden' name='id_emprunt' value='$id_emprunt'>";
	echo "<br/>";
	echo "<label>Confirmer Annulation ? <br /> (aucune suppression en BDD - emprunt passe en historique) </label>";
	echo "<br/>";
	echo "(Cocher pour confirmer) <input type='checkbox' name='confirm_annulation'>";
	echo "<br/>";
	echo "<br/>";
	echo "<button type='submit' >Annuler l'emprunt</button>";
	echo "</form>";
	echo "<br/>";
	
			
			
			
			
			
			echo "</div>";
			}
		
		
		

?>