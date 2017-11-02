<!DOCTYPE html>

<?php
include 'Donnees.inc.php';
print_r($GLOBALS["Recettes"][0]['index'][0]);
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
    </p>
    </body>
</html>