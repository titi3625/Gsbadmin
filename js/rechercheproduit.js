jQuery(function($) {
	$('.reponsesearch').hide();
	$('#recherche').click(function() {
		
		var valprod = $('#searchsupprod').val();
		if(valprod != "") {
			//$('.reponsesearch').html('<p align="center"><img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></p>').show();
			console.log(valprod);
			$.post('include/rechercheproduit.php', {valprod: ""+valprod+""}, function(data2) {
				var content = $(data2).find('#content');
				$('.reponsesearch').empty().append(content);
			});
		}
		else {
			alert("Vous devez saisir un identifiant de produit");
			console.log("Champs de recherche vide");
		}
	});
});