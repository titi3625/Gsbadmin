<!DOCTYPE HTML>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php
	include("connectionBDD.php");
	$search = $POST_['valprod'];
	$reponse2 = $bdd->query('SELECT * FROM PRODUIT WHERE id_produit = "%'$search'%" LIMIT 0,20');
	while($donnees2 = $reponse2->fetch()) {
	?>
		<p id="content"><?php echo $donnees2['id_produit']." ".$donnees2['nom_produit']." ".$donnees2['description_produit']." ".$donnees2['quantite_produit']." ".$donnees2['prix_produit']; ?></p>
		
	<?php 
	}
	?>


</body>
</html>
