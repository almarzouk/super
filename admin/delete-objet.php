<?php
session_start ();
include('../inc/connection.php');

        $id = $_GET['id'];
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
                        echo"<p><b>Etes vous certain de vouloir effacer ces données?</b></br></p>";
                            //echo"<td>" .$resultat[$key]['id_objet']. "</td></br>";                     
                            echo"<td>$marque</td></br>";
                            echo"<td>$model</td><br>";
                            echo"<td><img src='$path$nom/$nomsub/$photo.jpg'></td></br>"; 
                            echo"<td>" .$resultat[$key]['description_objet']. "</td><br>";
                           
                                               
                            echo"<td><a href='delete-action-objet.php?id=$id'><input type='submit' name='delete' value='Delete' id='button'></a></td>";   
                        echo"</tr>";                
                    }
    echo"</div>";
        //Fermeture de la connexion 
        $pdo = null;
?>

<link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <style>
body{
background-color:whitesmoke ;
text-align: center;

}
#bloc1{
    border:5px solid black;
    position:absolute;
    top:25%;
    left:40%; 
    width:300px;
    padding:45px;
   

}
         img{
            width:200px;
            height:200px;
            border: 2px solid white;
            border-radius: 20px;
            }



    </style>