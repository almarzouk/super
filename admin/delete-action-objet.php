<?php
session_start ();
    include('../inc/connection.php');

    $id = $_GET['id'];
    //echo $id;

    //Requete pour supprimer la donnée
        $data = ['id => $id'];
        $sql = "DELETE FROM objets WHERE id_objet= :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        if($statement->execute()) 
            {
                echo "Supression de la donnée correctement effectué!";
                header('Refresh: 3; ../landing.php');
            }
        
    //Fermeture de la connexion
    $pdo = null;
