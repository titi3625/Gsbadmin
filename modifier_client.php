<?php
session_start();
if ($_SESSION['auth'] == 'no') 
{
	header ('Location: admin.php');
	exit();
}
elseif ($_SESSION['droit']!="client")
{
	header ('Location: admin.php');
}
else
{	
	if(!isset($_GET['modif']))
	{
?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>GSB-Administration</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="stylealex.css" rel="stylesheet" type="text/css" media="screen" />
		</head>
		<body>
		<div id="header">
			<div id="menu">
				<ul>
					<li><a href="#" class="first">Accueil</a></li>
					<li class="current_page_item"><a href="#">Connexion</a></li>
					<li><a href="#">S'enrenegistrer</a></li>
					
				</ul>
			</div>
			<!-- end #menu -->
		</div>
		<!-- end #header -->
		<div id="logo"></div>
		<hr />
		<!-- end #logo -->
		<div id="page">
			<div id="page-bgtop">
				<div id="page-bgbtm">
					<div id="content">
						<div class="post">
							<div class="post-bgtop">
								<div class="post-bgbtm">
									<h2 class="title"><a href="#"><center>Gestion des Clients : Modifier</center></a></h2><br/>
											<?php include("include/bdd.php");
											$reponse = $bdd->query("SELECT * FROM CLIENT WHERE id_client='".strip_tags($_GET['id'])."'");	?>
											<?php
											while ($donnees = $reponse->fetch())
											{
											?>
											<center>
												<fieldset>
													<legend>N° de client : <?php echo $donnees['id_client']; ?></legend>
													<form action="?modif" method="post" enctype="multipart/form-data">
														<input type="hidden"  name="id"  value="<?php echo $donnees['id_client']; ?>">
														<label>Nom : </label><input type="text" name="nom" value="<?php echo $donnees['nom_client']; ?>"/>
														<label>Prénom : </label><input type="text" name="prenom" value="<?php echo $donnees['prenom_client']; ?>" /><br/><br/>
														<label>Téléphone : </label><input type="text" name="tel" value="<?php echo $donnees['tel_client']; ?>" />
														<label>Email : </label><input type="text" name="mail" value="<?php echo $donnees['email_client']; ?>" /><br/><br/>
														<label>Identifiant : </label><input type="text" name="pseudo" value="<?php echo $donnees['pseudo_client']; ?>" /><br/><br/>
														<input type="submit" value="Valider" /><a href="client.php"><input type="button" value="Annuler"> </a>
													</form>				
												</fieldset>
											</center>
									  <?php } $reponse->closeCursor(); ?>
								</div>
							</div>
						</div>
					</div>
				<?php include("include/menu.php"); ?>
				</div>
			</div>
		</div>
		<div id="footer">
			<p>Projet PPE - 2012-2013</p>
		</div>
		<!-- end #footer -->
		</body>
		</html>
<?php
	}
	else
	{
		include("include/bdd.php"); 
		$bdd->exec("UPDATE CLIENT SET nom_client = '" . strip_tags($_POST['nom']). "', prenom_client = '" . strip_tags($_POST['prenom']). "', tel_client = '" . strip_tags($_POST['tel']). "', email_client = '" . strip_tags($_POST['mail']). "', pseudo_client = '" . strip_tags($_POST['pseudo']). "' WHERE id_client = ".strip_tags($_POST['id'])."");
		print('<script>alert("Client modifier avec succès");</script>');
		header("Refresh: 0; URL=client.php" ); 								
	}
}
?>