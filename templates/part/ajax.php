<?php error_reporting(E_ALL); ?>
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

}
?>
                    </tr>
                </tbody>
    
        