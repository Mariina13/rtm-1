<?php error_reporting(E_ALL);



if ($objetRequest->get("afficher", "") == "updateParametre")
{
    require_once("$cheminPart/section-parametrage.php");
}   
?>
<?php

$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Bornes::class);
$tabResultat         = $objetRepository->findBy(["typeEquipement" => "0"]);    
// ON A UN TABLEAU D'OBJETS DE CLASSE Bornes
foreach($tabResultat as $objetBornes)
{
    $id                = $objetBornes->getId();
    $sigep             = $objetBornes->getSigep();
    
$objetRepository2     = $this->getDoctrine()->getRepository(App\Entity\Stations::class);
$tabResultat = $objetRepository2->afficherNomBornesIp($objetConnection, $sigep);
foreach($tabResultat as $tabLigne)
{ 
    extract($tabLigne);
?>

<!-- MENU CONTEXTUEL -->
<div id="box">
    <menu type="context" id="menu">
        <ul id="menu-vertical">
            <li id="<?php echo $id ?>"data-action="parametrage" class="parametre">parametrage</li>
            <li> Mode <i class="fas fa-caret-right"></i>
                <ul id="ulMode">
                    <li>Fonctionnement réel</li>
                        <ul class="aligner">
                            <li data-action="modeTheorique">Théorique</li>
                            <li data-action="modeReel">Réel</li>
                            <li data-action="modeInopérant">Inopérant</li>
                        </ul>
                    </li>
                </ul>
            </li>    
            <li data-action="horaire" id="horaire">Horaires de passage</li>
            <li> Affichage des données Spoti </li>
            <li data-action="messagerie" id="commandMessagerie">Messagerie Commerciale</li>
            <li>Télécharger les tables <i class="fas fa-caret-right"></i>
                <ul class="aligner">
                    <li data-action="toutes">Toutes</li>
                    <li data-action="ligne">Ligne</li>
                    <li data-action="destination">Destination</li>
                    <li data-action="horaire">Horaire</li>
                </ul>
            </li>
        </ul>
    </menu>
</div>
<div id ="parametrage">
    <div class="titre">
        <button class="close" id="fermer"> X </button>
            <h2> Borne sigep : <?php echo $sigep ?> </h2>
    </div>
         <form id="parametre" method ="POST">
 
        <label for="version"> Version des paramétres : </label>
        <input id="version" type="text" name="version" value="" required/>
     
        <label for="approche"> Seuil approche véhicule : </label>
        <input id="approche" type="text" name="seuilApprocheVehicule" value = "" required/>
     
        <label for="mode"> Mode Aff Rupture Comm : </label>
        <select id="mode" name="modeAffRuptureCom" required>
            <option> </option>
             <option value="3" selected >Théorique</option>
             <option value="4" >Réel</option>
             <option value="6" >Inopérant</option>
         </select>
     
         <label for="seuil">Seuil det. Rupture Com :</label>
        <input id="seuil" type="text" name="seuilDetRuptureCom" value="" required/>
     
         <label for="fonctionnement">Mode de fonctionnement : </label>
         <select id="fonctionnement" name="modeDeFonctionnement">
            <option> </option>
             <option value="1" selected>Départ</option>
             <option value="2">Ligne</option>
         </select>
     
        <label for="maintien"> Seuil de maintien : </label>
        <input id="maintien" type="text" name="seuilDeMaintien" value="" required/>
     
        <label for="prox">Texte Prox. Véhicule :</label>
        <input id="prox" type = "text" name ="texteProxVehicule" value="" required/>
         
        <button id ="fermer1" type="submit">Appliquer</button>
        <input type="hidden" name="codebarre" value="createParametre">
        <input type="hidden" name="id_stations" value="">
        <div class="ok">
<?php

if ($objetRequest->get("codebarre", "") == "createParametre")
{       
     $objetTraitementForm = new App\Controller\TraitementForm;
 
     $objetTraitementForm->traiterParametre($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
}

?>
        </div>
        </form>
    </div>
<?php } }?>
