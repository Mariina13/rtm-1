<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

use App\Entity\Utilisateurs;

class AjaxController
    extends AbstractController


{
    /**
    * @Route("/ajax", name="ajax")
    */   
    public function ajax (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
    {

        ob_start();
    
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER rtm-1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminPart/ajax.php");

            $contenuCache = ob_get_clean();
            
            return new Response($contenuCache);
    }
          
      }