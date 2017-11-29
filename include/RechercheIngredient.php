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
                echo '<div id="cat">Super Catégories :</div>';
                echo '</br>';
                echo '</br>';
				echo '<ul id="listCat">';
                foreach($ListeFatherReverse as $element)
                {
                    if($element !='Aliment')
                    echo '<li><a href="index.php?p=RechercheIngredient&ingre='.$element.'">'.$element.' </a></li>';
                    
                }
				echo '</ul>';
                echo '</br>';
                echo '</br>';
            }
            AfficherLiensSousCategorieIng($_GET['ingre']);
            echo '</br>';
            echo '</br>';
            CreerListeTemp($_GET['ingre'],$ListeCockFils);

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