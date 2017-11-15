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

    <?php 
    if(isset($_GET['ingre']))
    {
        
        $ListeFather = Array();
        $ListeCockFils = Array();
        
        ListeFathers($_GET['ingre'], $ListeFather);
        $ListeFatherReverse = array_reverse($ListeFather);

            
            
            if ($_GET['ingre'] != 'Aliment')
            {   
                echo 'SUPER-CATÉGORIES :';
                echo '</br>';
                echo '</br>';
                foreach($ListeFatherReverse as $element)
                {
                    if($element !='Aliment') echo '< ';
                    echo '<a href="index.php?p=RechercheCocktail&ingre='.$element.'">'.$element.' </a>   ';
                    
                }
                echo '</br>';
                echo '</br>';
            }
            AfficherLiensSousCategorie($_GET['ingre']);
            echo '</br>';
            echo '</br>';
            CreerListeTemp($_GET['ingre'],$ListeCockFils);

            $i=0;
            echo 'LISTE DES COCKTAILS:';
            echo '</br>';
            echo '</br>';
            foreach($GLOBALS["Recettes"] as $indice=>$cocktail)
            {
                
                foreach($cocktail['index'] as $indexIngre => $ingre)
                {
                    if (in_array($ingre,$ListeCockFils))
                        {
                            echo '<a href="index.php?p=Cocktail&indice='.$i.'">'.$cocktail['titre'].'</a>';
                            echo '</br>';
                            break;
                        }
                        
                }
                $i++;
            }
    }    
    
    ?>



    
    <?php

    ?>
    </p>
    </body>
</html>