<?php 

$verifNiveau = $objetSession->get("niveau");
// On affiche que La modification au niveau 7
if ($verifNiveau >= 7)
{
    if ($objetRequest->get("afficher", "") == "updateUser")
    {
        require_once("$cheminPart/section-update-utilisateurs.php");
    }
}
if($verifNiveau == 9)
{   

    if ($objetRequest->get("afficher", "") == "create")
    {
        require_once("$cheminPart/section-create-utilisateurs.php");
        
    }
    if ($objetRequest->get("afficher", "") == "update")
    {
        require_once("$cheminPart/section-update-utilisateurs.php");
    }

}
 require_once("$cheminPart/section-read-utilisateurs.php");