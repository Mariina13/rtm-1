
// Pour afficher et enlever la div error
$('form').on("submit", function(evenement){
	
	//1. Récupérer la valeur de l'input password
	const password = $("#password").val();
	//2. Récupérer la valeur du champ confirmation
	const confirmation = $("#confirmation").val();
	//3. Vérifier la valeur de password est vide => class="ko".
	if(password != confirmation)
	{
		$("#password").addClass("error");
	}
	else
	{
		$("#password").removeClass("error");
    }
});


