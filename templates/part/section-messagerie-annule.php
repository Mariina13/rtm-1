<?php error_reporting(E_ALL); 
ob_start();

// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "updateMessageAnnule")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateMessageAnnule($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
}

$messageUpdate = ob_get_clean();
?>

<h2>Annuler le/les message(s) </h2>
<section class= "messagerie">

    <form class="messageUpdate" method="POST">
        <select class="select" name = "id_stations[]" multiple required>

<?php

    $idUpdate = $objetRequest->get("idUpdate", 0);

    $objetRepository = $this->getDoctrine()->getRepository(App\Entity\MessagerieCommerciale::class);
    $objetMessagerie = $objetRepository->find($idUpdate);

    if ($objetMessagerie)
    {
        $idStations       = $objetMessagerie->getIdStations();
        $texte            = $objetMessagerie->getTexte();

        $id = $idStations;

        $objetRepository = $this->getdoctrine()->getrepository(App\Entity\Stations::class);
        $tabResultat = $objetRepository->afficherNom($objetConnection, $id);

            foreach($tabResultat as $tabLigne)
            {     
                extract($tabLigne);

?>
        <option required> -- Sélectionner une autre station : <?php echo $nomPtReseau ?>-- </option>    
        <option value ="<?php echo $id ?>" required > <?php echo $nomPtReseau ?></option>;  
        </select>

        <select class="select" name="operation">
                <option value="5" selected> Annulation - Message </option>
        </select>
        <label id="labelTexte"for="texte"> Message envoyé à la Station : </label>
        <input id="texte" name="texte" value="<?php echo $texte?>" disabled="disabled"> 
            <button class="buttonUser" type="submit"> <i id="modif" class="far fa-hand-point-right"></i> Annuler </button>
                <input type="hidden" name="afficher" value="updateMessageAnnule">
                <input type="hidden" name="idUpdate" value="<?php echo $idUpdate ?>">
                <input type="hidden" name="codebarre" value="updateMessageAnnule">
                <div class="ok">
                <?php echo $messageUpdate?>
                </div>  
   </form>
</section>

<?php } }?>
<hr>
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