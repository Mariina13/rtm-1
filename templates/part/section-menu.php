<?php error_reporting(E_ALL);

?>

<!-- MENU CONTEXTUEL -->
<div id="box">
    <menu type="context" id="menu">
        <ul id="menu-vertical">
            <li data-action="parametrage" class="parametre">parametrage</li>
            <li> Mode <i class="fas fa-caret-right"></i>
                <ul id="ulMode">
                    <li>Fonctionnement réel</li>
                        <ul class="aligner">
                            <li data-action="modeTheorique">Théorique</li>
                            <li data-action="modeReel">Réel</li>
                            <li data-action="modeInopérant">Inopérant</li>
                        </ul>
                    </li>
                </ul>
            </li>    
            <li data-action="horaire" id="horaire">Horaires de passage</li>
            <li> Affichage des données Spoti </li>
            <li data-action="messagerie" id="commandMessagerie">Messagerie Commerciale</li>
            <li>Télécharger les tables <i class="fas fa-caret-right"></i>
                <ul class="aligner">
                    <li data-action="toutes">Toutes</li>
                    <li data-action="ligne">Ligne</li>
                    <li data-action="destination">Destination</li>
                    <li data-action="horaire">Horaire</li>
                </ul>
            </li>
        </ul>
    </menu>
</div>
