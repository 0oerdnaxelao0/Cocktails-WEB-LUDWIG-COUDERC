<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<style type="text/css"> 
			.ok {
   				}
			.error
    			{  
					background-color: red;
				}
	  </style>
		<title>Formulaire</title>
	</head>
	<body>
		<?php  
	
			include("TabPays.inc.php");

			$ClassNom='ok';
			$ClassPrenom='ok';
			$ClassAdresse='ok';
			$ClassCP='ok';
			$ClassVille='ok';
			$ClassPays='ok';

			if(isset($_POST['submit']))
			  { 
				$ChampsIncorrects='';

				if(  (!isset($_POST['nom']))
				   ||(strlen(trim($_POST['nom']))<2)
				  )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Nom</li>';
					$ClassNom='error';
				  }
				else $ClassNom='ok';

				if(  (!isset($_POST['prenom']))
				   ||(!preg_match("#[a-z]#i",$_POST['prenom']))
				   ||(preg_match("#[^a-z ]#i",$_POST['prenom'])) 
				  )      
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Prénom</li>';
					$ClassPrenom='error';
				  }
				else $ClassPrenom='ok';
				  
				if(  (!isset($_POST['adresse']))
				   ||(!preg_match('/[0-9]+,.*/',$_POST['adresse']))
					   )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Adresse</li>';
					$ClassAdresse='error';
				  }
				else $ClassAdresse='ok';
				  
				if(  (!isset($_POST['cp']))
				   ||(!preg_match('/[0-9]{4,5}/',$_POST['cp']))
					   )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Code Postal</li>';
					$ClassCP='error';
				  }
				else $ClassCP='ok';
				  
				if(  (!isset($_POST['ville']))
				   ||(strlen(trim($_POST['ville']))<2)
					   )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Ville</li>';
					$ClassVille='error';
				  }
				else $ClassVille='ok';

				if(  (!isset($_POST['pays']))
				   ||(!preg_match('#^[ ]*f#i',$_POST['pays']))
				  )
				  { $ChampsIncorrects=$ChampsIncorrects.'<li>Pays</li>';
					$ClassPays='error';
				  }
				else $ClassPays='ok';
			  }
		?>
		<form method="post" action="#" >
					<fieldset>
						<legend>Informations personnelles</legend>
						<p>Vous êtes :</p>
						<p>Nom :</p> 
						<input type="text" class="<?php echo $ClassNom; ?>" name="nom" required="required" 
							   value="<?php if(isset($_POST['nom']))  echo $_POST['nom']; ?>"/>
						<p>Prénom :</p> 
						<input type="text" class="<?php echo $ClassPrenom; ?>" name="prenom" 
							   value="<?php if(isset($_POST['prenom']))  echo $_POST['prenom']; ?>"/>	
						<p>Adresse :</p>
						<input type="text" class="<?php echo $ClassAdresse; ?>" name="adresse" required="required" 
							   value="<?php if(isset($_POST['adresse']))  echo $_POST['adresse']; ?>"/>
						<p>Code Postal :</p>
						<input type="text" class="<?php echo $ClassCP; ?>" name="cp" required="required" 
							   value="<?php if(isset($_POST['cp']))  echo $_POST['cp']; ?>"/>
						<p>Ville :</p>
						<input type="text" class="<?php echo $ClassVille; ?>" name="ville" required="required" 
							   value="<?php if(isset($_POST['ville']))  echo $_POST['ville']; ?>"/>
						<p>Pays :</p>
						<input name="pays" class="<?php echo $ClassPays; ?>" list="pays" 
							   value="<?php if(isset($_POST['pays'])) echo $_POST['pays']; ?>"/>
								<datalist id="pays">
								<?php
									foreach($paysInc as $p)
									{
										echo '<option value="'.$p.'" />';
									}
								?>
						</fieldset>
						<input type="submit" name="submit" value="Valider" />
				</form>

				<?php 
						if(isset($_POST['submit']))
						{
							
							if($ChampsIncorrects=='')
							{ 
								setcookie("nom", $_POST['nom']);
								setcookie("prenom", $_POST['prenom']);
								setcookie("adresse", $_POST['adresse']);
								setcookie("cp", $_POST['cp']);
								setcookie("ville", $_POST['ville']);
								setcookie("pays", $_POST['pays']);
							}
							if($ChampsIncorrects!='') 
							echo '
								<br />
									Merci de remplir correctement les champs ci-dessous :
									<ul> 
										'.$ChampsIncorrects.'
									</ul>';
						}
				?>
	</body>
</html>