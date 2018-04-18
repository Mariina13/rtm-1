//CHANGER DE COULEUR LES MODES
$("td#theorique").css({
    "background-color": "#ffd700",
    "color" : "#005ea8",
    "text-transform" : "uppercase"
});
$("td#reel").css({
    "background-color": "#005ea8",
    "color" : "#FAF7F7",
    "text-transform" : "uppercase"
});
$("td#inoperant").css({
    "background-color": "red",
    "color" : "#FAF7F7",
    "text-transform" : "uppercase"
});

/* FERME LA DIV PARAMETRAGE*/

$( "#fermer" ).on( "click", function( event ) {
   $("#parametrage").hide();
});
$( "#fermer1" ).on( "click", function( event ) {
    $("#parametrage").hide();
 });
 $( "#fermer2" ).on( "click", function( event ) {
    $("#parametrage").hide();
 });

/* AFFICHE LE MENU CONTEXTUEL */
$("td .modif").bind("contextmenu", function (event) {
    var x = $(this).attr("id");
    alert(x);
    // Avoid the real one
    event.preventDefault();
    // Show contextmenu
    $("#menu").finish().toggle(100);

});
// If the document is clicked somewhere
$(document).on("click", function (e){
    
    // If the clicked element is not the menu
    if (!$(e.target).closest("#menu").length) {
        
        // Hide it
        $("#menu").hide(100);
    }

});
// Fonction du menu
$("#menu li").click(function(){
    var x = $(this).attr("id");
        // This is the triggered action name
        switch($(this).attr("data-action")) {
            
            // A case for each action. Your actions here
            case "parametrage":
            var x = $(this).attr("id");
                $("#parametrage").show();
                alert(x);
            break;
            case "modeTheorique":

            break;
            case "horaire": 
            $("#Horaire").show();
            break;
        }
        // Hide it AFTER the action was triggered
        $("#menu").hide(100);
  });
  $(function(){

    // JE PRENDS LA MAIN SUR LE FORMULAIRE
    $(document).ready(function(event){
        // BLOQUER L'ENVOI DU FORMULAIRE

        console.log("JE PRENDS LA MAIN");

        // ON VA ENVOYER LE FORMULAIRE EN AJAX
        // ON RECUPERE LES INFOS DU FORMULAIRE
        var formData = new FormData(this);

        // urlAJax A DETERMINER
        $.ajax({
            method:         "POST",
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
           $("#auto").hide().load(response).show();
        });

    });
});