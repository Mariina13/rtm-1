<section class= "modeUpdate">
<h2> Changer de mode </h2>

<?php error_reporting(E_ALL); 
ob_start();

// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "updateMode")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateMode($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}

$messageUpdate = ob_get_clean();
?>



<?php
    $idUpdate = $objetRequest->get("idUpdate", 0);

    $objetRepository = $this->getDoctrine()->getRepository(App\Entity\Stations::class);
    $objetStations  = $objetRepository->find($idUpdate);

    $objetRepository = $this->getDoctrine()->getRepository(App\Entity\TableOperationsUtilisateur::class);
    $objetTableOperationsUtilisateur   = $objetRepository->find($idUpdate);

        if ($objetStations && $objetTableOperationsUtilisateur) {
                
            // OK ON A TROUVE UN ARTICLE POUR CET ID
            $nomPtReseau      = $objetStations->getNomPtReseau();
            $utilisateursId   = $objetTableOperationsUtilisateur->getUtilisateursId();
            $idStations       = $objetTableOperationsUtilisateur->getIdStations();
            $operation        = $objetTableOperationsUtilisateur->getOperation(); 

?>
    
    <form class="formModeUpdate">
        <label id="labelMode" for="select"> Modifier le mode <i class="fas fa-arrow-right"></i> <?php echo $nomPtReseau ?> </option>
        <select id ="select" class="select" name = "id_stations" multiple required>
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

       </select>
        <select class="select" name="operation" required>
                <option> -- Opération à modifier : <?php echo $operation ?> -- </option>
                <option value = "3" selected> Mode Théorique </option>
                <option value = "4"> Mode Réel </option>
                <option value = "6"> Mode Inopérant </option>  
        </select>
        <button class="buttonUser"type="submit"> <i id="modif" class="far fa-hand-point-right"></i> Modifier </button>
            <input type="hidden" name="afficher"  value="updateMode">
            <input type="hidden" name="idUpdate"  value="<?php echo $idUpdate ?>">
            <input type="hidden" name="codebarre" value="updateMode">
        <?php echo $messageUpdate?>
        </div>  
   </form>
   <?php } ?>

</section>

<hr>