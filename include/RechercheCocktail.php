<!DOCTYPE html>

<?php
include 'Donnees.inc.php';
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Cocktails</title>
    </head>
    <body>
    <p>
    <a href="ListeCocktails.php">Liste des cocktails</a>
    <a href="RechercheCocktail.php">Rechercher un cocktail</a>
    <a href="Connexion.php">Connexion</a>

    <?php
	function fois2($valeur) 	// definition de la
	{			// fonction
        return (2*$valeur); 
	}
    ?>



    
    <?php
    foreach($Recettes as $Recette=>$Cocktail)
    {
    if (array_search('Aliment',$Cocktail['index']) != FALSE)
    {
       echo $Cocktail['titre'];
       echo '</br>';
    }
    }
    /*
    <select name="prenom" size="1">
     <option value="1">Pierre</option> 
    </select>
    */ ?>
    </p>
    </body>
</html>