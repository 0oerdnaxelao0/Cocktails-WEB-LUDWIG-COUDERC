<?php
    include 'Donnees.inc.php';

    $ListeCocktails = array();
    
    function AddToEnd($Element)
    {
        if (!(isset($ListeCocktails[$Element])))
        {
            $ListeCocktails[] = $Element;
        }
    }
    function AfficherTousCocktails()
        {
            $i = 0;
            foreach($GLOBALS["Recettes"] as $recette=>$infos)
            {
                 echo '<a href="index.php?p=Cocktail&indice='.$i.'">'.$infos['titre'].'</a>';
                 echo '</br>';
                $i++;
            }
        }

    function AfficherCocktailParAliment($aliment)
    {
        $i=0;
        foreach($GLOBALS["Recettes"] as $recette=>$infos)
        {
            foreach($infos['index'] as $indice=> $ingre)
            {
                if ($ingre == $aliment)
                {
                    
                    echo '<a href="index.php?p=Cocktail&indice='.$i.'">'.$infos['titre'].'</a>';
                    echo '</br>';
                }
            }
            $i++;
        } 
    }
    function RechercheCocktailParAliment($aliment)
    {
        
        if ($aliment == 'Aliment') AfficherTousCocktails();
        else
        {
            AfficherCocktailParAliment($aliment);
            if ((isset($GLOBALS["Hierarchie"][$aliment]['sous-categorie']))!=FALSE)
            {
                    foreach ($GLOBALS["Hierarchie"][$aliment]['sous-categorie'] as $indice=>$sousalim)
                    {
                        RechercheCocktailParAliment($sousalim);
                    }
            }
        }
    }
?>