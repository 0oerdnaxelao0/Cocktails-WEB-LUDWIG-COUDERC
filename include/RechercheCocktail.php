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
    <p>
    <a href="ListeCocktails.php">Liste des cocktails</a>
    <a href="RechercheCocktail.php">Rechercher un cocktail</a>
    <a href="Connexion.php">Connexion</a>

    <?php 
    $ListeCock = Array();
        RechercheCocktailParAliment('Fruit',$ListeCock); 
        foreach($ListeCock as $cocktail=>$indice)
        {
            echo $indice['titre'];
            echo '</br>';
        }
        
    ?>



    
    <?php

    ?>
    </p>
    </body>
</html>