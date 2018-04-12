<div id="Horaire">
<div class="titreHoraire">
        <button class="close" id="fermer2"> X </button>
            <h2> Horaires de la ligne  </h2>
    </div>
    <table class="horaire">
        <thead>
            <tr>
                <th> Station</th>
                <th> Horaire de départ théorique</th>
                <th> Horaire d'arrivée théorique</th>
            </tr>
<?php

$idStations = $objetRequest->get("idStations","");

    $objetRepository = $this->getDoctrine()->getRepository(App\Entity\CoursesLignesStations::class);
    $tabResultat     = $objetRepository->lireHoraire($objetConnection, $idStations);      
        // on parcours la BDD pour extraire les informations.

        foreach($tabResultat as $tabLigne) 
        {
           extract($tabLigne);

            echo
<<<CODEHTML
           
            <tr>
                <td>$id_stations</td>
                <td>$horaire_depart_theorique</td>
                <td>$horaire_arrivee_theorique</td>                
            </tr>              
CODEHTML;
        }
?>          

            </table>
        </div>