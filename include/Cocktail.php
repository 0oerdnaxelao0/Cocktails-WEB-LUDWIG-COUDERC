<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<div id="PageCocktail">
	<?php
		include 'Donnees.inc.php';
			
		$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
		
		if (isset($_GET['indice'])) 
		{ 
			//titre
			echo '<h1>'.$Recettes[$_GET['indice']]['titre'].'</h1>'; 
		
		
			//image
			$nom = strtr($Recettes[$_GET['indice']]['titre'], $unwanted_array);
			$nom = preg_split("/[ ]+/",$nom);
		
			if (sizeof($nom) == 1)
			{
				echo '<img src = "images/'.$nom[0].'.jpg"
				alt="'.$nom[0].'" width = "250" height=300" />
				';
			}
			else
			{
				echo '<img src ="images/'.$nom[0].'_'.$nom[1].'.jpg"
				alt="'.$nom[0].' '.$nom[1].'" width = "250" height="300" />
				';
			}
			//ingrédients
			echo '<h3> Ingrédients : </h3>';
			$ingredients = preg_split("/[|]+/",$Recettes[$_GET['indice']]['ingredients']);
			echo '<ul>';
			foreach($ingredients as $ingredient)
			{
				echo '<li>'.$ingredient.'</li>';
			}
			echo '</ul>';
		
			//preparation
			echo '<h3> Préparation : </h3>';
		
			$etapes = preg_split("/[.]+/",$Recettes[$_GET['indice']]['preparation']);
			echo '<ul>';
			foreach($etapes as $etape)
			{
			   if ($etape != "") 
				echo '<li>'.$etape.'</li>';
			}
			echo '</ul>';
			
			echo '<a href="index.php?p=Favoris&amp;action=ajout&amp;c='.$Recettes[$_GET['indice']]['titre'].'">Ajouter au panier</a>';
		}
	?>
	</body>
</html>