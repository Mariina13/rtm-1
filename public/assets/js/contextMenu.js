/* AFFICHE LE MENU CONTEXTUEL */
$("td .modif").bind("contextmenu", function (event) {
    var x = $(this).attr("id");
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
                $("#parametrage").show();
                
                alert(x);
            break;
            case "mode":
            alert("mode"); break;
            case "horaire": $("#horaire").show(); break;
        }
        // Hide it AFTER the action was triggered
        $("#menu").hide(100);
  });
  /*$.ajax({
    url : "frontalsiv",
    type :"GET",
    data : "stations" + id,
    dataType : "html"
});*/