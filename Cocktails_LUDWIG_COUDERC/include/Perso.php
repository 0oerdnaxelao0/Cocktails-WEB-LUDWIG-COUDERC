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
					echo '<h2>Pseudo :</h2> <p>'.$resultat['pseudo'].'</p>';
					
					if(!($resultat['nom'] === NULL))
					{
						echo '<h2>Nom :</h2> <p>'.$resultat['nom'].'</p>';
					}
					
					if(!($resultat['prenom'] === NULL))
					{
						echo '<h2>Prenom :</h2> <p>'.$resultat['prenom'].'</p>';
					}
					
					if(!($resultat['sexe'] === NULL))
					{
						if($resultat['sexe'] == 'f')
							echo '<h2>Sexe :</h2> <p> Femme'.'</p>';
						if($resultat['sexe'] == 'h')
							echo '<h2>Sexe :</h2> <p> Homme'.'</p>';
					}
					
					if(!($resultat['email'] === NULL))
					{
						echo '<h2>EMail :</h2> <p>'.$resultat['email'].'</p>';
					}
					
					if(!($resultat['date_naissance'] === NULL))
					{
						echo '<h2>Date de naissance :</h2> <p>'.$resultat['date_naissance'].'</p>';
					}
					
					if(!($resultat['adresse'] === NULL) && !($resultat['cp'] === NULL) && !($resultat['ville'] === NULL))
					{
						echo '<h2>Adresse :</h2> <p>'.$resultat['adresse'].'</br>'.$resultat['cp'].' '.$resultat['ville'].'</p>';
					}
				}
		?>
		</br>
		<a href="index.php?p=Modification" class="button" style="background-color: yellow;">Modifier mes informations</a>
		<br />
		<br />
		<br />
		<a href="index.php?p=Deconnexion" class="button" style="background-color: darkred; font-color:black; margin-left:46.5%;">Deconnexion</a>
		</form>
		</div>
	</body>
</html>