<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Favoris</title>
	</head>
	<body>
		<?php 
			if (!isset($_SESSION['pseudo']) || isset($_SESSION['id']))
				include("NoConnect.html");
			else
				include("panier.php");
		?>
	</body>
</html>