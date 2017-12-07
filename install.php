<?php
	try{
		$dsn = "mysql:host=localhost";
		$bdd = new PDO($dsn, 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	$table = "CREATE DATABASE IF NOT EXISTS `cocktails` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cocktails`;";

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
 			`id_row` int(10) NOT NULL,
 			`id` int(10) NOT NULL,
 			`valeur` varchar(100) NOT NULL
			) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
	$membresP = "ALTER TABLE `membres`
  			ADD PRIMARY KEY (`id`),
			ADD UNIQUE KEY `pseudo` (`pseudo`);";
	$user = "INSERT INTO `membres` (`id`, `pseudo`, `pass`, `nom`, `prenom`, `sexe`, `email`, `date_naissance`, `adresse`, `cp`, `ville`) VALUES
	(16, 'nauer123', '$2y$10$.GxOpiibRvOraxeBKeyMq.ZjCvjjaGo5e7ulLRfeRvYUDgb2LrjWy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
	$favorisP = "ALTER TABLE `favoris`
  			ADD PRIMARY KEY (`id_row`);";
	$membresI = "ALTER TABLE `membres`
  			MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;";
	$favorisI = "ALTER TABLE `favoris`
  			MODIFY `id_row` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;";
	try
	{
		$bdd->exec($table);
		echo "Table crée avec succès";
	}
	catch(PDOException $e)
	{
		echo "Table membres :<br />" . $e->getMessage();
	}
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
		$bdd->exec($membresP);
		echo "Table membres modifiée avec succès";
	}
	catch(PDOException $e)
	{
		echo "Table membres :<br />" . $e->getMessage();
	}
	try
	{
		$bdd->exec($membresI);
		echo "Table membres modifiée2 avec succès";
	}
	catch(PDOException $e)
	{
		echo "Table membres :<br />" . $e->getMessage();
	}
	try
	{
		$bdd->exec($user);
		echo "Table membres modifiée2 avec succès";
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
	try
	{
		$bdd->exec($favorisP);
		echo "Table favoris modifiée avec succès";
	}
	catch(PDOException $e)
	{
		echo "Table membres :<br />" . $e->getMessage();
	}
	try
	{
		$bdd->exec($favorisI);
		echo "Table favoris modifiée2 avec succès";
	}
	catch(PDOException $e)
	{
		echo "Table membres :<br />" . $e->getMessage();
	}
?>
