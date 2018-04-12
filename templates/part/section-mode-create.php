<?php
error_reporting("E_ALL");

?>

<section class="modeCreate">

    <h3> Sélectionner le mode </h3>
        <form method="POST" class="formMode">
            <select size="6" class="select" name="id_stations[]" multiple>
            <option> -- Sélectionner une Station : -- </option>
<?php

$objetRepository = $this->getdoctrine()->getrepository(App\Entity\Stations::class);
$tabResultat = $objetRepository->afficherNomStation($objetConnection);

foreach($tabResultat as $tabLigne)
{
        extract($tabLigne);

?>      
        <option value ="<?php echo $id ?>"> <?php echo $nomPtReseau ?> <?php echo $sens ?></option>
<?php } ?>

        </select>
        <select class="select" name="sousTypeOperation" required>
                <option> -- Type d'opération -- </option>
                <option value = "1" selected> Mode Théorique</option>           
                <option value = "2"> Mode Réel </option>
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