
<div id ="parametrage">
    <div class="titre">
        <button class="close" id="fermer"> X </button>
            <h2> Borne sigep :  </h2>
    </div>
         <form id="parametre" method ="POST">
 
        <label for="version"> Version des paramétres : </label>
        <input id="version" type="text" name="version" value="1" required/>
     
        <label for="approche"> Seuil approche véhicule : </label>
        <input id="approche" type="text" name="seuilApprocheVehicule" value = "1200" required/>
     
        <label for="mode"> Mode Aff Rupture Comm : </label>
        <select id="mode" name="modeAffRuptureCom" required>
            <option> </option>
             <option value="3" selected >Théorique</option>
             <option value="4" >Réel</option>
             <option value="6" >Inopérant</option>
         </select>
     
         <label for="seuil">Seuil det. Rupture Com :</label>
        <input id="seuil" type="text" name="seuilDetRuptureCom" value="120" required/>
     
         <label for="fonctionnement">Mode de fonctionnement : </label>
         <select id="fonctionnement" name="modeDeFonctionnement">
            <option> </option>
             <option value="1" selected>Départ</option>
             <option value="2">Ligne</option>
         </select>
     
        <label for="maintien"> Seuil de maintien : </label>
        <input id="maintien" type="text" name="seuilDeMaintien" value="10" required/>
     
        <label for="prox">Texte Prox. Véhicule :</label>
        <input id="prox" type = "text" name ="texteProxVehicule" value="" required/>
         
        <button id ="fermer1" type="submit">Appliquer</button>
        <input type="hidden" name="codebarre" value="createParametre">
        <input type="hidden" name="id_stations" value="">
<?php

if ($objetRequest->get("codebarre", "") == "createParametre")
{       
     $objetTraitementForm = new App\Controller\TraitementForm;
 
     $objetTraitementForm->traiterParametre($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
}

?>
        </form>
    </div>