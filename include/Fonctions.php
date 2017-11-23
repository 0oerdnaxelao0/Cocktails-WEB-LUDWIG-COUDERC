<?php
    include 'Donnees.inc.php';

    
    
    //ajoute un élément à la fin d'une liste, tout en vérifiant les doublons
    function AddToEnd($Element, &$Liste)
    {
        
        if (!(isset($Liste[$Element])))
        {
            $Liste[] = $Element;
        }
    }

    //affiche la liste de tous les cocktails, appellée à la page Liste des cocktails
    function AfficherTousCocktails()
        {
            $i = 0;
			echo '<ul id="listCat">';
            foreach($GLOBALS["Recettes"] as $recette=>$infos)
            {
                 echo '<li><a href="index.php?p=Cocktail&indice='.$i.'">'.$infos['titre'].'</a></li>';
                 echo '</br>';
                $i++;
            }
			echo '</ul>';
        }

    //ajoute dans une liste les cocktails contenant l'ingrédient en paramètre
    function AjouteCocktailParAliment($aliment, &$Liste)
    {
            
        foreach($GLOBALS["Recettes"] as $recette=>$infos)
        {
            foreach($infos['index'] as $indice=> $ingre)
            {
                if ($ingre == $aliment)
                {
                    AddToEnd($GLOBALS["Recettes"][$i], $Liste);
                    
                    
                }
                
            }
            $i++;
        } 
    }

    //ajoute dans une liste les cocktails contenant l'ingrédient en paramètre et ses sous-catégories
    function RechercheCocktailParAliment($aliment, &$Liste)
    {
        if ($aliment == 'Aliment') AfficherTousCocktails();
        else
        {
            AjouteCocktailParAliment($aliment, $Liste);
            if ((isset($GLOBALS["Hierarchie"][$aliment]['sous-categorie']))!=FALSE)
            {
                    foreach ($GLOBALS["Hierarchie"][$aliment]['sous-categorie'] as $indice=>$sousalim)
                    {
                        RechercheCocktailParAliment($sousalim, $Liste);
                    }
            }
            
            
        }
        
    }

    //Créer une liste contenant tous les cocktails contenant l'ingrédient en paramètre (sous-catégories comprises)
    function CreerListeTemp($ingre, &$ListeTemp)
    {
        if (!(in_array($ingre,$ListeTemp)))
        AddToEnd($ingre, $ListeTemp);
        if (isset($GLOBALS["Hierarchie"][$ingre]['sous-categorie'])!=FALSE)
        {
            foreach ($GLOBALS["Hierarchie"][$ingre]['sous-categorie'] as $sousens=>$indice)
            {
                CreerListeTemp($indice, $ListeTemp);
            }
        }
    }

    //Utiliser dans la page de recherche de cocktail, affiche les sous catégories de l'ingrédient sélectionné sous forme de liens cliquables
    function AfficherLiensSousCategorie($ingre)
    {
        if (isset($GLOBALS["Hierarchie"][$ingre]['sous-categorie'])!=FALSE)
        {
            echo '<div id="cat">Sous-Catégories :</div>';
            echo '</br>';
            echo '</br>';
			echo '<ul id="listCat">';
            foreach ($GLOBALS["Hierarchie"][$ingre]['sous-categorie'] as $sousens=>$indice)
            {
                echo '<li><a href="index.php?p=RechercheCocktail&ingre='.$indice.'">'.$indice.'</a></li>';
            }
			echo '</ul>';
            echo '</br>';
        }
    }

    //Créer une liste contenant toutes les super-catégories de l'ingrédient en paramètre 
    function ListeFathers($ingre, &$ListeTempF)
    {
        if (!(in_array($ingre,$ListeTempF))) 
        AddToEnd($ingre, $ListeTempF);
        if (isset($GLOBALS["Hierarchie"][$ingre]['super-categorie'])!=FALSE)
        {
             foreach ($GLOBALS["Hierarchie"][$ingre]['super-categorie'] as $surens=>$indice)
                {
                    ListeFathers($indice, $ListeTempF);
                }
        }  
    }
?>