<?php
include 'Donnees.inc.php';
?>

<!DOCTYPE html>

<html>

<head>

</head>
<body>

<?php if (isset($_GET['indice'])) 
{ 
    //titre
    echo '<h1>'.$Recettes[$_GET['indice']]['titre'].'</h1>'; 


    //image
    $nom = preg_split("/[ ]+/",$Recettes[$_GET['indice']]['titre']);

    if (sizeof($nom) == 1)
    echo '<img src = "images/'.$nom[0].'.jpg"
    alt="'.$nom[0].'"
    ';
    else
    echo '<img src = "images/'.$nom[0].'_'.$nom[1].'.jpg"
    alt="'.$nom[0].'"
    ';
    //ingrédients
    echo '<h3> Ingrédients : </h3>';
    $ingredients = preg_split("/[|]+/",$Recettes[$_GET['indice']]['ingredients']);
    echo '<ul>';
    foreach($ingredients as $ingredient)
    {
        echo '<li>'.$ingredient.'</li>';
    }
    echo '</ul>';

    //preparation
    echo '<h3> Préparation : </h3>';

    $etapes = preg_split("/[.]+/",$Recettes[$_GET['indice']]['preparation']);
    echo '<ul>';
    foreach($etapes as $etape)
    {
       if ($etape != "") 
        echo '<li>'.$etape.'</li>';
    }
    echo '</ul>';
} 
?>
<!-- debut de la generation PHP -->

<?php	
/*
if (isset($_GET['rubrique']))
{
    $rubrique = $_GET['rubrique'];
    foreach($Rubriques as $produit=>$infos) 
        { 
            echo '
            <tr>
                <th align="left">'.$produit.'</th>
                <td>'.$infos["Prix"].'</td>
                <td>'.$infos["Unite"].'</td>
                <td> 
                    <form> <input type="number" name="quantite['.$produit.']" min="1" max="20" /> </form>
                </td>
            </tr>';
        }
}
*/
?>

</body>
</html>