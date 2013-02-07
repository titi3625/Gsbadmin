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
				<li><a href="index.php" class="first">Accueil</a></li>
				<li class="current_page_item"><a href="#">Connexion</a></li>
				<li><a href="#">S'enregistrer</a></li>
				
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
									<div id="contenu">
										<?php include("include/bdd.php");
										$reponse = $bdd->query("SELECT * FROM CLIENT NATURAL JOIN COMMANDE NATURAL JOIN POSSEDER NATURAL JOIN STATUT_COMMANDE NATURAL JOIN MODE_PAIEMENT WHERE id_client='".strip_tags($_GET['id'])."'");
										while ($donnees = $reponse->fetch())
										{
										?>
										<center>
											<br/>
											<table id="tablocommande">
												<caption>Liste des commandes de <?php echo $donnees['prenom_client']; ?>  <?php echo $donnees['nom_client']; ?></caption>
												<thead>
													<tr>
														<th>N° de commande</th>
														<th>Description de livraison</th>
														<th>Adresse de livraison</th>
														<th>Nom de livraison</th>
														<th>Prenom de livraison</th>
														<th>N° Client</th>
														<th>Mode de paiement</th>
														<th>N° Facture</th>
														<th>Statut commande</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th><?php echo $donnees['id_commande']; ?></th>
														<th><?php echo $donnees['description_commande'] ?></th>
														<th><?php echo $donnees['adresse_livraison'].' '.$donnees['cp_livraison'].' '.$donnees['ville_livraison']; ?></th>
														<th><?php echo $donnees['nom_livraison']; ?></th>
														<th><?php echo $donnees['prenom_livraison']; ?></th>
														<th><?php echo $donnees['id_client']; ?></th>
														<th><?php echo $donnees['type_mode_paiement']; ?></th>
														<th><?php echo $donnees['id_facture']; ?></th>
														<th><?php echo $donnees['nom_statut_commande']; ?></th>
													</tr>
												</tbody>
											</table>
										</center>
										<?php
										}
										$reponse->closeCursor();
										?>

										<a href="client.php#num"><- Retour</a>
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