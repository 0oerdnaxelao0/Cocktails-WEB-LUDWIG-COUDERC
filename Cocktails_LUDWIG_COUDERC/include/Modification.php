<?php
		session_start();
		include_once("connexionBDD.php");
		$ClassPseudo = 'ok';
		$ClassPass = 'ok';
		$ClassNom = 'ok';
		$ClassPrenom = 'ok';
		$ClassSexe = 'ok';
		$ClassEMail = 'ok';
		$ClassNaissance = 'ok';
		$ClassAdresse = 'ok';
		$ClassCP = 'ok';
		$ClassVille = 'ok';
		if(isset($_POST['submit']))
			{
				$req = $bdd->prepare('SELECT pseudo FROM membres');
				$req->execute(array(
					'pseudo' => $_POST['pseudo'],));
				$good = false;
				while($res = $req->fetch())
				{
					if($res['pseudo'] == $_POST['pseudo'])
						$good = true;
				}
				$req->closeCursor();
			
				//Pseudo
				if(isset($_POST['pseudo']) && $good)
				  {
					$ClassPseudo='error';
				  }
				
				//MDP
				if(isset($_POST['pass']) && (!preg_match('/^(?=.*[A-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@])\S{8,}$/',$_POST['pass'])))
				{
					$ClassPass='error';
				}
				//NOM
				if(isset($_POST['nom']) && (strlen(trim($_POST['nom']))<2))
				  {
					$ClassNom='error';
				  }
				else $ClassNom='ok';

				
				//PRENOM
				if((isset($_POST['prenom']) && ((!preg_match("#[a-z]#i",$_POST['prenom'])) || (preg_match("#[^a-z ]#i",$_POST['prenom'])))))      
				  {
					$ClassPrenom='error';
				  }
				else $ClassPrenom='ok';
				
				
				//EMAIL
				if(isset($_POST['email']) && (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])))
				{
	    			$ClassEMail='error';
				}

				//DATE DE NAISSANCE
				if(isset($_POST['naissance']) && (preg_match('#^[ ]*([0-9]{4})-([0-9]{2})-([0-9]{2})[ ]*#',$_POST['naissance'],$regs)))
	      		{ 
					if(!checkdate($regs[2],$regs[3],$regs[1]))
			  		{
						$ClassNaissance='error';
			  		}
				else $ClassNaissance='ok';
		  		}
				
				//ADRESSE
				if(isset($_POST['adresse']) && (!preg_match('/[0-9]+,.*/',$_POST['adresse']))
					   )
				{
					$ClassAdresse='error';
				}
				else $ClassAdresse='ok';
				  
				
				//CODE POSTAL
				if(isset($_POST['cp']) && (!preg_match('/[0-9]{4,5}/',$_POST['cp'])))
				  {
					$ClassCP='error';
				  }
				else $ClassCP='ok';
				  
				
				//VILLE
				if(isset($_POST['ville']) && (strlen(trim($_POST['ville']))<2))
				  {
					$ClassVille='error';
				  }
				else $ClassVille='ok';
		}
			
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modification</title>
	</head>
	<body>
		<form method="post" action="#">
			<fieldset>
					<p>Nom d'Utilisateur:</p>
					<input type="text" class="<?php echo $ClassPseudo; ?>" name="pseudo" value="<?php if(isset($_POST['pseudo']))  echo $_POST['pseudo']; ?>"/>
					<p>Mot de Passe (8 caractères min) :</p>
					<input type="password" class="<?php echo $ClassPass; ?>" name="pass" value=""/><p>Nom :</p>
					<input type="text" class="<?php echo $ClassNom; ?>" name="nom" value="<?php if(isset($_POST['nom']))  echo $_POST['nom']; ?>"/>
					<p>Prénom :</p> 
					<input type="text" class="<?php echo $ClassPrenom; ?>" name="prenom" value="<?php if(isset($_POST['prenom']))  echo $_POST['prenom']; ?>"/>	
					<p>Sexe :</p>
					<input id="radio" type="radio" class="<?php echo $ClassSexe; ?>" name="sexe" value="f" <?php if((isset($_POST['sexe']))&&($_POST['sexe'])=='f') echo 'checked="checked"'; ?> /> <p id="radio">Feminin</p>	
					<input id="radio" type="radio" class="<?php echo $ClassSexe; ?>" name="sexe" value="h" <?php if((isset($_POST['sexe']))&&($_POST['sexe'])=='h') echo 'checked="checked"'; ?> /> <p id="radio">Masculin</p>
					<p>Adresse E-mail</p>
					<input type="text" class="<?php echo $ClassEMail; ?>" name="email" value="<?php if(isset($_POST['email']))  echo $_POST['email']; ?>"/>
					<p>Date de naissance</p>
					<input type="date" class="<?php echo $ClassNaissance; ?>" name="naissance" value="<?php if(isset($_POST['naissance'])) echo $_POST['naissance']; ?>"/>
					<p>Adresse :</p>
					<input type="text" class="<?php echo $ClassAdresse; ?>" name="adresse" value="<?php if(isset($_POST['adresse']))  echo $_POST['adresse']; ?>"/>
					<p>Code Postal :</p>
					<input type="text" class="<?php echo $ClassCP; ?>" name="cp" value="<?php if(isset($_POST['cp']))  echo $_POST['cp']; ?>"/>
					<p>Ville :</p>
					<input type="text" class="<?php echo $ClassVille; ?>" name="ville" value="<?php if(isset($_POST['ville']))  echo $_POST['ville']; ?>"/>
					<br />
					<input id="Val" type="submit" name="submit" value="Valider" />
					<br />
			</fieldset>
		</form>
		<?php 
				if ($ClassPseudo == 'error')
				{
					echo 'Pseudo déja existant';
				}
				else if ($ClassPass == 'error')
					echo 'Mot de passe incorect, veuillez réessayez';
				else if ($ClassNom == 'error')
					echo 'Nom incorrect, veuillez réessayez';
				else if ($ClassPrenom == 'error')
					echo 'Prenom incorrect, veuillez réessayez';
				else if ($ClassEMail == 'error')
					echo 'EMail incorrect, veuillez réessayez';
				else if ($ClassNaissance == 'error')
					echo 'Date incorrecte, veuillez réessayez';
				else if ($ClassAdresse == 'error')
					echo 'Adresse incorrecte, veuillez réessayez';
				else if ($ClassCP == 'error')
					echo 'Code Postal incorrect, veuillez réessayez';
				else if ($ClassVille == 'error')
					echo 'Ville incorrecte, veuillez réessayez';
				else if(isset($_POST['submit']))
				{
					try
					{
						if (isset($_POST['pseudo']))
						{
							$req = $bdd->prepare('UPDATE membres SET pseudo = :pseudo WHERE id=:id');
							$req->execute(array('pseudo' => $_POST['pseudo'], 'id' => $_SESSION['id']));
							$req->closeCursor();
							$_SESSION['pseudo'] = $_POST['pseudo'];
						}
						if (isset($_POST['pass']))
							{
							$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
							$req = $bdd->prepare('UPDATE membres SET pass = :pass WHERE id=:id');
							$req->execute(array('pass' => $pass_hache, 'id' => $_SESSION['id']));
							$req->closeCursor();
						}
						if (isset($_POST['nom']))
							{
							$req = $bdd->prepare('UPDATE membres SET nom = :nom WHERE id=:id');
							$req->execute(array('nom' => $_POST['nom'], 'id' => $_SESSION['id']));
							$req->closeCursor();
						}
						if (isset($_POST['prenom']))
							{
							$req = $bdd->prepare('UPDATE membres SET prenom = :prenom WHERE id=:id');
							$req->execute(array('prenom' => $_POST['prenom'], 'id' => $_SESSION['id']));
							$req->closeCursor();
						}
						if (isset($_POST['sexe']))
							{
							$req = $bdd->prepare('UPDATE membres SET sexe = :sexe WHERE id=:id');
							$req->execute(array('sexe' => $_POST['sexe'], 'id' => $_SESSION['id']));
							$req->closeCursor();
						}
						if (isset($_POST['email']))
							{
							$req = $bdd->prepare('UPDATE membres SET email = :email WHERE id=:id');
							$req->execute(array('email' => $_POST['email'], 'id' => $_SESSION['id']));
							$req->closeCursor();
						}
						if (isset($_POST['naissance']))
							{
							$req = $bdd->prepare('UPDATE membres SET date_naissance = :date_naissance WHERE id=:id');
							$req->execute(array('date_naissance' => $_POST['naissance'], 'id' => $_SESSION['id']));
							$req->closeCursor();
						}
						if (isset($_POST['adresse']))
							{
							$req = $bdd->prepare('UPDATE membres SET adresse = :adresse WHERE id=:id');
							$req->execute(array('adresse' => $_POST['adresse'], 'id' => $_SESSION['id']));
							$req->closeCursor();
						}
						if (isset($_POST['cp']))
							{
							$req = $bdd->prepare('UPDATE membres SET cp = :cp WHERE id=:id');
							$req->execute(array('cp' => $_POST['cp'], 'id' => $_SESSION['id']));
							$req->closeCursor();
						}
						if (isset($_POST['ville']))
							{
							$req = $bdd->prepare('UPDATE membres SET ville = :ville WHERE id=:id');
							$req->execute(array('ville' => $_POST['ville'], 'id' => $_SESSION['id']));
							$req->closeCursor();
						}
					}
					catch (Exception $e)
					{
						die('Erreur : ' . $e->getMessage());
					}
                    header("Refresh:0; url=index.php?p=EspacePerso");
				}
		?>
	</body>
</html>