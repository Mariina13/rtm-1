<?php error_reporting(E_ALL);

if ($objetRequest->get("afficher", "") == "updateParametre")
{
    require_once("$cheminPart/section-parametrage.php");
}
ob_start();
if ($objetRequest->get("codebarre", "") == "updateMode")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateMode($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}
$messageUpdate = ob_get_clean();

?>

 <div class="ok">
        <?php echo $messageUpdate?>
        </div>
<?php
$idUpdate = $objetRequest->get("idUpdate", 0);

$objetRepository = $this->getDoctrine()->getRepository(App\Entity\TableOperationsUtilisateur::class);
$objetTableOperationsUtilisateur   = $objetRepository->find($idUpdate);

                $idUpdate = $objetTableOperationsUtilisateurs->getId();

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

<!-- MENU CONTEXTUEL -->
<div id="box">
    <menu type="context" id="menu">
        <ul id="menu-vertical">
            <li id="<?php echo $id ?>"data-action="parametrage" class="parametre">parametrage</li>
            <li> Mode <i class="fas fa-caret-right"></i>
                <ul class="aligner">
                    <li data-action="modeTheorique">
                    <form method="POST">
                        <button type="submit"class="menuMode">Théorique</button>
                        <input type="hidden" name="id_stations" value=" <?php echo $id ?>">
                        <input type="hidden" name="sous_type_operation" value="1">
                        <input type="hidden" name="idUpdate"  value="<?php echo $idUpdate ?>">
                        <input type="hidden" name="codebarre" value="updateMode">
                    </form>    
                    <li data-action="modeReel">Réel</li>
                    <li data-action="modeInopérant">Inopérant</li>
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

<?php } }?>
