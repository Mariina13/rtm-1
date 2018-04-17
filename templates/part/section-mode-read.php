<?php

error_reporting(E_ALL);
?>
<section>
    <form class="formModeRead" method="POST" action="#section-mode-create">
        <label class="labelMode">Choisir le mode fonctionnel de la borne </label>
            <input type="hidden" name="afficher" value="modeCreate">
            <input type="hidden" name="codebarre" value="mode">
            <button class="modeButton" type="submit"><i id="modif" class="fas fa-cogs"></i></button>
    </form>
<hr>
    <table id="tableId" class="modeRead" data-order='[[ 1, "asc" ]]' data-page-length='5'>
        <caption class="modeCaption"> Liste des modes appliqués</caption>
            <thead>
                <tr>
                    <th class="operation"> Date d'operation</th>
                    <th> Stations </th>
                    <th> Operation </th>
                    <th> Modifier </th>
                </tr>
            </thead>
            <tbody>
<?php

        $objetRepository = $this->getDoctrine()->getRepository(App\Entity\TableOperationsUtilisateur::class);
        $tabResultat     = $objetRepository->findBy(["operation" => 2], ["dateOperation" => "DESC"]);    

        // on parcours la BDD pour extraire les informations.
        foreach($tabResultat as $objetTableOperationsUtilisateur) 
        {
            $idMode                 = $objetTableOperationsUtilisateur->getId();
            $idStations         = $objetTableOperationsUtilisateur->getIdStations();
            $operation          = $objetTableOperationsUtilisateur->getOperation();
            $sousTypeOperation  = $objetTableOperationsUtilisateur->getSousTypeOperation();
            $dateOperation      = $objetTableOperationsUtilisateur->getDateOperation("d/m/Y H:i:s");

            
            echo
<<<CODEHTML
           
            <tr>
                <td>$dateOperation</td>
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

<?php
//CHANGE EN CHAINE DE CARACTERE
    if($sousTypeOperation == 1)
    {
        echo
<<<CODEHTML
    <td id="theorique">Théorique</td>
CODEHTML;
    }
    if($sousTypeOperation == 2){
        echo
        <<<CODEHTML
    <td id="reel">Réel</td>
CODEHTML;
    }
    if($sousTypeOperation == 3){
        echo
        <<<CODEHTML
    <td id="inoperant">Inopérant</td>
CODEHTML;
    }
?>

                <td>
                <form method="POST" action="#section-mode-update">
                    <input type="hidden" name="afficher" value="updateMode">
                    <input type="hidden" name="idUpdate" value="<?php echo $idMode?>">
                    <button class="modif" type="submit"><i class="fas fa-cog"></i></button>
                </form>
                </td>
            </tr>

<?php  } ?>
        </tbody>
    </table>
</Section>