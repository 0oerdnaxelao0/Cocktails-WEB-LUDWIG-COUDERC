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
		if (isset($_POST['recherche']))
			$rech = ucwords(strtolower($_POST['recherche']));
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