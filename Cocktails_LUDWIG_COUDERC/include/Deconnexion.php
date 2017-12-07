<?php 
	session_start();

	$_SESSION = array();

	session_destroy();
	setcookie('id', '', -1, '/');
	setcookie('pseudo', '', -1, '/');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Deconnexion</title>
</head>
<body>
	<h3>Vous avez été déconnecté</h3>
</body>
</html>