<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=gsbadmin', 'root', '');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
?>