<?php
		include("bdd.php");
		// Is there a posted query string?
		if(isset($_POST['queryString'])) 
		{
			$queryString = strip_tags($_POST['queryString']);
			// Is the string length greater than 0?
			
			if(strlen(strip_tags($queryString)) >0) 
			{
				$reponse = $bdd->query("SELECT DISTINCT(nom_client) FROM CLIENT WHERE nom_client LIKE '$queryString%' LIMIT 10");
				if($reponse) 
				{
					while ($donnees = $reponse->fetch()) 
					{
						// Format the results, im using <li> for the list, you can change it.
						// The onClick function fills the textbox with the result.
						
						// YOU MUST CHANGE: $result->value to $result->your_colum
	         			echo '<li onClick="fill(\''.$donnees['nom_client'].'\');">'.$donnees['nom_client'].'</li>';
	         		}
				}	
				
				else {
					echo 'ERROR: There was a problem with the query.';
				}			
			}
	
		} 
		else 
		{
			echo 'There should be no direct access to this script!';
		}
	
?>
