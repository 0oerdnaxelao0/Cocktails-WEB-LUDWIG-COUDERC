<!doctype html>
<html>
	<head>
		<meta charset="utf-8">		
		<link rel="icon" href="images/icon.jpg" />
		<link rel="stylesheet" href="cssmain.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Great+Vibes" rel="stylesheet"> 
		<title>Les Cocktails</title>
	</head>
	<body>
		<header>
			<h1><a href="index.php">Les Cocktails</a></h1>
		</header>
		<nav>
			<ul>
				<li><a href="index.php?p=ListeCocktails">Tous les Cocktails</a></li>
				<li><a href="index.php?p=RechercheCocktail&ingre=Aliment">Recherche</a></li>
				<li><a href="index.php?p=RechercheIngredient&ingre=Aliment">Par Ingredient</a></li>
				<li><a href="index.php?p=Fav">Favoris</a></li>
				<li><a href="index.php?p=EspacePerso">Espace Perso.</a></li>
			</ul>
		</nav>
		<main>
			<?php   
				 	if(isset($_GET['p']))
						{
						  	$php='include/'.$_GET['p'].'.php';
   							if (file_exists($php)) 
								{include('include/'.$_GET['p'].'.php');}
							else 
								echo "<h1 id=\"Err\">Erreur 404 : la page demandée n’existe pas</h1>";
 						}
					else 
						include ('include/accueil.html');
			?>
		</main>
		<footer>
			<h4>&copy; Copyright A.Ludwig, A. Couderc</h4>
		</footer>
	</body>
</html>