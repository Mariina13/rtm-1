<?php error_reporting(E_ALL);
ob_start();

// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "updateParametre")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateParametre($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}


// ON A UN TABLEAU D'OBJETS DE CLASSE Bornes
foreach($tabResultat as $objetParametrageBornes)
{
    

    $idStations                      = $objetParametrageBornes->getIdStations();
    $version                         = $objetParametrageBornes->getVesrion();
    $seuilApprocheVehicule           = $objetParametrageBornes->getSeuilApprocheVehicule();
    $modeAffRuptureCom               = $objetParametrageBornes->getmodeAffRuptureCom();
    $seuilDetRuptureCom              = $objetParametrageBornes->getSeuilDetRuptureCom();
    $modeDeFonctionnement            = $objetParametrageBornes->getModeDeFonctionnment();
    $seuilDeMaintien                 = $objetParametrageBornes->getSeuilDeMaintien();
    $texteProxVehicule               = $objetParametrageBornes->getTexteProxVehicule();
?>

<div id ="parametrage">
    <div class="titre">
        <button class="close" id="fermer"> X </button>
            <h2> Borne sigep : <?php echo $idStations ?> </h2>
    </div>
         <form id="parametre" method ="POST">
 
        <label for="version"> Version des paramétres : </label>
        <input id="version" type="text" name="version" value="<?php echo $version ?>" required/>
     
        <label for="approche"> Seuil approche véhicule : </label>
        <input id="approche" type="text" name="seuilApprocheVehicule" value = "<?php echo $seuilApprocheVehicule ?>" required/>
     
        <label for="mode"> Mode Aff Rupture Comm : </label>
        <select id="mode" name="modeAffRuptureCom" required>
            <option> <?php echo $modeAffRuptureCom ?> </option>
             <option value="3" selected >Théorique</option>
             <option value="4" >Réel</option>
             <option value="6" >Inopérant</option>
         </select>
     
         <label for="seuil">Seuil det. Rupture Com :</label>
        <input id="seuil" type="text" name="seuilDetRuptureCom" value="<?php echo $seuilDetRuptureCom ?>" required/>
     
         <label for="fonctionnement">Mode de fonctionnement : </label>
         <select id="fonctionnement" name="modeDeFonctionnement">
            <option> <?php echo $modeFonctionnement ?> </option>
             <option value="1" selected>Départ</option>
             <option value="2">Ligne</option>
         </select>
     
        <label for="maintien"> Seuil de maintien : </label>
        <input id="maintien" type="text" name="seuilDeMaintien" value="<?php echo $seuilDeMaintien ?>" required/>
     
        <label for="prox">Texte Prox. Véhicule :</label>
        <input id="prox" type = "text" name ="texteProxVehicule" value="<?php echo $texteProxVehicule ?>" required/>
         
        <button id ="fermer1" type="submit">Appliquer</button>
        <input type="hidden" name="codebarre" value="createParametre">
        <input type="hidden" name="id_stations" value="<?php isset($_POST["id_stations"])?>">
         
<?php

if ($objetRequest->get("codebarre", "") == "createParametre")
{       
     $objetTraitementForm = new App\Controller\TraitementForm;
 
     $objetTraitementForm->traiterParametre($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
}



?>
        </form>
    </div>

<?php  }?>


