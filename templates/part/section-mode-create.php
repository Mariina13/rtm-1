<?php
error_reporting("E_ALL");
?>

<section class="modeCreate">

    <h3> Sélectionner le mode </h3>
        <form method="POST" class="formMode">
        <label for="borne"> Liste des bornes connectées :</label>
            <select id="borne" size="4" class="select" name="id_stations[]" multiple>
<?php
    $objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Bornes::class);
    $tabResultat         = $objetRepository->findBy(["typeEquipement" => ["0","1","2"], "connexion"=> 1]);    
    // ON A UN TABLEAU D'OBJETS DE CLASSE Bornes
    foreach($tabResultat as $objetBornes)
    {
        $id                = $objetBornes->getId();
        $sigep             = $objetBornes->getSigep();
        $type              = $objetBornes->getType();
            
        $objetRepository = $this->getdoctrine()->getrepository(App\Entity\Stations::class);
        $tabResultat = $objetRepository->afficherNomStation($objetConnection, $sigep);
        foreach($tabResultat as $tabLigne)
        {
                extract($tabLigne);
?>      
        <option value ="<?php echo $id ?>"> <?php echo $nomPtReseau ?> 
</option>
<?php } } ?>

        </select>
        <select class="select" name="sousTypeOperation" required>
                <option value = "1" selected> Mode Théorique</option>           
                <option value = "2" > Mode Réel </option>
                <option value = "3"> Mode Inopérant </option>  
        </select>
        <button type="submit"> Valider <i id="modifCreer" class="fas fa-check"></i></button>
            <input type="hidden" name="afficher" value="modeCreate">
            <input type="hidden" name="codebarre" value="mode"/>
            <div class="ok">
<?php
if ($objetRequest->get("codebarre", "") == "mode")
{       
    $objetFormArticle = new App\Controller\FormArticle;
    $objetFormArticle->creerMode($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
}
?>
            </div>
        </form>
</section>

<hr>