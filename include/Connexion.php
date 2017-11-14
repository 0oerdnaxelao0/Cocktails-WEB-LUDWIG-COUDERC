<?php session_start() ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulaire</title>
	</head>
	<body>
		<?php
			$ClassLogin='ok';
			$ClassMdp='ok';
			$ClassNom='ok';
			$ClassPrenom='ok';
			$ClassSexe='ok';
			$ClassEMail='ok';
			$ClassNaissance='ok';
			$ClassAdresse='ok';
			$ClassCP='ok';
			$ClassVille='ok';
			$ClassTel='ok';

			if(isset($_POST['submit']))
			  { 
				$ChampsIncorrects='';

				//LOGIN
				if(  (!isset($_POST['login']))
				   ||(strlen(trim($_POST['login']))<6)
				  )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Login</li>';
					$ClassLogin='error';
				  }
				
				
				//MDP
				if(  (!isset($_POST['mdp']))
				   ||(strlen(trim($_POST['mdp']))<6)
				  )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Mot de passe</li>';
					$ClassMdp='error';
				  }
				
				
				/*
				//NOM
				if(  (!isset($_POST['nom']))
				   ||(strlen(trim($_POST['nom']))<2)
				  )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Nom</li>';
					$ClassNom='error';
				  }
				else $ClassNom='ok';

				
				//PRENOM
				if(  (!isset($_POST['prenom']))
				   ||(!preg_match("#[a-z]#i",$_POST['prenom']))
				   ||(preg_match("#[^a-z ]#i",$_POST['prenom'])) 
				  )      
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Prénom</li>';
					$ClassPrenom='error';
				  }
				else $ClassPrenom='ok';
				
				
				//SEXE
				if((!isset($_POST['sexe']))||((trim($_POST['sexe'])!='f')&&(trim($_POST['sexe'])!='h')))
      			{
					$ChampsIncorrects=$ChampsIncorrects.'<li>sexe</li>';
	    			$ClassSexe='error';
				}
				else $ClassSexe='ok';
				
				
				//EMAIL
				*/
				
				//ADRESSE
				//if(  (!isset($_POST['adresse']))
				 //  ||(!preg_match('/[0-9]+,.*/',$_POST['adresse']))
				/*	   )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Adresse</li>';
					$ClassAdresse='error';
				  }
				else $ClassAdresse='ok';
				  
				
				//CODE POSTAL
				if(  (!isset($_POST['cp']))
				   ||(!preg_match('/[0-9]{4,5}/',$_POST['cp']))
					   )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Code Postal</li>';
					$ClassCP='error';
				  }
				else $ClassCP='ok';
				  
				
				//VILLE
				if(  (!isset($_POST['ville']))
				   ||(strlen(trim($_POST['ville']))<2)
					   )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Ville</li>';
					$ClassVille='error';
				  }
				else $ClassVille='ok';
				*/
			  }
		?>
		<form method="post" action="#" >
			<fieldset>
				<legend>Informations personnelles</legend>
				<p>Nom d'Utilisateur* (6 caractères min) :</p>
				<input id="Obligatoire" type="text" class="<?php echo $ClassLogin; ?>" name="login" required="required" value="<?php if(isset($_POST['login']))  echo $_POST['login']; ?>"/>
				<p>Mot de Passe* (8 caractères min) :</p>
				<input id="Obligatoire" type="password" class="<?php echo $ClassMdp; ?>" name="mdp" required="required" value="<?php if(isset($_POST['mdp']))  echo $_POST['mdp']; ?>"/>
				<p>Nom :</p> 
				<input type="text" class="<?php echo $ClassNom; ?>" name="nom" value="<?php if(isset($_POST['nom']))  echo $_POST['nom']; ?>"/>
				<p>Prénom :</p> 
				<input type="text" class="<?php echo $ClassPrenom; ?>" name="prenom" value="<?php if(isset($_POST['prenom']))  echo $_POST['prenom']; ?>"/>	
				<p>Sexe :</p>
				<input id="radio" type="radio" class="<?php echo $ClassSexe; ?>" name="sexe" value="f" <?php if((isset($_POST['sexe']))&&($_POST['sexe'])=='f') echo 'checked="checked"'; ?> /> <p id="radio">Feminin </p>	
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
				<div id="Obl">*Champs Obligatoires</div>
			</fieldset>
		</form>

				<?php 
						if(isset($_POST['submit']))
						{
							
							if($ChampsIncorrects=='')
							{ 
								$_SESSION["Login"] = $_POST['Login'];
								$_SESSION["Mdp"] = $_POST['Mdp'];
								if(isset($_POST["nom"]))
									$_SESSION["nom"] = $_POST["nom"];
								if(isset($_POST["prenom"]))
									$_SESSION["prenom"] = $_POST["prenom"];
								if(isset($_POST["sexe"]))
									$_SESSION["sexe"] = $_POST["sexe"];
								if(isset($_POST["EMail"]))
									$_SESSION["EMail"] = $_POST["EMail"];
								if(isset($_POST["naissance"]))
									$_SESSION["naissance"] = $_POST["naissance"];
								if(isset($_POST["adresse"]))
									$_SESSION["adresse"] = $_POST["adresse"];
								if(isset($_POST["CP"]))
									$_SESSION["CP"] = $_POST["CP"];
								if(isset($_POST["Ville"]))
									$_SESSION["Ville"] = $_POST["Ville"];
								
							}
							if($ChampsIncorrects!='') 
							echo '
								<br />
									Merci de remplir les champs ci-dessous :
									<ul> 
										'.$ChampsIncorrects.'
									</ul>';
						}
				?>
	</body>
</html>