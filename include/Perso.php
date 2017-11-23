<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Espace Peronnel</title>
	</head>
	<body>
		<div id="Perso">
		<?php 
				include_once("connexionBDD.php");
				$req = $bdd->prepare('SELECT pseudo, nom, prenom, sexe, email, date_naissance, adresse, cp, ville FROM membres WHERE id = :id');
				$req->execute(array(
						'id' => $_SESSION['id'],));
				while($resultat = $req->fetch())
				{
					echo 'Pseudo: <p>'.$resultat['pseudo'].'</p>';
					
					if(!($resultat['nom'] === NULL))
					{
						echo 'Nom : <p>'.$resultat['nom'].'</p>';
					}
					
					if(!($resultat['prenom'] === NULL))
					{
						echo 'Prenom : <p>'.$resultat['prenom'].'</p>';
					}
					
					if(!($resultat['sexe'] === NULL))
					{
						if($resultat['sexe'] == 'f')
							echo 'Sexe : <p> Femme'.'</p>';
						if($resultat['sexe'] == 'h')
							echo 'Sexe : <p> Homme'.'</p>';
					}
					
					if(!($resultat['email'] === NULL))
					{
						echo 'EMail : <p>'.$resultat['email'].'</p>';
					}
					
					if(!($resultat['date_naissance'] === NULL))
					{
						echo 'Date de naissance : <p>'.$resultat['date_naissance'].'</p>';
					}
					
					if(!($resultat['adresse'] === NULL) && !($resultat['cp'] === NULL) && !($resultat['ville'] === NULL))
					{
						echo 'Adresse : <p>'.$resultat['adresse'].'</br>'.$resultat['cp'].' '.$resultat['ville'].'</p>';
					}
				}
		?>
		</br>
		<a href="index.php?p=Modification"style="text-decoration: none; text-align: center">Modifier mes informations</a>
		<form method="post" action="index.php?p=Deconnexion">
			<input type="submit" value="Deconnexion">
		</form>
		</div>
	</body>
</html>