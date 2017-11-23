<?php session_start(); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Espace Personnel</title>
	</head>
	<body>
		<?php
			if (!isset($_SESSION['pseudo']) || !isset($_SESSION['id']))
				include("Connexion.php");
			else
				include("Perso.php");
		?>
	</body>
</html>