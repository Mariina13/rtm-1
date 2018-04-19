<?php error_reporting(E_ALL); 
//require_once("$cheminPart/section-menu.php");
//require_once("$cheminPart/section-parametrage.php");
?>

<section>
<!-- ------------------------------------- -->
<!-- ------------ BORNES IP -------------- -->
<table id="tableIp" class="bornes-ip" data-order='[[ 1, "asc" ]]' data-page-length='5'>
        <caption>BORNES IP</caption>
            <thead>
            <tr>
                <th>SIGEP</th>
                <th>TYPE</th>
                <th>NOM</th>
                <th>EQUIPEMENT</th>
                <th>CONNEXION</th>
				<th>IDENTIFIANT</th>
				<th>SPOTI2</th>
				<th>TABLES</th>
				<th>SIV</th>
                <th>MENU</th>
            </tr>
            </thead>
            <tbody>
                <tr>
<?php
    $objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Bornes::class);
    $tabResultat         = $objetRepository->findBy(["typeEquipement" => "0"]);    
    // ON A UN TABLEAU D'OBJETS DE CLASSE Bornes
    foreach($tabResultat as $objetBornes)
    {
        $id                = $objetBornes->getId();
        $sigep             = $objetBornes->getSigep();
        $type              = $objetBornes->getType();
        $adresseEquipement = $objetBornes->getAdresseEquipement();
        $connexion         = $objetBornes->getConnexion();
        $numeroInterne     = $objetBornes->getNumeroInterne();
        $dataSpoti         = $objetBornes->getDataSpoti();
        $refVersionTable   = $objetBornes->getRefVersionTable();
        $dataSivSent       = $objetBornes->getDataSivSent();
                    echo
                <<<CODEHTML
                    <td>$sigep</td>
CODEHTML;
?>
<!-- CHANGE LES DONNEES EN CHAINE DE CARACTERE  -->
<td>
<?php
if ($type == 1)
{
    echo 'DEPART';
}
else
{
    echo 'LIGNE';
}
?>
</td>
<?php
$id = $objetRequest->get("id","");
// AFFICHE LE NOM DES STATIONS
$objetRepository2     = $this->getDoctrine()->getRepository(App\Entity\Stations::class);
$tabResultat = $objetRepository2->afficherNomBornesIp($objetConnection, $sigep);
foreach($tabResultat as $tabLigne)
{ 
    extract($tabLigne);
                    echo
                <<<CODEHTML
                <td>$nomPtReseau</td>
CODEHTML;
}
?>
<?php
                    echo
                <<<CODEHTML
                <td>$adresseEquipement</td>
CODEHTML;
?>
<td>
<?php
// CHANGE LES DONNEES EN CHAINE DE CARACTERE
    if ($connexion == 1)
    {
        echo 'CONNECTEE';
    }
    else
    {
        echo 'NON CONNECTEE';
    }
?>
</td>
<?php
// AFFICHE LE RESTE DES DONNEES
    echo
<<<CODEHTML
                <td>$numeroInterne</td>
                <td>$dataSpoti</td>
                <td>$refVersionTable</td>
                <td>$dataSivSent</td>
CODEHTML;
?>
<?php
                echo
                <<<CODEHTML
                <td class="button">
                        <button class="modif" id="$id" type="submit"><i class="far fa-plus-square"></i></button>
                        <div id="box">
                        <menu type="context" id="menu">
                            <ul id="menu-vertical">
                                <li id="$id"data-action="parametrage" class="parametre">parametrage</li>
                                <li> Mode <i class="fas fa-caret-right"></i>
                                    <ul class="aligner">
                                        <li data-action="modeTheorique">
                                        <form method="POST">
                                            <input type="hidden" name="id_stations" value="$id">
                                            <input type="hidden" name="sousTypeOperation" value="1">
                                            <input type="hidden" name="codebarre" value="modeMenu">
                                            <button type="submit"class="menuMode">Théorique</button>
                                        </form>
                                        <li data-action="modeReel">Réel</li>
                                        <li data-action="modeInopérant">Inopérant</li>
                                    </ul>
                                </li>    
                                <li data-action="horaire" class="horaire">Horaires de passage</li>
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
                        </td>
CODEHTML;

?>
            </tr>
            </tbody>
  <?php

if ($objetRequest->get("codebarre", "") == "createParametre")
{       
     $objetTraitementForm = new App\Controller\TraitementForm;
 
     $objetTraitementForm->traiterParametre($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
}

?>
    </tr>
   </table>
<?php } ?>
    </section>


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
    </tr>
<hr>


<section> 
<!-- ---------------------------------------- -->
<!-- ------------- BORNES RADIO ------------- -->
<table id="tableRadio" class="bornes-radio" data-order='[[ 1, "asc" ]]' data-page-length='5'>
        <caption>BORNES RADIO</caption>
            <thead>
            <tr>
                <th>SIGEP</th>
                <th>TYPE</th>
                <th>NOM</th>
                <th>EQUIPEMENT</th>
                <th>CONNEXION</th>
                <th>IDENTIFIANT</th>
                <th>SPOTI2</th>
                <th>TABLES</th>
                <th>SIV</th>
                <th>MENU</th>
            </tr>
            </thead>
            <tbody>
<?php
$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Bornes::class);
$tabResultat         = $objetRepository->findBy(["typeEquipement" => 1 ]);  
foreach($tabResultat as $objetBornes)
{ ?>
            </tbody>
            </table>
<?php } ?>
</section>
<hr>

<section>
  <!-- ------------------------------------------ -->
<!-- -------------- BORNES GEZE  -------------- -->
<table id="tableGeze" class="bornes-radio" data-order='[[ 1, "asc" ]]' data-page-length='5'>
        <caption>BORNES GEZE</caption>
            <thead>
            <tr>
                <th>SIGEP</th>
                <th>TYPE</th>
                <th>NOM</th>
                <th>EQUIPEMENT</th>
                <th>CONNEXION</th>
                <th>IDENTIFIANT</th>
                <th>SPOTI2</th>
                <th>TABLES</th>
                <th>SIV</th>
                <th>MENU</th>
            </tr>
            </thead>
            <?php
$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Bornes::class);
$tabResultat         = $objetRepository->findBy(["typeEquipement" => 2 ]);  
foreach($tabResultat as $objetBornes)
{ ?>
            </table>
<?php } ?>
            </table>
</section>


<!-- ---------------------------------------- -->
<!-- -------------- ETAT SYSTEME ------------ -->
<section class="systeme">	
    <table>
        <caption>SYSTEME</caption>
            <thead>
            <tr>
                <th><i class="fas fa-flag-checkered"></i></th>
                <th>SIV</th>
                <th>SWITCH TETRA</th>
                <th>SPOTI 2</th>
                <th>BASE DE DONNEES</th>
            </tr>
            </thead>
            </tbody>
            </tbody>
            </table>
</section>