<?php
//création du dsn, Data Source Name
$hote = 'localhost';
$db = 'emprunts';
$port = '3306';
$charset = 'utf8';
$user = 'root';
$password = '';

$dsn = "mysql:$hote=localhost;dbname=$db;port=$port;charset=$charset";

//$dsn='mysql:host=localhost;dbname=stagiaires;port=3306;charset=utf8';

// création et test de la connexion
try {
	$pdo = new PDO($dsn, "$user", "$password");
} catch (PDOException $exception) 
{
	// créer la bdd avec import des tables
	echo "<h3><a href='admin/checkbdd.php'>Créer la Bdd et les tables du projet dans MySQL</a></h3>";
	// on peut par exemple envoyer un mail mail('monmail@detest','PDOException' $exception -> getMessage());
	exit('Erreur de connexion à la base de données');
}
