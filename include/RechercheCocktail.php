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
        CreerListeTemp('Fruit',$ListeCock); 
        print_r($ListeCock);
        foreach($GLOBALS["Recettes"] as $indice=>$cocktail)
        {
            foreach($cocktail['index'] as $indexIngre => $ingre)
            {
                if (in_array($ingre,$ListeCock))
                    {
                        echo $cocktail['titre'];
                        echo '</br>';
                        echo $cocktail['ingredients'];
                        echo '</br>';
                        break;
                    }
            }
        }
        
    ?>



    
    <?php

    ?>
    </p>
    </body>
</html>