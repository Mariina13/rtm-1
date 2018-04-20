<?php error_reporting(E_ALL); ?>

  <div id="box">
    <menu type="context" id="menu">
        <ul id="menu-vertical">
            <li id="$id"data-action="parametrage" class="parametre">parametrage</li>
            <li> Mode <i class="fas fa-caret-right"></i>
                <ul class="aligner">
                    <li data-action="modeTheorique">
                    <form method="POST">
                        <input type="hidden" name="id_stations" value="$id">
                        <input type="hidden" name="sousTypeOperation" value="1">
                        <input type="hidden" name="codebarre" value="modeMenu">
                        <button type="submit"class="menuMode">Théorique</button>
                    </form>
                    <li data-action="modeReel">Réel</li>
                    <li data-action="modeInopérant">Inopérant</li>
                </ul>
            </li>    
            <li data-action="horaire" class="horaireLigne">Horaires de passage</li>
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