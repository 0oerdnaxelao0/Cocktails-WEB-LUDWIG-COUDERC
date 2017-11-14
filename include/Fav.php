<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Favoris</title>
	</head>
	<body>
		<?php 
			if (!isset($_SESSION['Login']) || isset($_SESSION['Mdp']))
				include("NoConnect.html");
			else
				include("panier.php");
		?>
	</body>
</html>