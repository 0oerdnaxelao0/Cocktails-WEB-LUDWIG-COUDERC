<?php 
function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']['panier'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}

function ajouterCocktail($nomCocktail)
{
	if (creationPanier() && !isVerrouille())
	{
		array_push($_SESSION['panier']['panier'],$nomCocktail);
	}
	else
		echo 'Un problème est survenu.';
}

function supprimerCocktail($nomCOcktail)
{
	if (creationPanier() && !isVerrouille())
	{
		if ($cle = array_search($nomCocktail, $_SESSION['panier']['panier']) !== false)
			unset($_SESSION['panier']['panier'][$cle]);
	}
}

function isVerrouille()
{
   if (isset($_SESSION['panier']['panier']) && $_SESSION['panier']['verrou'])
   		return true;
   else
   		return false;
}

function supprimePanier()
{
   	unset($_SESSION['panier']['panier']);
	unset($_SESSION['panier']['verrou']);
}

function compterCocktails()
{
   if (isset($_SESSION['panier']['panier']))
   		return count($_SESSION['panier']['panier']);
   else
   		return 0;

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fonctions Panier</title>
</head>

<body>
</body>
</html>