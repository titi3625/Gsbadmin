<table id="tablocommande">
	<caption>Liste des clients</caption>
	<thead>
		<tr>
			<th></th>
			<th>N° de client</th>
			<th>Nom du client</th>
			<th>Prenom du client</th>
			<th>Téléphone du client</th>
			<th>Adresse email</th>
			<th>Pseudo du client</th>
			<th>Liste des commandes</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($donnees = $reponse->fetch())
		{
		?>
			<tr>
				<th><a href="modifier_client.php?id=<?php echo $donnees['id_client']; ?>">Modifier</a>/<a href="include/supprimer_client.php?id=<?php echo $donnees['id_client']; ?>" onclick="if (window.confirm('Etes vous sur de supprimer le client ?')){location.href='default.htm';return true;} else {return false;}">Supprimer</a></th>
				<th><?php echo $donnees['id_client']; ?></th>
				<th><?php echo $donnees['nom_client'] ?></th>
				<th><?php echo $donnees['prenom_client']; ?></th>
				<th><?php echo $donnees['tel_client']; ?></th>
				<th><?php echo $donnees['email_client']; ?></th>
				<th><?php echo $donnees['pseudo_client']; ?></th>
				<th><a href="client_detail.php?id=<?php echo $donnees['id_client']; ?>">Voir</a></th>
			</tr>
		<?php
		}
		$reponse->closeCursor();
		?>
		
	</tbody>
</table>