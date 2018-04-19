var table = document.getElementById("bornes-ip");
function Raffraichir(table)
{
	table = setTimeOut(2000);  
}
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
	   $("#tableIp").replaceWith(response);
	});

});
}
rafraichirIp();
//setInterval(rafraichirIp, 12000);

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
		   $("#tableRadio").replaceWith(response);
		});
	
	});
	}
	rafraichirRadio();
	//setInterval(rafraichirRadio, 12000);

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
			$("#tableGeze").replaceWith(response);
		});
	
	});
	}
	rafraichirGeze();
	//setInterval(rafraichirGeze, 12000);


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
			$("#tableSysteme").replaceWith(response);
		});
	
	});
	}
	rafraichirEtatSysteme();
	//setInterval(rafraichirEtatSysteme, 12000);
