<?php error_reporting(E_ALL); ?>

<section id="createRead">
    
        <form class="formMessage" method="POST" action="#section-messagerie-create">
            <label>Ecrire un nouveau message </label>
                <input type="hidden" name="afficher" value="createMessage">
                <input type="hidden" name="codebarre" value="create">
                <button type="submit"><i class="far fa-envelope"></i></button>
        </form>
</section>

<hr>

<section>
    <table id="tableId" class="messageRead" data-order='[[ 1, "asc" ]]' data-page-length='5'>
        <caption> Liste des messages diffusés</caption>
        <thead>
            <tr>
                <th> Date d'envoi</th>
                <th> Station </th>
                <th> Message </th>
                <th> Envoyé </th>
                <th> Modifier </th>
                <th> Annuler  </th>
            </tr>
        </thead>
        <tbody>
<?php

    $objetRepository = $this->getDoctrine()->getRepository(App\Entity\MessagerieCommerciale::class);
    $tabResultat     = $objetRepository->findBy(["messageEnvoye" => 1], ["dateEnvoi" => "DESC"]);  
    
    
    foreach($tabResultat as $objetMessagerieCommerciale) 
    {
        
        $idMessage          = $objetMessagerieCommerciale->getId();
        $idStations         = $objetMessagerieCommerciale->getIdStations();
        $texte              = $objetMessagerieCommerciale->getTexte();
        $messageEnvoye      = $objetMessagerieCommerciale->getMessageEnvoye();
        $dateEnvoi          = $objetMessagerieCommerciale->getDateEnvoi("d/m/Y H:i:s");

        echo
        <<<CODEHTML
        <tr>
            <td>$dateEnvoi</td>
CODEHTML;
?>
<?php
        $id = $idStations;

        $objetRepository = $this->getdoctrine()->getrepository(App\Entity\Stations::class);
        $tabResultat = $objetRepository->afficherNom($objetConnection, $id);

            foreach($tabResultat as $tabLigne)
            {     
                extract($tabLigne);
                echo
<<<CODEHTML
                <td>$nomPtReseau</td>                
                              
CODEHTML;
            }
?>
                <td><?php echo $texte ?></td>
                <td><?php echo $messageEnvoye ?></td>        
                <td>
                <form method="POST" action="#section-messagerie-update">
                    <input type="hidden" name="afficher" value="updateMessage">
                    <input type="hidden" name="idUpdate" value="<?php echo $idMessage ?>">
                    <button class="modif" type="submit"><i class="far fa-file-alt"></i></button>
                </form>
                </td>
                <td>
                <form method="POST" action="#section-messagerie-annule">
                    <input type="hidden" name="afficher" value="updateMessageAnnule">
                    <input type="hidden" name="idUpdate" value="<?php echo $idMessage ?>">
                    <button class="modif" type="submit"><i class="far fa-times-circle"></i></button>
                </form>
                </td>
            </tr>

<?php } ?>
        </tbody>
    <table>
   
</Section>