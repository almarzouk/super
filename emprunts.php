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
			$date_retour_reel=$resultat[$key]['date_retour_reel'];
			$encours=$resultat[$key]['encours'];
			//calcul nombre jours restants
			$date_now=date("Y-m-d  h:m:s"); 	
			$d1 = new DateTime("$date_now");
			$d2 = new DateTime("$date_restitution 12:00:00");
			$diff = $d1->diff($d2);
			$nb_jours = $diff->d;
			$retard=$diff->invert;
			
			// changement du format des dates pour affichage
			$date_emprunt = new DateTime($date_emprunt);
			$date_emprunt=$date_emprunt->format('d-m-Y ');
			
			$date_restitution = new DateTime($date_restitution);
			$date_restitution=$date_restitution->format('d-m-Y ');
						
			$date_retour_reel = new DateTime($date_retour_reel);
			$date_retour_reel=$date_retour_reel->format('d-m-Y ');
			//print_r($diff);
			
			// $duree_depassement=$resultat[$key]['model_objet']; // si depassement
			
			echo "Nom Objet: <b>$nom_objet</b>";
			echo "<br/>";
			echo "Marque : <b>$marque_objet</b>";
			echo "<br/>";
			echo "Catégorie <b>$categorie</b>";
			echo "<br/>";
			echo "Sous-catégorie<b> $subcategorie</b>";
			echo "<br/>";
			// echo "<img src='assets/thumbs/$categorie/$subcategorie/$photo.png'>";
			
			echo "Emprunté par : <b>$nom_user</b>";
			echo "<br/>";
			echo "Mail emprunteur :<b> $mail_user</b>";
			echo "<br/>";
			echo "Date d'emprunt : <b>$date_emprunt</b>";
			echo "<br/>";
			echo "Date de restitution prévue : <b>$date_restitution</b>";
			echo "<br/>";
			echo "Rendu le : <b>$date_retour_reel</b>";
			echo "<br/>";
			
	if ($encours==1)
	{		
			
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
	
			
	}		
			
			
			
			echo "</div>";
			}
		
		
		

?>