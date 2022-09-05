<?php
session_start(); 
include('../inc/connection.php');

// ouverture de session
// si pas de session - retour a l'index 
    if (!$_SESSION['nom_user'])
        {
        header('../index.php');	
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
     ?> 
<div class="container ">

<?php	 
          $id = $_GET['id_objet'];
        //echo $id;

        //Requete pour tester la connexion
            $query = $pdo->query("SELECT * FROM objets,category,sub_category WHERE id_objet=$id AND objets.id_category_objet=category.id_category AND sub_category.id_subcategory=objets.id_subcategory");
            $resultat = $query->fetchAll ();

		echo"<div id='bloc1'>";
        //Afficher les résultats dans un tableau
            foreach ($resultat as $key =>$variable)
                //$id = $resultat[$key]['id_objet'];
                $marque = $resultat[$key]['marque_objet'];
                $model = $resultat[$key]['model_objet'];
                $photo = $resultat[$key]['photo_objet'];
                $description = $resultat[$key]['description_objet'];
                $path = "../assets/images/";
                $nom = $resultat[$key]['nom_category'];
                $nomsub = $resultat[$key]['nom_subcategory'];
                
                    {
                    echo"<tr>";
                    echo"<p><b>Etes vous certain de vouloir effacer les données de cet objet dans la base ?</b></br></p>";                    
					echo"<td>$marque</td></br>";
                    echo"<td>$model</td><br>";
					echo"<td><img src='$path$nom/$nomsub/$photo.jpg'></td></br>"; 
                    echo"<td>" .$resultat[$key]['description_objet']. "</td><br>";
                    echo"<td><a href='delete-objet-action.php?id=$id'><input type='submit' name='delete' value='Delete' id='button'></a></td>";   
                    echo"</tr>";                
                    }
		echo "</div>";
        //Fermeture de la connexion 
        $pdo = null;
	} // fermeture de session admin
?>

</div>
<?php } // fermeture de session ?>

