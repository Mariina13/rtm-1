
function rafraichirDonnees(){
$(document).ready( function(){
	// BLOQUER L'ENVOI DU FORMULAIRE
		console.log("JE PRENDS LA MAIN");

	// ON VA ENVOYER LE FORMULAIRE EN AJAX
	// ON RECUPERE LES INFOS DU FORMULAIRE
	var formData = new FormData(this);

	// urlAJax A DETERMINER
	$.ajax({
		method:         "GET",
		url:            urlAjax,urlAjax1,urlAjax2,urlAjax3,
		data:           formData,
		contentType:    false,
		processData:    false
	})
	.done(function(response){
		// CETTE FONCTION SERA APPELEE 
		// QUAND LE NAVIGATEUR VA RECEVOIR LE REPONSE DU SERVEUR
		// JE VAIS AFFICHER response DANS LA BALISE .response
		console.log(response);
		
		$("#tableIp").load(urlAjax);
		$("#tableRadio").load(urlAjax1);
		$("#tableGeze").load(urlAjax2);
		$("#tableSysteme").load(urlAjax3);
	});

});
}
rafraichirDonnees();
setInterval(rafraichirDonnees, 30000);
