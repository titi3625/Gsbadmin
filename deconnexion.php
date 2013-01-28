<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	if(isset($_GET['deconnect']))
	{
		session_start();  
		session_unset();  
		session_destroy();  
		echo '<script>alert("Déconnexion reussie");</script>';
		header("Refresh: 0; URL=index.php"); 
		exit(); 									
	} 
	else 
	{
		session_start();
		if($_SESSION['auth'] == 'no') 
		{
			header('Location: index.php');
			exit();
		}
	}
?>
				