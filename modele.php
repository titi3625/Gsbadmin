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
								include("include/bdd.php");							
								// Si tout va bien, on peut continuer

								// On récupère tout le contenu de la table jeux_video
								$reponse = $bdd->query('SELECT * FROM client');

								// On affiche chaque entrée une à une
								while ($donnees = $reponse->fetch())
								{
									echo $donnees['nom_client'];
								}

								$reponse->closeCursor(); // Termine le traitement de la requête

								?>


							<br/><br/><br/><br/>
							
						</div>
					</div>
				</div>
			</div>
			<!-- end #content -->
			<div id="sidebar">
				<ul>
					<li>
						<h2>Catalogue </h2>
						<ul>
							<li><a href="#">Produits 1</a></li>
							<li><a href="#">Produits 2</a></li>
							<li><a href="#">Produits 3</a></li>
							<li><a href="#">Produits 4</a></li>
							<li><a href="#">Produits 5</a></li>
							<li><a href="#">Produits 6</a></li>
							<li><a href="#">Produits 7</a></li>
							<li><a href="#">Produits 8</a></li>
						</ul>
					</li>
	
				</ul>
			</div>
			<!-- end #sidebar -->
		</div>
	</div>
</div>
<div id="footer">
	<p>Projet PPE - 2012 - Ferreira ALexandre</p>
</div>
<!-- end #footer -->
</body>
</html>
