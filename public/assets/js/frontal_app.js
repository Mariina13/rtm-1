var table = document.getElementById("bornes-ip");
function Raffraichir(table)
{
	table = setTimeOut(2000);  
}
function rafraichir(){
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
	   $("tbody").after(response);
	});

});
}
rafraichir();
setInterval(rafraichir, 6000);

/**
 * Created by scomite on 26/04/2017.
 */

var xhr = null;
var i_automate = 0;
var nb_max_request = 2;

/**
 * Fonction d'execution du script sur la page web.
 */
    var select_line_table_ip;
    var objSelBorneIp;
    var select_line_table_radio;
	var objSelBorneRadio;
	// DEBUG
	console.log("debug");

	function raffraichirDonnees()
	{
		console.log("debug 2")
		
		xhr = getXMLHttpRequest();
		setInterval(executeRequest, 2000 / nb_max_request);
		
		// S�lection d'une borne dans la table borne_ip.
		$('#bornes-ip').find('tr').on('click'(function selectionIp()
		{
			select_line_table_ip = $(this).attr("id");

			if (select_line_table_ip != null)
			{
				objSelBorneIp = $(this);
				$(this).addClass('selected').siblings().removeClass('selected');
				if (objSelBorneRadio != null)
				{
					objSelBorneRadio.removeClass('selected');
				}
			}
		}));

		// S�lection d'une borne dans la table borne_radio.
		$('#bornes-radio').find('tr').on('click'(function selectionRadio()
		{
			select_line_table_radio = $(this).attr("id");

			if (select_line_table_radio != null)
			{
				objSelBorneRadio = $(this);
				$(this).addClass('selected').siblings().removeClass('selected');
				if (objSelBorneIp != null)
				{
					objSelBorneIp.removeClass('selected');
				}
			}
    	}));
	};


/**
 * Initialisation de l'objet XMLHttpRequest
 */
function getXMLHttpRequest()
{
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}


/**
 * Execution d'une requete sur le serveur
 */
function executeRequest()
{
	request(readData);
}


/**
 * Fonction de demande d'execution de script php sur le serveur
 */
function request(callback) {

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
        }
    };

	switch (i_automate)
	{
		case 0:
		{
			xhr.open("POST", "etat_bornes.php", true);
		}
		break;
		
		case 1:
		{
			xhr.open("POST", "etat_systeme.php", true);
		}
		break;
		
		default:
		{
		}
		break;
	}
    
    xhr.send(null);
}

/**
 * Mise � jour des donn�es bornes pour une table
 */
	function maj_etat_borne(ligne_table_borne, etat)
	{
		for (var i=1; i < ligne_table_borne.length; i++)
		{
			var cells = ligne_table_borne[i].cells;
					
			if (cells[0].innerText == etat[0] && cells[3].innerText == etat[1])
			{
				if (etat[2] == "1")
				{
					cells[4].innerText = "CONNECTEE";
				}
				else
				{
					cells[4].innerText = "NON CONNECTEE";
				}
				
				cells[6].innerText = etat[3];
				cells[7].innerText = etat[4].replace('%', ' ').replace('%', ' ');
				cells[8].innerText = etat[5];
				break;
			}
		}
	}

/**
 * Mise � jour des donn�es relatives � l'�tat des borne ip / radio
 */
	function reponse_etat_borne(sData)
	{
		var etat_bornes = sData.split('|');
		var table_borne_ip = document.getElementById("bornes-ip");
		var ligne_table_borne_ip = document.getElementsByTagName("tr");
		
		var table_borne_radio = document.getElementById("bornes-radio");
		var ligne_table_borne_radio = document.getElementsByTagName("tr");
		
		for (var j = 0; j < etat_bornes.length; j ++)
		{
			var etat = etat_bornes[j].split(' ');
			if (etat[0] != '')
			{
				if (etat[6] == 0)
				{
					maj_etat_borne(ligne_table_borne_ip, etat);
				}
				else
				{
					maj_etat_borne(ligne_table_borne_radio, etat);
				}
			}
		}
	}

/**
 * Mise � jour des donnees dans la table systeme
 */
	function maj_etat_systeme(ligne_table_systeme, etat)
	{
		for (var i=1; i < ligne_table_systeme.length; i++)
		{
			var cells = ligne_table_systeme[i].cells;
			if (cells[0].innerText == etat[0].replace('%', ' ').replace('%', ' '))
			{
				cells[1].innerText = etat[1].replace('%', ' ').replace('%', ' ');
				//alert(cells[0].innerText + ' = ' + cells[1].innerText)
			}
		}
	}

/**
 * Mise � jour des donnees systeme en provenance de la base de donnees
 */
	function reponse_etat_systeme(sData)
	{	
		var etat_systeme = sData.split('|');
		var table_etat_systeme = document.getElementById("etat_systeme");
		var ligne_table_etat_systeme = document.getElementsByTagName("tr");
		for (var j = 0; j < etat_systeme.length; j ++)
		{
			var etat = etat_systeme[j].split(' ');
			if (etat[0] != '')
			{
				maj_etat_systeme(ligne_table_etat_systeme, etat);
			}
		}
	}

/**
 * Fonction Callback de reour de la r�ponse du serveur
 */
	function readData(sData) 
	{
		switch (i_automate)
		{
			case 0:
			{
				//alert(sData);
				reponse_etat_borne(sData);
				i_automate++;
				i_automate %= nb_max_request;
			}
			break;
			
			case 1:
			{
				reponse_etat_systeme(sData);
				i_automate++;
				i_automate %= nb_max_request;
			}
			break;
			
			default:
			{
			}
			break;
		}
	}