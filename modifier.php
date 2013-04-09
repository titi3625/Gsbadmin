<?php
session_start();
if (!isset($_SESSION['login_admin'])) 
{
	header ('Location: admin.php');
	exit();
}
elseif ($_SESSION['droit']!="client")
{
	header ('Location: admin.php');
}
else
{	?>

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
								<h2 class="title"><a href="#"><center>Bienvenue sur GSB</center></a></h2>
								<?php
								if(!isset($_GET['modif']))
								{	?>
										<?php include("include/bdd.php");
										$reponse = $bdd->query("SELECT * FROM client WHERE id_client='".strip_tags($_GET['id'])."'");	?>
										<?php
										while ($donnees = $reponse->fetch())
										{
										?>
										<center>
											<h1>Modifier le client </h1>
											<form action="#" method="post" enctype="multipart/form-data">
												<label>Circuit : </label><input type="text" name="nom" value="<?php echo $donnees['id_client']; ?>"/><br/>
												<label>Type : </label><input type="text" name="type"/><br/>
												<label>Application : </label><input type="text" name="application"/><br/>
												<input type="button" onClick="alert('Vous pouvez pas effectuer cette action, ceci est un site démo.')" value="Valider">
											</form>				
											<br/><br/><br/><br/>
										</center>
								  <?php } $reponse->closeCursor(); ?>
								<?php
								}
								else
								{
									echo "test";								
								}
								?>
							</div>
						</div>
					</div>
				</div>
			<?php include("include/menu.php"); ?>
			</div>
		</div>
	</div>
	<div id="footer">
		<p>Projet PPE - 2012 - Ferreira ALexandre</p>
	</div>
	<!-- end #footer -->
	</body>
	</html>
<?php
}
?>