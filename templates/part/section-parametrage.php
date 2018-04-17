<?php error_reporting(E_ALL);
ob_start();

// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "updateParametre")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateParametre($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}
$messageUpdate = ob_get_clean();

?>
<?php
$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Bornes::class);
$tabResultat         = $objetRepository->findBy(["typeEquipement" => ["0","1","2"]]);    
// ON A UN TABLEAU D'OBJETS DE CLASSE Bornes
foreach($tabResultat as $objetBornes)
{
    $id                = $objetBornes->getId();
    $sigep             = $objetBornes->getSigep();

$objetRepository2     = $this->getDoctrine()->getRepository(App\Entity\Stations::class);
$tabResultat = $objetRepository2->afficherNomStation($objetConnection, $sigep);
foreach($tabResultat as $tabLigne)
{ 
    extract($tabLigne);


?>
<div id ="parametrage">
    <div class="titre">
        <button class="close" id="fermer"> X </button>
            <h2> Borne sigep : <?php echo $sigep ?> </h2>
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
        <input type="hidden" name="id_stations" value="<?php echo $id ?>">
        <div class="ok">
<?php
}
if ($objetRequest->get("codebarre", "") == "createParametre")
{       
     $objetTraitementForm = new App\Controller\TraitementForm;
 
     $objetTraitementForm->traiterParametre($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
}

?>
        </div>
        </form>
    </div>

<?php } ?>


