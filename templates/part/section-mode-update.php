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

    $objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Bornes::class);
    $tabResultat         = $objetRepository->findBy(["typeEquipement" => ["0","1","2"], "connexion"=> 1]);    
    // ON A UN TABLEAU D'OBJETS DE CLASSE Bornes
    foreach($tabResultat as $objetBornes)
    {
        $id                = $objetBornes->getId();
        $sigep             = $objetBornes->getSigep();
        $type              = $objetBornes->getType();
    
        $objetRepository = $this->getdoctrine()->getrepository(App\Entity\Stations::class);
        $tabResultat = $objetRepository->afficherNomStation($objetConnection, $sigep, $id);
    
        foreach($tabResultat as $tabLigne)
        {
                extract($tabLigne);

    $objetRepository = $this->getDoctrine()->getRepository(App\Entity\TableOperationsUtilisateur::class);
    $objetTableOperationsUtilisateur   = $objetRepository->find($idUpdate);


        if ($objetBornes && $objetTableOperationsUtilisateur) {
                
            // OK ON A TROUVE UN ARTICLE POUR CET ID
            $utilisateursId       = $objetTableOperationsUtilisateur->getUtilisateursId();
            $idStations           = $objetTableOperationsUtilisateur->getIdStations();
            $sousTypeOperation    = $objetTableOperationsUtilisateur->getSousTypeOperation(); 

?>
    
    <form class="formModeUpdate">
        <label id="labelMode" for="select"> Modifier le mode <i class="fas fa-arrow-right"></i> <?php echo $nomPtReseau ?> </option>
        <select id ="select" class="select" name = "id_stations" multiple required>
<?php
   
?>      
        <option value ="<?php echo $id?>" required ><?php echo $nomPtReseau ?></option>

<?php } }  ?>     
        </select>

       </select>
        <select class="select" name="sousTypeOperation" required>
                <option> -- Opération à modifier : <?php 
                if($sousTypeOperation == 1)
                {
                    echo 'Théorique';
                } 
                elseif($sousTypeOperation == 2)
                {
                    echo 'Réel';
                }
                elseif($sousTypeOperation == 3)
                {
                    echo 'Inopérant';
                } 
                ?> -- </option>
                <option value = "1" selected> Mode Théorique </option>
                <option value = "2"> Mode Réel </option>
                <option value = "3"> Mode Inopérant </option>  
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