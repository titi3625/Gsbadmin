<?php
session_start();
if ($_SESSION['auth'] == 'no')
{
	header ('Location: admin.php');
	exit();
}
elseif ($_SESSION['droit']!="commande")
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
	<link href="styletibo.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div id="header">
	<div id="menu">
		<ul>
			<li><a href="#" class="first">Accueil</a></li>
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
							<h2 class="title"><a href="commande.php"><center>Gestion des Commandes</center></a></h2>
							
							<?php include("include/connectionBDD.php"); ?>
							<br />
							<div class="tabs"> <!-- div contenant les onglets -->
								<a href="#liste">Liste des commandes</a>
								<a href="#statist">Statistiques</a>
							</div>

							<div id="contenu">
								
								<div id="liste"> <!-- premier onglet - Liste des commandes -->	
									<label>Rechercher par nom : </label>
									<input type="text" name="search" id="inputString" /> <!-- champs de recherche -->
									<a href="#" id="recherche" class="button">Rechercher</a> <!-- bouton de recherche et bouton reset -->
									<a href="#" class="button" onclick="location.reload();">Reset</a>
									
									<!-- requete de liste de commande -->
									<?php $reponse = $bdd->query('SELECT * FROM COMMANDE NATURAL JOIN POSSEDER NATURAL JOIN STATUT_COMMANDE NATURAL JOIN MODE_PAIEMENT'); ?>
									
									<table id="tablocommande">
										<caption>Liste des commandes</caption>
										<thead>
											<tr>
												<th>N° de commande</th>
												<th>Description</th>
												<th>Adresse</th>
												<th>Nom</th>
												<th>Prenom</th>
												<th>N° Client</th>
												<th>Mode de paiement</th>
												<th>N° Facture</th>
												<th>Statut commande</th>
											</tr>
										</thead>
										<tbody>
											<?php
											while ($donnees = $reponse->fetch())
											{
											?>
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
											<?php
											}
											$reponse->closeCursor();
											?>
											
										</tbody>
									</table>

									<div class="erreur">La recherche n'a retournée aucun resultat</div> <!-- erreur de recherche -->
	
								</div> <!-- fin du premier onglet -->

								<div id="statist"> <!-- deuxieme onglet - statistique-->
									<?php 
									$reponse3 = $bdd->query('SELECT COUNT(id_commande) AS nbcomm, date_commande FROM COMMANDER GROUP BY date_commande ORDER BY date_commande DESC LIMIT 0, 7');
									?>
									<table>
										<caption>Statistiques</caption>
										<tr>
											<th style="padding:2px 5px;">Date</th>
											<th style="padding:2px 5px;">Nombre de commande effectuées</th>
											
										</tr>
										<?php
										while ($donnees3 = $reponse3->fetch())
										{
										?>
											<tr>
													<th style="padding:2px 5px;"><?php echo $donnees3['date_commande']; ?></th>
													<th style="padding:2px 5px;"><?php echo $donnees3['nbcomm']; ?></th>
													
											</tr>
										<?php 
										} 
										$reponse3->closeCursor(); 
										?>
									</table>
									<br/>
									<br/>
									<table>
										<?php
										$reponse4 = $bdd->query('SELECT COUNT(id_commande) AS nbcomm FROM POSSEDER NATURAL JOIN STATUT_COMMANDE WHERE id_statut_commande = 1');
										$donnees4 = $reponse4->fetch();
										?>
										<tr>
											<th style="padding:2px 5px;">Nombre de commande en cours</th>
											<th style="padding:2px 5px;"><?php echo $donnees4['nbcomm']; ?></th>
											
										</tr>
										<?php
										$reponse5 = $bdd->query('SELECT COUNT(id_commande) AS nbcommm FROM POSSEDER NATURAL JOIN STATUT_COMMANDE WHERE id_statut_commande = 2');
										$donnees5 = $reponse5->fetch();
										?>
										<tr>
											<th style="padding:2px 5px;">Nombre de commande expédiées</th>
											<th style="padding:2px 5px;"><?php echo $donnees5['nbcommm']; ?></th>
											
										</tr>
									</table>
	
								</div> <!-- fin du deuxieme onglet -->

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end #content -->
			<?php include("include/menu.php"); ?>
			<!-- end #sidebar -->
		</div>
	</div>
</div>
<div id="footer">
	<p>Projet PPE - 2012-2013</p>
</div>
<!-- end #footer -->
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/filter.js"></script>
</body>
</html>
<?php } ?>
