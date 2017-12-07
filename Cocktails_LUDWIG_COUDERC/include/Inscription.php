<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulaire</title>
	</head>
	<body>
		<?php
			include_once("connexionBDD.php");
		
			$ClassPseudo='ok';
			$ClassPass='ok';
			if(isset($_POST['submit']))
			  {
				//Pseudo
				if(  (isset($_POST['pseudo'])))
				  {
					$req = $bdd->prepare('SELECT pseudo FROM membres');
					$req->execute(array(
						'pseudo' => $_POST['pseudo'],));
					while($res = $req->fetch())
					{
						if ($res['pseudo'] == $_POST['pseudo'])
						{
							$ClassPseudo='error';
							break;
						}
					}
					$req->closeCursor();
				  }
				
				//MDP
				if ( (isset($_POST['pass']))
				 && (!preg_match("/^(?=.*[A-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@])\S{8,}$/",$_POST['pass'])))
				{
					$ClassPass='error';
				}
			  }
		?>
		<form method="post" action="#" >
			<fieldset>
				<legend>Inscription</legend>
				<p>Nom d'Utilisateur:</p>
				<input id="Obligatoire" type="text" class="<?php echo $ClassPseudo; ?>" name="pseudo" required="required" value="<?php if(isset($_POST['pseudo']))  echo $_POST['pseudo']; ?>"/>
				<p>Mot de Passe (8 caractères min) :</p>
				<input id="Obligatoire" type="password" class="<?php echo $ClassPass; ?>" name="pass" required="required"/>
				<input id="Val" type="submit" name="submit" value="Valider" />
			</fieldset>
		</form>
				<?php 
						if(isset($_POST['submit']))
						{
							if ($ClassPseudo == 'error')
								echo 'Pseudo déja existant';
							else if ($ClassPass == 'error')
								echo 'Mot de passe incorect, veuillez réessayez';
							else
							{
								// Vérification de la validité des informations
								// Hachage du mot de passe
								$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
								// Insertion
								$req = $bdd->prepare('INSERT INTO membres(pseudo, pass) VALUES(:pseudo, :pass)');
								$req->execute(array(
									'pseudo' => $_POST['pseudo'],
									'pass' => $pass_hache,
								));
								header("Refresh:0; url=index.php?p=Inscrit");
							}
						}
				?>
	</body>
</html>