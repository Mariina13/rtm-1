<section class="messagerie">

<h2>Annuler le/les message(s) </h2>

<?php error_reporting(E_ALL); 
ob_start();
// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "updateMessageAnnule")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateMessageAnnule($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}
$messageUpdate = ob_get_clean();
?>



<?php
$idUpdate = $objetRequest->get("idUpdate", 0);
//ON RECUPERE LES INFORMATIONS DONT ON A BESOIN POUR PRE-REMPLIR LE FORMULAIRE
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MessagerieCommerciale::class);
$objetMessagerie = $objetRepository->find($idUpdate);

$objetRepository = $this->getDoctrine()->getRepository(App\Entity\Stations::class);
$objetStations  = $objetRepository->find($idUpdate);

$objetRepository = $this->getDoctrine()->getRepository(App\Entity\TableOperationsUtilisateur::class);
$objetTableOperationsUtilisateur   = $objetRepository->find($idUpdate);

    if (($objetMessagerie && $objetStations) && $objetTableOperationsUtilisateur) {
            
        // OK ON A TROUVE UN ARTICLE POUR CET ID
        $idStations       = $objetMessagerie->getIdStations();
        $texte            = $objetMessagerie->getTexte();
        $nomPtReseau      = $objetStations->getNomPtReseau();
        $utilisateursId   = $objetTableOperationsUtilisateur->getUtilisateursId();
?>
    
    <form class="messageUpdate">
        <select class="select" name = "id_stations">
        <option value="<?php echo $idStations ?>"> <?php echo $nomPtReseau ?> </option>
       
        </select>
        <select class="select" name="operation">
                <option value = "5"> Annulation - Message </option>
        </select>
        <label id="labelTexte"for="texte"> Message envoyé à la Station : </label>
        <input id="texte" name="texte" value="<?php echo $texte?>" disabled="disabled"> 
        <form>
            <button class="buttonUser" type="submit"> <i id="modif" class="far fa-hand-point-right"></i> Annuler </button>
            <input type="hidden" name="afficher" value="updateMessageAnnule">
            <input type="hidden" name="idUpdate" value="<?php echo $idUpdate ?>">
            <input type="hidden" name="codebarre" value="updateMessageAnnule">
        </form>
        <div class="ok">
        <?php echo $messageUpdate?>
        </div>  
   </form>

</section>

<?php } ?>
<hr>