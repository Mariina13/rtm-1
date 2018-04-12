<section class= "messagerie">
<h2>Modifier le message commerciale </h2>

<?php error_reporting(E_ALL); 
ob_start();

// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "updateMessage")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateMessage($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}

$messageUpdate = ob_get_clean();
?>



<?php
    $idUpdate = $objetRequest->get("idUpdate", 0);

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
        <select class="select" name = "id_stations[]" multiple required>
        <option required> -- Sélectionner une autre station : <?php echo $nomPtReseau ?>-- </option>
<?php
    $objetRepository = $this->getdoctrine()->getrepository(App\Entity\Stations::class);
    $tabResultat = $objetRepository->afficherNomStation($objetConnection);
            
        foreach($tabResultat as $tabLigne)
        {
            extract($tabLigne);
?>      
        <option value ="<?php echo $id ?>" required > <?php echo $id ?> :  <?php echo $nomPtReseau ?></option>;

<?php } ?>     
        </select>

        <select class="select" name="operation">
                <option selected> Modfification - Message </option>
        </select>
        <textarea name="texte" placeholder="Votre message" required > <?php echo $texte?> </textarea>
        <form>
            <button class="buttonUser" type="submit"> <i id="modif" class="far fa-hand-point-right"></i> Modifier </button>
            <input type="hidden" name="afficher" value="updateMessage">
            <input type="hidden" name="idUpdate" value="<?php echo $idUpdate ?>">
            <input type="hidden" name="codebarre" value="updateMessage">
        </form>
        <div class="ok">
        <?php echo $messageUpdate?>
        </div>  
   </form>

</section>

<?php } ?>
<hr>