
function rafraichirIp(){
$(document).ready( function(){
	// BLOQUER L'ENVOI DU FORMULAIRE
		console.log("JE PRENDS LA MAIN");

	// ON VA ENVOYER LE FORMULAIRE EN AJAX
	// ON RECUPERE LES INFOS DU FORMULAIRE
	var formData = new FormData(this);

	// urlAJax A DETERMINER
	$.ajax({
		method:         "GET",
		url:            urlAjax,
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
	});

});
}
rafraichirIp();
setInterval(rafraichirIp, 20000);

function rafraichirRadio(){
	$(document).ready( function(){
		// BLOQUER L'ENVOI DU FORMULAIRE
			console.log("JE PRENDS LA MAIN");
	
		// ON VA ENVOYER LE FORMULAIRE EN AJAX
		// ON RECUPERE LES INFOS DU FORMULAIRE
		var formData = new FormData(this);
	
		// urlAJax A DETERMINER
		$.ajax({
			method:         "GET",
			url:            urlAjax1,
			data:           formData,
			contentType:    false,
			processData:    false
		})
		.done(function(response){
			// CETTE FONCTION SERA APPELEE 
			// QUAND LE NAVIGATEUR VA RECEVOIR LE REPONSE DU SERVEUR
			// JE VAIS AFFICHER response DANS LA BALISE .response
			console.log(response);
		   $("#tableRadio").load(urlAjax1);
		});
	
	});
	}
	rafraichirRadio();
	setInterval(rafraichirRadio, 20000);

function rafraichirGeze(){
	$(document).ready( function(){
		// BLOQUER L'ENVOI DU FORMULAIRE
			console.log("JE PRENDS LA MAIN");
	
		// ON VA ENVOYER LE FORMULAIRE EN AJAX
		// ON RECUPERE LES INFOS DU FORMULAIRE
		var formData = new FormData(this);
	
		// urlAJax A DETERMINER
		$.ajax({
			method:         "GET",
			url:            urlAjax2,
			data:           formData,
			contentType:    false,
			processData:    false
		})
		.done(function(response){
			// CETTE FONCTION SERA APPELEE 
			// QUAND LE NAVIGATEUR VA RECEVOIR LE REPONSE DU SERVEUR
			// JE VAIS AFFICHER response DANS LA BALISE .response
			console.log(response);
			$("#tableGeze").load(urlAjax2);
		});
	
	});
	}
	rafraichirGeze();
	setInterval(rafraichirGeze, 20000);


function rafraichirEtatSysteme(){
	$(document).ready( function(){
		// BLOQUER L'ENVOI DU FORMULAIRE
			console.log("JE PRENDS LA MAIN");
	
		// ON VA ENVOYER LE FORMULAIRE EN AJAX
		// ON RECUPERE LES INFOS DU FORMULAIRE
		var formData = new FormData(this);
	
		// urlAJax A DETERMINER
		$.ajax({
			method:         "GET",
			url:            urlAjax3,
			data:           formData,
			contentType:    false,
			processData:    false
		})
		.done(function(response){
			// CETTE FONCTION SERA APPELEE 
			// QUAND LE NAVIGATEUR VA RECEVOIR LE REPONSE DU SERVEUR
			// JE VAIS AFFICHER response DANS LA BALISE .response
			console.log(response);
			$("#tableSysteme").load(urlAjax3);
		});
	
	});
	}
	rafraichirEtatSysteme();
	setInterval(rafraichirEtatSysteme, 20000);
