<?php
error_reporting(E_ALL);  

    if ($objetRequest->get("afficher", "") == "modeCreate")
    {
        require_once("$cheminPart/section-mode-create.php");
        
    }

    if ($objetRequest->get("afficher", "") == "updateMode")
    {
        require_once("$cheminPart/section-mode-update.php");
    }   
    require_once("$cheminPart/section-mode-read.php");

?>
