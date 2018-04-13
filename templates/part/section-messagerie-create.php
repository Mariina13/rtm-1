<?php
error_reporting(E_ALL);
?>
<section class="messagerie">

<h2>Envoyer un message commerciale </h2>

        <form id="messagerie" method="POST">
        <label for="select"> Sélectionner une Station : </label>
                <select id="select" class="select" name="id_stations[]" multiple="multiple">
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
        <option value ="<?php echo $id ?>" required > <?php echo $nomPtReseau ?> <?php echo $sens ?> </option>
<?php }} ?>
        </select>
        <select class="select" name="operation">
                <option type="text" value = "5" selected> Envoyer</option> 
        </select>
        <input type="datetime-local" name="validite" id="calendar" required/>
        <textarea name="texte" placeholder="Votre message" required></textarea>
        <button type="submit"> Valider <i id="modifCreer" class="fas fa-check"></i></button>
            <input type="hidden" name="afficher" value="createMessage">
            <input type="hidden" name="codebarre" value="message"/>
            <div class="ok">
<?php
if ($objetRequest->get("codebarre", "") == "message")
{       
    $objetFormArticle = new App\Controller\FormArticle;
    $objetFormArticle->creerMessage($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
}
?>
                </div>
        </form>
</section>
<hr>