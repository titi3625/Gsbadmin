<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title></title>

	<?php
	include('connectionBDD.php');
	$search = $_POST['val']; // on reprend la variable contenant le mot-clé depuis commande.php
	$reponse12 = $bdd->query('SELECT * FROM COMMANDE NATURAL JOIN POSSEDER NATURAL JOIN MODE_PAIEMENT NATURAL JOIN STATUT_COMMANDE WHERE nom_livraison LIKE "%'.$search.'%" LIMIT 0, 20');
	?>
</head>
<body>
	<table>
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
		while($donnees12 = $reponse12->fetch())
		{ ?>
		<tr>
			<th><?php echo $donnees12['id_commande']; ?></th>
			<th><?php echo $donnees12['description_commande']; ?></th>
			<th><?php echo $donnees12['adresse_livraison'].' '.$donnees12['cp_livraison'].' '.$donnees12['ville_livraison']; ?></th>
			<th><?php echo $donnees12['nom_livraison']; ?></th>
			<th><?php echo $donnees12['prenom_livraison'];?></th>
			<th><?php echo $donnees12['id_client'];?></th>
			<th><?php echo $donnees12['type_mode_paiement'];?></th>
			<th><?php echo $donnees12['id_facture'];?></th>
			<th><?php echo $donnees12['nom_statut_commande'];?></th>
		</tr>
		<?php } ?>
	</tbody>
	</table>
</body>
</html>

