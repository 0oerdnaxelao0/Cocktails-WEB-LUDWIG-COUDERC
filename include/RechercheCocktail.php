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
    foreach($Recettes as $Hier=>$Categorie)
    if (array_search('Coca-cola',$Categorie) != FALSE)
    {
        echo $Hier;
    }
    /*
    <select name="prenom" size="1">
     <option value="1">Pierre</option> 
    </select>
    */ ?>
    </p>
    </body>
</html>