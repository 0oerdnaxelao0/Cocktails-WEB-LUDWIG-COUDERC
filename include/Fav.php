<?php 
	session_start();
	include_once("FonctionFavoris.php");
	
	$erreur = false;

	$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])?$_GET['action']:null ));
	if($action !== null)
	{
		 if(!in_array($action, array('ajout', 'suppression')))
			 $erreur=true;
		
		//recuperation de la variable en POST ou GET
		$c = (isset($_POST['c'])? $_POST['c']:  (isset($_GET['c'])? $_GET['c']:null ));
		//Suppression des espaces verticaux
   		$c = preg_replace('#\v#', '',$c);
		
		if (!$erreur)
		{
			switch($action)
			{
				Case "ajout":
					{
						ajouterCocktail($c);
						break;
					}

				Case "suppression":
					{
						supprimerCocktail($c);
						break;
					}

				Default:
						break;
			}
		}
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Favoris</title>
	</head>
	<body>
		<?php 
			if (!isset($_SESSION['pseudo']) || !isset($_SESSION['id']))
				include("Connexion.php");
			else
			{
				if (creationfav())
			{
				$nbCocktails = count($_SESSION['fav']['fav']);
				if ($nbCocktails <= 0)
				{
					echo 'Vous n\'avez pas encore de favoris';
				}
				else
				{
					echo 'Favoris :';
					echo '<ul>';
					foreach($_SESSION['fav']['fav'] as $cocktail)
					{
						 echo '<li><a href="index.php?p=RechercheCocktail&ingre='.$cocktail.'">'.$cocktail.' </a>
						 				<a href="index.php?p=Fav&amp;action=suppression&amp;c='.$cocktail.'">Supprimer</a></li>';
					}
					echo '</ul>';
				}
			}
			}
		?>
	</body>
</html>