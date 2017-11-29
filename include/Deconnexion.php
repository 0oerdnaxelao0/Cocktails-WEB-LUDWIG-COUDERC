<?php 
	session_start();

	$_SESSION = array();

	session_destroy();

	setcookie('pseudo', '', time() - 3600, '/');
	setcookie('id', '', time() - 3600, '/');
/*
	if (isset($_COOKIE['id']))
	{
    	unset($_COOKIE['id']);
	}
	if (isset($_COOKIE['pseudo']))
	{
    	unset($_COOKIE['pseudo']);
    	
	}*/
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