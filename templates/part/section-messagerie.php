<?php 

    if ($objetRequest->get("afficher", "") == "updateMessage")
    {
        require_once("$cheminPart/section-messagerie-update.php");
    }   

    if ($objetRequest->get("afficher", "") == "createMessage")
    {
        require_once("$cheminPart/section-messagerie-create.php");
        
    }
    if ($objetRequest->get("afficher", "") == "updateMessageAnnule")
    {
        require_once("$cheminPart/section-messagerie-annule.php");
        
    }
    
 require_once("$cheminPart/section-messagerie-read.php");

 
 ?>