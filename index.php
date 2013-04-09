<?php session_start(); // Ouverture Session ?>
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
							if(!isset($_GET['verif']))
							{	?>
							<form class="form_connexion" action="?verif" method="post" enctype="multipart/form-data">
								<table align="center">
									<tr>
										<td><label>Utilisateur : </label></td>
										<td><input type="text" name="login" /></td>
									</tr>
									<tr>
										<td><label>Mot de passe : </label></td>
										<td><input type="password" name="mdp" /></td>
									</tr>
									<tr>
										<td colspan="2" align="center"><input type="submit" value="Connexion" /></td>
									</tr>
								</table>
		    					<br/> 
		    					<br/>			

								
					<?php	}
							else
							{
								
								$login = $_POST['login'];
								$mdp  = $_POST['mdp'];

								if ($login==null AND $mdp==null)
								{
									//print('<script>alert("Aucunes données saisies");</script>');
									//echo '<meta http-equiv="refresh" content="0; URL=../connexion.php">';
									header ("Refresh: 3;URL=index.php");
									echo 'Aucunes données saisies';
								}
								else
								{
									include("include/bdd.php");							
									// Si tout va bien, on peut continuer

									// On récupère tout le contenu de la table
									$req1 = $bdd->query("SELECT pseudo_admin, mdp_admin FROM admin WHERE pseudo_admin='$login' AND mdp_admin='$mdp'");

									$verif = $req1->fetch();
									if ($login==$verif['pseudo_admin'] AND $mdp==$verif['mdp_admin']) // Vérification si login et mdp sont correct.
									{
										

										// On récupère tout le contenu de la table ADMIN
										$reponse = $bdd->query("SELECT * FROM admin WHERE pseudo_admin='$login' and mdp_admin='$mdp'");

										if ($donnees = $reponse->fetch())
										{
											//Stockage des résultats dans les variables de Session
											$_SESSION['droit']=$donnees['droit_admin'];
											$_SESSION['login_admin'] = $login;
											$_SESSION['mdp_login'] = $mdp;
											$_SESSION['auth'] = "yes";
										}

										$reponse->closeCursor(); // Termine le traitement de la requête
										header ("Refresh: 3;URL=admin.php");
										echo '<center>Connexion en cours</center>';

									}
									else
									{
										header ("Refresh: 3;URL=index.php");
										echo 'Problème de connexion';
										$_SESSION['auth'] = "no";
									}
									$req1->closeCursor(); // Termine le traitement de la requête
								}	

							}
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
						<h2>Menu </h2>
						<ul>
							<li><a href="#">Accueil</a></li>
							<li><a href="#" onclick="alert('Veuillez vous connecter');">Gestion des commandes</a></li>
							<li><a href="#" onclick="alert('Veuillez vous connecter');">Gestion des produits</a></li>
							<li><a href="#" onclick="alert('Veuillez vous connecter');">Gestion des utilisateurs</a></li>
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
