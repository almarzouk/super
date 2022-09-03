<?php
session_start(); 
include('../inc/connection.php');

// ouverture de session
// si pas de session - retour a l'index 
    if (!$_SESSION['nom_user'])
    {
    header('location: ../index.php');	
    }

    // si session ok, je vois le contenu
    else
    {
		if ($_SESSION['auth']!=1)
		{
		header("location:../landing.php");	
		}
		else
		{
        include '../inc/header.php' ;
		include '../inc/navbar.php' ;
		
		echo "<h3>Module d'administration</h3>";
		echo "<h4>Supprimer un objet</h4>";
		
        //je rajoute une condition
        // si je suis admin, je vois le contenu destiné à l'admin
            
        //Requete pour tester la connexion
        $query = $pdo->query("SELECT * FROM `objets`");
        $resultat = $query->fetchAll();
	?>
	
<div class="container min-vh-100">
	<div class="container mt-5 border border-3 rounded">
		<table>
			<th>ID Objet</th><th>Marque</th><th>Modèle</th><th>ID CAT</th><th>ID SUBCAT</th>

			<?php
			//Afficher les résultats dans un tableau
            foreach ($resultat as $key =>$variable)
				{
				   echo "<tr>";
				$id = $resultat[$key] ['id_objet'];
                
                
                                   
                            echo("<td>" .$resultat[$key]['id_objet']. "</td>");
                            echo("<td>" .$resultat[$key]['marque_objet']. "</td>");
                            echo("<td>" .$resultat[$key]['model_objet']. "</td>");
                            echo("<td>" .$resultat[$key]['id_category_objet']. "</td>");
                            echo("<td>" .$resultat[$key]['id_subcategory']. "</td>");                                           
                            echo("<td><a href='delete-objet-verif.php?id_objet=$id'>Supprimer</a></td>");
							echo "</tr>";
                }
						?>
	
		</table>

	</div>
</div>
<?php
        //Fermeture de la connexion 
        $pdo = null;
		
include '../inc/footer.php' ;

	}//fermeture session admin

	}//fermeture session 
?>