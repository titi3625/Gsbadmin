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
	$bdd->exec("DELETE FROM produit WHERE id_produit = ".strip_tags($_POST['id'])."");
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	print('<script>alert("Produit supprimer avec succès");</script>');
	header("Refresh: 0; URL=../produit.php" ); 
}
?>