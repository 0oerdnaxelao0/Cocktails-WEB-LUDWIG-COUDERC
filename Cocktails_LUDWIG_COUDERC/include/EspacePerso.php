<?php session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Espace Personnel</title>
	</head>
	<body>
		<?php
		if (((isset($_COOKIE['pseudo'])) && (isset($_COOKIE['id']))))
		{
			$_SESSION['id'] = $_COOKIE['id'];
			$_SESSION['pseudo'] = $_COOKIE['pseudo'];
			include("Perso.php");
		}
		else if (!isset($_SESSION['pseudo']) || !isset($_SESSION['id']))
			include("Connexion.php");
		else
			include("Perso.php");
		?>
	</body>
</html>