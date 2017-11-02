<?php
include 'Donnees.inc.php';
?>

<!DOCTYPE html>

<html>

<head>

</head>
<body>
<h1>Accueil</h1>

<?php
$i = 0;
foreach($Recettes as $recette=>$infos)
{
    echo '<a href="Cocktail.php?indice='.$i.'">'.$infos['titre'].'</a>';
    echo '</br>';
    $i++;
}
?>
</body>
</html>