jQuery(function($) {
	$('#reponsesearch').hide(); // on cache la div contenant le resultat de la recherche
	$('.erreur').hide(); // ainsi que l'erreur
	$('#recherche').click(function() {
		var val = $('#inputString').val(); // on recupere le contenu de l'input contenant le mot-clé
		if(val != null) { // si val est vide on affiche une popup d'erreur
			console.log(val); 
			$('#tablocommande').hide(); // on cache le tableau contenant la liste complete
			$.post('include/recherche.php', {val: ""+val+""}, function(data) { // requete ajax utilisant recherche.php
				$('#reponsesearch').html(data).show(); // on affiche le tableau du resultat de la recherche dans la div reponsesearch et on l'affiche
			});
			
			
		}
		else {
			alert("Vous devez saisir un nom à rechercher");
			console.log("Variable val vide !");
		}
		
	});


});