<?php
session_start();
if (!isset($_SESSION['login_admin'])) 
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
	$bdd->exec("DELETE FROM client WHERE id_client = ".strip_tags($_GET['id'])."");
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	print('<script>alert("Client supprimer avec succès");</script>');
	header("Refresh: 0; URL=../client.php" ); 
}
?>