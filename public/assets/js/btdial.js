/**
 * Created by sebastien on 24/04/2017.
 */

 //CORRECTION DU CODE

function onload() {
    document.getElementById('closeDialog').addEventListener("click", function (){
        window.close();
    });

    
    document.getElementById('connexionDialog').onclick = function() {
        alert('Connexion a la base de donnees');
    };
    
};
