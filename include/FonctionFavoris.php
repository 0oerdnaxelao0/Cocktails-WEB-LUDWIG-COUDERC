<?php 
function creationfav(){
   if (!isset($_SESSION['fav'])){
      $_SESSION['fav']['fav'] = array();
      $_SESSION['fav']['verrou'] = false;
   }
   return true;
}

function ajouterCocktail($nomCocktail)
{
	if (creationfav() && !isVerrouille())
	{
		if (array_search($nomCocktail, $_SESSION['fav']['fav']) === false)
			array_push($_SESSION['fav']['fav'],$nomCocktail);
	}
	else
		echo 'Un problème est survenu.';
}

function supprimerCocktail($nomCocktail)
{
	if (creationfav() && !isVerrouille())
	{
		$tmp = array();
		$tmp['fav'] = array();
		$tmp['verrou'] = $_SESSION['fav']['verrou'];
		
		for($i = 0; $i < count($_SESSION['fav']['fav']); $i++)
      	{
			if ($_SESSION['fav']['fav'][$i] !== $nomCocktail)
			{
				array_push( $tmp['fav'],$_SESSION['fav']['fav'][$i]);
				//if ($cle = array_search($nomCocktail, $_SESSION['fav']['fav']) !== false)
				//unset($_SESSION['fav']['fav'][$cle]);
			}
		}
		$_SESSION['fav'] = $tmp;
		unset($tmp);
	}
}

function isVerrouille()
{
   if (isset($_SESSION['fav']['fav']) && $_SESSION['fav']['verrou'])
   		return true;
   else
   		return false;
}

function supprimefav()
{
   	unset($_SESSION['fav']['fav']);
	unset($_SESSION['fav']['verrou']);
}

function compterCocktails()
{
   if (isset($_SESSION['fav']['fav']))
   		return count($_SESSION['fav']['fav']);
   else
   		return 0;

}

function isInFav($nomCocktail)
{
	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fonctions fav</title>
</head>

<body>
</body>
</html>