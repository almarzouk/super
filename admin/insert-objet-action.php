<?php
session_start(); 
// ouverture de session
// si pas de session - retour a l'index 
    if (!$_SESSION['nom_user'])
    {
    header('location:../index.php');	
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
		
		include '../inc/connection.php' ;
	
$marque=$_POST['marque'];
$modele=$_POST['modele'];
$photo=$_POST['photo'];
$descriptif=$_POST['descriptif'];
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$quantite=$_POST['quantite'];	
		
       
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $pdo->prepare('INSERT INTO `objets` (`marque_objet`, `model_objet`, `photo_objet`, `description_objet`,`id_category_objet`, `id_subcategory`,`quantite`)
                                      VALUES (:marque, :modele, :photo, :descriptif, :category, :subcategory, :quantite)');
$req->bindValue(':marque', $marque, PDO::PARAM_STR);
$req->bindValue(':modele', $modele, PDO::PARAM_STR);
$req->bindValue(':photo', $photo, PDO::PARAM_STR);
$req->bindValue(':descriptif', $descriptif, PDO::PARAM_STR);
$req->bindValue(':category', $category, PDO::PARAM_STR);
$req->bindValue(':subcategory', $subcategory, PDO::PARAM_STR);
$req->bindValue(':quantite', $quantite, PDO::PARAM_STR);

if ($req->execute()) {
    echo ("les données ont bien été enregistrées dans la base de données!");
    header('Refresh: 3; ../landing.php');
}

//Fermeture de la connexion
$pdo = null;

		} // fin session admin
		
	}// fin session
