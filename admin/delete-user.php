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
		echo "<h4>Supprimer un utilisateur</h4>";
		
        //je rajoute une condition
        // si je suis admin, je vois le contenu destiné à l'admin
            
        //Requete pour tester la connexion
        $query = $pdo->query("SELECT * FROM `users`");
        $resultat = $query->fetchAll();
	?>
	
<div class="container min-vh-100">
	<div class="container mt-5 border border-3 rounded">
		<table>
			<th>Nom</th><th>Prénom</th><th>Mail</th><th>Niveau</th><th>Type</th>

			<?php
			//Afficher les résultats dans un tableau
            foreach ($resultat as $key =>$variable)
				{
				   echo "<tr>";
				$id = $resultat[$key] ['id_user'];
                $nom = $resultat[$key] ['nom_user'];
                $prenom = $resultat[$key] ['prenom_user'];
                $adresse = $resultat[$key] ['adresse_user'];
                $mail = $resultat[$key] ['mail_user'];
                $pass = $resultat[$key] ['pass_user'];
                //$auth = $resultat[$key] ['auth_user'];
                //$type = $resultat[$key] ['type_user'];
                        // echo("<tr><b>Etes vous certain de vouloir effacer ces données?</b></br>");
                            //echo("<td>" .$resultat[$key]['id_user']. "</td>");                     
                            echo("<td>" .$resultat[$key]['nom_user']. "</td>");
                            echo("<td>" .$resultat[$key]['prenom_user']. "</td>");
                            echo("<td>" .$resultat[$key]['adresse_user']. "</td>");
                            echo("<td>" .$resultat[$key]['mail_user']. "</td>");
                            echo("<td>" .$resultat[$key]['pass_user']. "</td>");                                           
                            echo("<td><a href='delete-user-action.php?id_user=$id'>Supprimer</a></td>");
							echo "</tr>";
                }
						?>
	
		</table>

	</div>
</div>
<?php
        //Fermeture de la connexion 
        $pdo = null;

	}//fermeture session admin

	}//fermeture session 
?>