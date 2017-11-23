<?php
	try{
		$dsn = "mysql:dbname=cocktails;host=localhost";
		$bdd = new PDO($dsn, 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>