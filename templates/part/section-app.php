<?php error_reporting(E_ALL); 
require_once("$cheminPart/section-menu.php");
require_once("$cheminPart/section-parametrage.php");
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
                        </td>
CODEHTML;
    }
?>
            </tr>
        </tbody>
    </table>
</section>
<hr>

<section> 
<!-- ---------------------------------------- -->
<!-- ------------- BORNES RADIO ------------- -->
<table id="tableRadio" class="bornes-ip" data-order='[[ 1, "asc" ]]' data-page-length='5'>
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
                    <tr>
            <?php
$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Bornes::class);
$tabResultat         = $objetRepository->findBy(["typeEquipement" => "1"]);    
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
$tabResultat = $objetRepository2->afficherNomBornesRadio($objetConnection, $sigep);
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
                        </td>
CODEHTML;

}
?>
                    </tr>
                </tbody>
    </table>
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
                <tbody>
                    <tr>
<?php
$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Bornes::class);
$tabResultat         = $objetRepository->findBy(["typeEquipement" => 2 ]);  
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
// AFFICHE LE NOM DES STATIONS
$objetRepository2     = $this->getDoctrine()->getRepository(App\Entity\Stations::class);
$tabResultat          = $objetRepository2->afficherNomBornesGeze($objetConnection, $sigep);

    foreach($tabResultat as $tabLigne)
    {
        extract($tabLigne);
            echo
            <<<CODEHTML
                <td> $nomPtReseau</td>
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
                <td>
                    <button class="modif" id="$id"  type="button"><i class="far fa-plus-square"></i></button>
                    </td>
CODEHTML;
}
?>
                    </tr>
                <tbody>
    </table>
</section>

<hr>

<!-- ---------------------------------------- -->
<!-- -------------- ETAT SYSTEME ------------ -->
<section class="systeme">	
    <table id="tableSysteme">
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
            <tbody>
            <tr>

            </tr>
            </tbody>
            </table>
</section>