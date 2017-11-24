<!DOCTYPE html>

<?php
    include 'Fonctions.php';
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Recherche Cocktails</title>
    </head>
    <body>
		<form method="post" action="#" >
				<input type="search" class="recherche" name="recherche" placeholder="Rechercher...?"/>
				<input type="submit" name="submit" value="Valider"/>
		</form>
    <p>

    <?php
		$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
		
		if (isset($_POST['recherche']))
		{
			$recherche = strtr($_POST['recherche'], $unwanted_array);
			$recherche = preg_split("/[ ]+/",$recherche);
			foreach ($recherche as $r)
			{
				
			}
			$rech = ucwords(strtolower($recherche[0])).' '.$recherche[1].' '.$recherche[2];
		}
		else if (isset($_GET['ingre']))
			$rech = $_GET['ingre'];
		if($rech)
			{
				$ListeFather = Array();
				$ListeCockFils = Array();

				ListeFathers($rech, $ListeFather);
				$ListeFatherReverse = array_reverse($ListeFather);



					if ($rech != 'Aliment')
					{   
						echo '<div id="cat">Super Catégories :</div>';
						echo '</br>';
						echo '</br>';
						echo '<ul id="listCat">';
						foreach($ListeFatherReverse as $element)
						{
							if($element !='Aliment')
							echo '<li><a href="index.php?p=RechercheCocktail&ingre='.$element.'">'.$element.' </a></li>';

						}
						echo '</ul>';
						echo '</br>';
						echo '</br>';
					}
					AfficherLiensSousCategorie($rech);
					echo '</br>';
					echo '</br>';
					CreerListeTemp($rech,$ListeCockFils);

					$i=0;
					echo '<div id="cat">Liste des Cocktails :</div>';
					echo '</br>';
					echo '</br>';
					echo '<ul id="listCat">';
					foreach($GLOBALS["Recettes"] as $indice=>$cocktail)
					{

						foreach($cocktail['index'] as $indexIngre => $ingre)
						{
							if (in_array($ingre,$ListeCockFils))
								{
									echo '<li><a href="index.php?p=Cocktail&indice='.$i.'">'.$cocktail['titre'].'</a></li>';
									break;
								}

						}
						$i++;
					}
					echo '</ul>';
			}
    ?>
    </p>
    </body>
</html>