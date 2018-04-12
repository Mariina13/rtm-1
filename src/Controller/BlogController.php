<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\Utilisateurs;

class BlogController
    extends Controller

{
  /**
      * @Route("/", name="accueil")
      */   
    public function accueil (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
    {
          
          ob_start();
      
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER rtm-1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-login.php");
          
        
        $contenuCache = ob_get_clean();
        $verifNiveau = $objetSession->get("niveau");
        if ($verifNiveau >= 7)
        {
            // ON VA VERS LA PAGE admin
            $urlFrontalSiv = $this->generateUrl("frontalsiv");
            return new RedirectResponse($urlFrontalSiv);
        }
        else
        {
            // ON VA SUR LA PAGE D'ACCUEIL 
            
            return new Response($contenuCache);
        }
        
    }
    /**
      * @Route("/frontalsiv", name="frontalsiv")
      */   
      public function frontalSiv (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
      {


        ob_start();
    
       // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
       $cheminSymfony   = $this->getParameter('kernel.project_dir');
       $cheminTemplates = "$cheminSymfony/templates"; 
       $cheminPart      = "$cheminTemplates/part"; 
       require_once("$cheminTemplates/template-accueil.php");
        
       
       $contenuCache = ob_get_clean();
       
       return new Response($contenuCache);

      }
      /**
      * @Route("/mode", name="mode")
      */   
      public function mode (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
      {


        ob_start();
    
       // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
       $cheminSymfony   = $this->getParameter('kernel.project_dir');
       $cheminTemplates = "$cheminSymfony/templates"; 
       $cheminPart      = "$cheminTemplates/part"; 
       require_once("$cheminTemplates/template-mode.php");
        
       
       $contenuCache = ob_get_clean();
       
       return new Response($contenuCache);

      }
       /**
      * @Route("/utilisateurs", name="utilisateurs")
      */
      public function utilisateurs (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
      {


        ob_start();
    
       // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
       $cheminSymfony   = $this->getParameter('kernel.project_dir');
       $cheminTemplates = "$cheminSymfony/templates"; 
       $cheminPart      = "$cheminTemplates/part"; 
       require_once("$cheminTemplates/template-utilisateurs.php");
        
       
       $contenuCache = ob_get_clean();
       
       return new Response($contenuCache);

      }
       /**
      * @Route("/messagerie", name="messagerie")
      */   
      public function messagerie (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
      {

 
        ob_start();
    
       // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
       $cheminSymfony   = $this->getParameter('kernel.project_dir');
       $cheminTemplates = "$cheminSymfony/templates"; 
       $cheminPart      = "$cheminTemplates/part"; 
       require_once("$cheminTemplates/template-messagerie.php");
        
       
       $contenuCache = ob_get_clean();
       
       return new Response($contenuCache);

      }
      /**
      * @Route("/message", name="message")
      */   
      public function message (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
      {

 
        ob_start();
    
       // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
       $cheminSymfony   = $this->getParameter('kernel.project_dir');
       $cheminTemplates = "$cheminSymfony/templates"; 
       $cheminPart      = "$cheminTemplates/part"; 
       require_once("$cheminTemplates/template-update-message.php");
        
       
       $contenuCache = ob_get_clean();
       
       return new Response($contenuCache);

      }
       /**
      * @Route("/parametrage", name="parametrage")
      */   
      public function parametrage (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
      {


        ob_start();
    
       // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
       $cheminSymfony   = $this->getParameter('kernel.project_dir');
       $cheminTemplates = "$cheminSymfony/templates"; 
       $cheminPart      = "$cheminTemplates/part"; 
       require_once("$cheminTemplates/template-accueil.php");
        
       
       $contenuCache = ob_get_clean();
       
       return new Response($contenuCache);

      }

}