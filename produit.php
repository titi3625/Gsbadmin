<?php
session_start();
if (!isset($_SESSION['login_admin'])) 
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
	<title>Administration - Produit</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="stylelili.css" rel="stylesheet" type="text/css" media="screen" />
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
							<h2 class="title"><a href="produit.php"><center>Gestion des Produits</center></a></h2>

							<?php include("include/connectionBDD.php"); ?>
							
							<br/><br/>

							<div class="tabs">
								<a href="#liste">Liste des produits</a>
								<a href="#ajoutproduit">Ajout de produit</a>
								<a href="#supprproduit">Supprimer un produit</a>
							</div>


							<div id="contenu">
								
								<div id="liste">
									<?php $reponse = $bdd->query('SELECT * FROM PRODUIT'); ?>
									<table id="tablocommande">
										<caption>Liste des produits</caption>
										<thead>
											<tr>
												<th>N° d'identification</th>
												<th>Nom</th>
												<th>Description</th>
												<th>Quantité en stock</th>
												<th>Prix unitaire</th>
											</tr>
										</thead>
										<tbody>
											<?php
											while ($donnees = $reponse->fetch())
											{
											?>
												<tr>
													<th><?php echo $donnees['id_produit']; ?></th>
													<th><?php echo $donnees['nom_produit'] ?></th>
													<th><?php echo $donnees['description_produit']; ?></th>
													<th><?php echo $donnees['quantite_produit']; ?></th>
													<th><?php echo $donnees['prix_produit']; ?> €</th>
												</tr>
											<?php
											}
											$reponse->closeCursor();
											?>
											
										</tbody>
									</table>
	
								</div>

								<div id="ajoutproduit">
									<h2>Ajout d'un produit</h2>


									<form method="post" action="produit.php#ajoutproduit">
 
										<table width="100%">
												<tr>
													<td><label for="nom_produit">Nom du produit :</label></td>
													<td><input type="text" name="nom_produit" id="nom_produit" pattern="[A-Za-z0-9._-]{2,30}" required></td>
												</tr>
												<tr>
													<td><label for="description_produit">Description du produit :</label></td>
													<td><textarea name="description_produit" id="description_produit" pattern="[A-Za-z0-9._-]{2,1000}" required></textarea></td>
												</tr>
												<tr>
													<td><label for="quantite_produit">Quantité de produit :</label></td>
													<td><input type="text" name="quantite_produit" id="quantite_produit" pattern="[0-9]{1,20}" required></td>
												</tr>
												<tr>
													<td><label for="prix_produit">Prix unitaire du produit :</label></td>
													<td><input type="text" name="prix_produit" id="prix_produit" pattern="[0-9]{1,20}" required></td>
												</tr>
												<tr>
													<td colspan="2" align="center"><input type=submit value=Ajouter id="submit" ></td>
												</tr>
											</table>	
					
										<?php

											//Requête pour insérer les variables dans la base de donnée gsbadmin dans la table PRODUIT
											$req = $bdd->prepare('INSERT INTO PRODUIT (nom_produit, description_produit, quantite_produit, prix_produit) VALUES (:nom_produit, :description_produit, :quantite_produit, :prix_produit)');
											$req->execute(array(
													'nom_produit' => $_POST['nom_produit'],
													'description_produit' => $_POST['description_produit'],
													'quantite_produit' => $_POST['quantite_produit'],
													'prix_produit' => $_POST['prix_produit'],
													));
										
											
											
										?>

									</form>

								</div>
	
								<div id="supprproduit">
									<h2>Supprimer un produit</h2>

									<p>ID du produit à supprimer : <input type="text" name="searchsupprod" id="searchsupprod" pattern="[0-9]{1,11}" required><input type="button" value="Rechercher" id="recherche"/></p>

									<p><div class="reponsesearch"></div></p>
	
								</div>
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
	<p>Projet PPE - 2012-2013 Copyright ThibaultCorp & PlopWorld</p>
</div>
<!-- end #footer -->
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/rechercheproduit.js"></script>
</body>
</html>
<?php } ?>