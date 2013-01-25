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
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

		<script type="text/javascript" src="js/autocompletion/jquery-1.2.1.pack.js"></script>
		<script type="text/javascript" src="js/autocompletion/autocompletion.js"></script>

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
								<h2 class="title"><a href="#"><center>Gestion des Clients</center></a></h2>
								<center>
									<form action="#statist" method="post" enctype="multipart/form-data"><br/>
										<label>Rechercher par nom : </label>
										<input type="text" size="19" name="search" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
										<input type='submit' width='17' value='Rechercher'>
										<div class="suggestionsBox" id="suggestions" style="display: none;">
											<img src="images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
											<div class="suggestionList" id="autoSuggestionsList">
												&nbsp;
											</div>
										</div>
									</form>
								</center>
								<br/>
								<?php include("include/bdd.php"); ?>

								<div class="tabs">
									<a href="#num">Trier par numéro de client</a>
									<a href="#alpha">Trier par ordre alphabétique</a>
									<a href="#ajout">Ajouter un client</a>
									<a href="#statist"></a>
								</div>

								<div id="contenu">
									<div id="num">
										<?php $reponse = $bdd->query('SELECT * FROM CLIENT ORDER BY id_client ASC'); 
										include("include/client.php");	?>
									</div>
									<div id="alpha">
										<?php $reponse = $bdd->query('SELECT * FROM CLIENT ORDER BY nom_client ASC'); 
										include("include/client.php");	?>
									</div>
									<div id="statist">
										<?php $reponse = $bdd->query("SELECT * FROM CLIENT WHERE nom_client LIKE  '%".strip_tags($_POST['search'])."%' "); 
										include("include/client.php"); ?>
									</div>

									<div id="ajout">

									<fieldset>
										<legend>Ajouter un client</legend>
										<center>
											<form action="include/ajouter_client.php" method="post" enctype="multipart/form-data">
												<label>Nom : </label><input type="text" name="nom" style='width:150px'/>
												<label>Prénom : </label><input type="text" name="prenom" style='width:150px'/><br/>
												<label>Téléphone : </label><input type="text" name="tel" style='width:150px'/>
												<label>Email : </label><input type="text" name="email" style='width:150px'/><br/>
												<label>Identifiant : </label><input type="text" name="identifiant" style='width:150px'/><br/><br/>
												<input type="submit" value="Ajouter" />
											</form>

										</center>			
									</fieldset>
								
									</div>	
								</div>
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
?>