<?php
    include 'Donnees.inc.php';
    
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
            if (array_search('sous-catégorie',$GLOBALS["Hierarchie"][$aliment])!=FALSE)
            {
                    foreach ($GLOBALS["Hierarchie"][$aliment]['sous-categorie'] as $sousalim)
                    {
                        RechercheCocktailParAliment($sousalim);
                    }
            }
        }
    }
?>