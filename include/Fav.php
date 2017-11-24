<?php session_start() ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Favoris</title>
	</head>
	<body>
		<?php 
			if (!isset($_SESSION['pseudo']) || !isset($_SESSION['id']))
				include("Connexion.php");
			else
				include("Favoris.php");
		?>
	</body>
</html>