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
{
 include("bdd.php"); 
	$bdd->exec(" INSERT INTO CLIENT(id_client, nom_client, prenom_client, tel_client, email_client, pseudo_client, mdp_client) VALUES('', '" . strip_tags($_POST['nom']). "', '" . strip_tags($_POST['prenom']). "', '" . strip_tags($_POST['tel']). "', '" . strip_tags($_POST['email']). "', '" . strip_tags($_POST['identifiant']). "', '0000') ");
	print('<script>alert("Client ajouter avec succès");</script>');
	header("Refresh: 0; URL=../client.php" ); 
}
?>
