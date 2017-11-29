<?php 
	include_once("connexionBDD.php");
	$membres="CREATE TABLE `membres` (
		  `id` int(10) UNSIGNED NOT NULL,
		  `pseudo` varchar(255) NOT NULL,
		  `pass` varchar(255) NOT NULL,
		  `nom` varchar(255) DEFAULT NULL,
		  `prenom` varchar(255) DEFAULT NULL,
		  `sexe` varchar(1) DEFAULT NULL,
		  `email` varchar(255) DEFAULT NULL,
		  `date_naissance` date DEFAULT NULL,
		  `adresse` varchar(255) DEFAULT NULL,
		  `cp` int(11) DEFAULT NULL,
		  `ville` varchar(255) DEFAULT NULL
		  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
	$favoris="CREATE TABLE `favoris` (
  			`id` int(10) NOT NULL,
  			`valeur` varchar(100) NOT NULL
			) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
	try
	{
		$bdd->exec($membres);
		echo "Table membres crée avec succès";
	}
	catch(PDOException $e)
	{
		echo "Table membres :<br />" . $e->getMessage();
	}
	try
	{
		$bdd->exec($favoris);
		echo "Table favoris crée avec succès";
	}
	catch(PDOException $e)
	{
		echo "Table favoris :<br />" . $e->getMessage();
	}
?>