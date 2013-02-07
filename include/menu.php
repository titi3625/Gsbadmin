<?php
if($_SESSION['droit']=="commande")
{
?>
	<!-- end #content -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Menu </h2>
				<ul>
					<li><a href="admin.php">Accueil</a></li>
					<li><a href="commande.php">Gestion des commandes</a></li>
					<li><a href="produit.php">Gestion des produits</a></li>
					<li><a href="#" onclick="alert('Vous avez pas les droits nécessaires');">Gestion des utilisateurs</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- end #sidebar -->
<?php
}
elseif($_SESSION['droit']=="client")
{	?>
	<!-- end #content -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Menu </h2>
				<ul>
					<li><a href="admin.php">Accueil</a></li>
					<li><a href="#" onclick="alert('Vous avez pas les droits nécessaires');">Gestion des commandes</a></li>
					<li><a href="#" onclick="alert('Vous avez pas les droits nécessaires');">Gestion des produits</a></li>
					<li><a href="client.php">Gestion des utilisateurs</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- end #sidebar -->
<?php	
}
?>