<?php
    include 'Donnees.inc.php';

    $ListeCocktails=array();
    
    
    
    function AddToEnd($Element, &$Liste)
    {
        //if (!(isset($GLOBALS["ListeCocktails"][$Element])))
        if (!(isset($ListeCocktails[$Element])))
        {
            $Liste[] = $Element;
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

    function AfficherCocktailParAliment($aliment, &$Liste)
    {
            
        foreach($GLOBALS["Recettes"] as $recette=>$infos)
        {
            foreach($infos['index'] as $indice=> $ingre)
            {
                if ($ingre == $aliment)
                {
                    AddToEnd($GLOBALS["Recettes"][$i], $Liste);
                    //echo '<a href="../index.php?p=Cocktail&indice='.$i.'">'.$infos['titre'].'</a>';
                    //echo '</br>';
                    
                }
                
            }
            $i++;
        } 
    }
    function RechercheCocktailParAliment($aliment, &$Liste)
    {
        
        if ($aliment == 'Aliment') AfficherTousCocktails();
        else
        {
            AfficherCocktailParAliment($aliment, $Liste);
            if ((isset($GLOBALS["Hierarchie"][$aliment]['sous-categorie']))!=FALSE)
            {
                    foreach ($GLOBALS["Hierarchie"][$aliment]['sous-categorie'] as $indice=>$sousalim)
                    {
                        RechercheCocktailParAliment($sousalim, $Liste);
                    }
            }
            
            
        }
        
    }

    function existe($aliment)
    {
        if(!($GLOBALS["Hierarchie"][$aliment]['sous-categorie']))
        {
            
        }
    }

    function RechercheAlimentv2($ingredient)
    {
        if ((isset($GLOBALS["Hierarchie"][$ingredient]['sous-categorie']))==FALSE)
        AddToEnd($GLOBALS["Hierarchie"][$ingredient]);
        else
        RechercheAlimentv2($GLOBALS["Hierarchie"][$ingredient]['sous-categorie']);
    }

    function CreerListeTemp($ingre, &$ListeTemp)
    {
        if (!(in_array($ingre,$ListeTemp)))
        AddToEnd($ingre, $ListeTemp);
        //AddToEnd("titi", $ListeTemp);
        if (isset($GLOBALS["Hierarchie"][$ingre]['sous-categorie'])!=FALSE)
        //if(in_array('sous-categorie',$GLOBALS["Hierarchie"][$ingre]))
        {
           // AddToEnd("toto", $ListeTemp);
            foreach ($GLOBALS["Hierarchie"][$ingre]['sous-categorie'] as $sousens=>$indice)
            {
                CreerListeTemp($indice, $ListeTemp);
            }
        }
    }
?>