<?php
error_reporting(E_ALL);

//AFFICHE LE NOM DE LA PERSONNE CONNECTEE
$verifNom = $objetSession->get("nom");
$verifPrenom = $objetSession->get("prenom");


?>
<h4 class="bienvenue">Bienvenue <?php echo $verifPrenom?> <?php echo $verifNom ?></h4>

<!-- MENU -CONTEXTUEL -->
<?php require_once("$cheminPart/section-menu.php"); ?>

<!-- TABLEAUX -->

<?php require_once("$cheminPart/ajax.php"); ?>

