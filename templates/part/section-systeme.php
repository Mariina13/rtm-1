<!-- ---------------------------------------- -->
<!-- -------------- ETAT SYSTEME ------------ -->
<section class="systeme">	
    <table>
        <caption>SYSTEME</caption>
            <thead>
            <tr>
                <th><i class="fas fa-flag-checkered"></i></th>
                <th>SIV</th>
                <th>SWITCH TETRA</th>
                <th>SPOTI 2</th>
                <th>BASE DE DONNEES</th>
            </tr>
            </thead>
                <tbody>
                    <tr>
<?php
// AFFICHER LES DONNEES 
// DU PLUS RECENT AU PLUS ANCIEN ()
$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\TableEtatSysteme::class);
$tabResultat = $objetRepository->lireListe($objetConnection);
// BOUCLE POUR PARCOURIR CHAQUE LIGNE TROUVEE
foreach($tabResultat as $tabLigne)
{
   
    extract($tabLigne);
                    echo
                    <<<CODEHTML
                        <td>ETAT</td>
                        <td>$siv</td>
                        <td>$switch_tetra</td>
                        <td>$spoti2</td>
                        <td>$base_de_donnees</td>
CODEHTML;
}
?>  
                    </tr>
            </tbody>
        </table>
</section>
