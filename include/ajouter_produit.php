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
	include("bdd.php"); 
	$req = $bdd->prepare('INSERT INTO produit (nom_produit, description_produit, quantite_produit, prix_produit) VALUES (:nom_produit, :description_produit, :quantite_produit, :prix_produit)');
	$req->execute(array(
	'nom_produit' => @$_POST['nom_produit'],
	'description_produit' => @$_POST['description_produit'],
	'quantite_produit' => @$_POST['quantite_produit'],
	'prix_produit' => @$_POST['prix_produit'],));
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	print('<script>alert("Produit ajouté avec succès");</script>');
	header("Refresh: 0; URL=../produit.php" ); 
}
?>