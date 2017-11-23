<?php 
	session_start();
	// Suppression des variables de session et de la session

	$_SESSION = array();

	session_destroy();


	// Suppression des cookies de connexion automatique
	//setcookie('login', '');
	//setcookie('pass_hache', '');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Deconnexion</title>
</head>
<body>
	<p>Vous avez été déconnecté</p>
</body>
</html>