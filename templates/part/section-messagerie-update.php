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

    <form class="messageUpdate" method="POST">
        <select class="select" name = "id_stations[]" multiple required>

<?php

    $idUpdate = $objetRequest->get("idUpdate", 0);

    $objetRepository = $this->getDoctrine()->getRepository(App\Entity\MessagerieCommerciale::class);
    $objetMessagerie = $objetRepository->find($idUpdate);
    $objetRepository = $this->getDoctrine()->getRepository(App\Entity\TableOperationsUtilisateur::class);
    $objetOperationsUtilisateur = $objetRepository->find($idUpdate);

    if ($objetMessagerie && $objetOperationsUtilisateur)
    {
        $id      = $objetOperationsUtilisateur->getId();
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
                <option value="5" selected> Modfification - Message </option>
        </select>
        <textarea name="texte" required > <?php echo $texte?> </textarea>
            <button class="buttonUser" type="submit"> <i id="modif" class="far fa-hand-point-right"></i> Modifier </button>
            <input type="hidden" name="afficher" value="updateMessage">
            <input type="hidden" name="idUpdate" value="<?php echo $idUpdate ?>"/>
            <input type="hidden" name="codebarre" value="updateMessage">
        <?php echo $messageUpdate?>
   </form>
</section>

<?php } }?>
<hr>