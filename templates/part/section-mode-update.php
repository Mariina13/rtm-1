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

    <form class="formModeUpdate" method="POST">
            <select id ="select" class="select" name="id_stations[]" multiple required>

<?php
    $idUpdate = $objetRequest->get("idUpdate", 0);

    $objetRepository = $this->getDoctrine()->getRepository(App\Entity\TableOperationsUtilisateur::class);
    $objetTableOperationsUtilisateur   = $objetRepository->find($idUpdate);

    if($objetTableOperationsUtilisateur)
    {
        $utilisateursId     = $objetTableOperationsUtilisateur->getUtilisateursId();
        $idStations         = $objetTableOperationsUtilisateur->getIdStations();
        $sousTypeOperation  = $objetTableOperationsUtilisateur->getSousTypeOperation(); 

        $id = $idStations;

        $objetRepository = $this->getdoctrine()->getrepository(App\Entity\Stations::class);
        $tabResultat = $objetRepository->afficherNom($objetConnection, $id);

        foreach($tabResultat as $tabLigne)
        {
                extract($tabLigne);
            

?>
        <option> Modifier le mode : <?php echo $nomPtReseau ?> </option>
        <option value ="<?php echo $id ?>" required > <?php echo $nomPtReseau ?></option>;
       </select>
        <select class="select" name="sousTypeOperation" required>
                <option> -- Opération à modifier :
<?php 
                
    if($sousTypeOperation == 1)
    {
        echo "Théorique";
    }
    elseif($sousTypeOperation == 2)
    {
        echo"Réel";
    }
    elseif($sousTypeOperation == 3)
    {
        echo "Inopérant";
    }
?>              -- </option>
                <option value = "1"> Mode Théorique </option>
                <option value = "2"> Mode Réel </option>
                <option value = "3"> Mode Inopérant </option>  
        </select>
        <button class="buttonMode" type="submit"> <i id="modif" class="far fa-hand-point-right"></i> Modifier </button>
            <input type="hidden" name="afficher" value="updateMode">
            <input type="hidden" name="idUpdate"  value="<?php echo $idUpdate ?>">
            <input type="hidden" name="codebarre" value="updateMode">
        <div class="ok">
        <?php echo $messageUpdate?>
        </div>
   </form>
   <?php } }?>

</section>

<hr>