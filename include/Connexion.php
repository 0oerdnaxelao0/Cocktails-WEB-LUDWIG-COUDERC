<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulaire</title>
	</head>
	<body>
		<?php
			$ClassPseudo='ok';
			$ClassPass='ok';
			if(isset($_POST['submit']))
			  { 
				$ChampsIncorrects='';

				//pseudo
				if(  (!isset($_POST['pseudo']))
				  )
				  {
					$ClassPseudo='error';
				  }
				
				
				//MDP
				if  (!isset($_POST['pass']))
				{
					$ClassPass='error';
				}
			  }
		?>
		<form method="post" action="#" >
			<fieldset>
				<legend>Connexion</legend>
				<p>Nom d'Utilisateur:</p>
				<input id="Obligatoire" type="text" class="<?php echo $ClassPseudo; ?>" name="pseudo" required="required" value="<?php if(isset($_POST['pseudo']))  echo $_POST['pseudo']; ?>"/>
				<p>Mot de Passe (8 caractères min) :</p>
				<input id="Obligatoire" type="password" name="pass" required="required" value="<?php if(isset($_POST['pass']))  echo $_POST['pass']; ?>"/>
				<p>Rester Connecté</p>
				<input type="checkbox" name="stay" checked="<?php if(isset($_POST['pass']))  echo 'checked'?>"/>
				<input id="Val" type="submit" name="submit" value="Valider" />
			</fieldset>
		</form>
		<p id="Ins">Pas encore inscrit ? <a href="index.php?p=Inscription">Cliquez Ici</a></p>
				<?php
						if(isset($_POST['submit']))
						{
							include_once("connexionBDD.php");
							include_once("FonctionFavoris.php");
							// Hachage du mot de passe
							//$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
							// Vérification des identifiants
							$res = false;
							$req = $bdd->prepare('SELECT id, pseudo, pass FROM membres WHERE pseudo = :pseudo');
							$req->execute(array(
								'pseudo' => $_POST['pseudo'],));
							while($resultat = $req->fetch())
							{
								$res = password_verify($_POST['pass'], $resultat['pass']);
								$id = $resultat['id'];
								$pseudo = $resultat['pseudo'];
							}
							$req->closeCursor();
							if (!$res)
							{
								echo 'Mauvais identifiant ou mot de passe !';
							}
							else
							{
								$_SESSION['id'] = $id;
								$_SESSION['pseudo'] = $pseudo;
								creationFav();
								$req = $bdd->prepare('SELECT valeur FROM favoris WHERE id = :id');
								$req->execute(array(
									'id' => $id,));
								while($res = $req->fetch())
								{
									ajouterCocktail($res['valeur']);
								}
								$req->closeCursor();
								setcookie('id', $id);
								setcookie('pseudo', $pseudo);
								include("Perso.php");
							}

						}
				?>
	</body>
</html>