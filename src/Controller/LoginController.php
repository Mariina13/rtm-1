<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use ORM\EntityManager;

use App\Entity\Utilisateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class LoginController
    extends Controller
{
    /**
      * @Route("/login", name="login")
      */   
   public function login (Request $objetRequest, Connection $objetConnection, SessionInterface $objetSession)
   {
       
        ob_start();

        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER         
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-login.php");
        
        
        $contenuCache = ob_get_clean();
        
        
        $verifNiveau = $objetSession->get("niveau");
        if ($verifNiveau == 4)
        {
            // ON VA VERS LA PAGE admin
            $urlFrontalSiv = $this->generateUrl("messagerie");
            return new RedirectResponse($urlMessagerie);
        }
        elseif($verifNiveau >= 7)
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
      * @Route("/logout", name="logout")
      */   
   public function logout (Request $objetRequest, Connection $objetConnection, SessionInterface $objetSession)
   {    
        /*$heureDeconnexion = $objetRequest->get("heureDeconnexion","");
    
        $heureDeconnexion = date("Y-m-d H:i:s");

        $objetConnection->insert("utilisateurs",
                                [
                                    "heure_deconnexion" => $heureDeconnexion
                                ]);*/


            $objetSession->set("niveau", 0);
            $objetSession->set("nom", "");
            $objetSession->set("user",  "");
            $objetSession->set("id",  "");
        // on redirige sur la page de login
        $urlLogin = $this->generateUrl("login");

        return new RedirectResponse($urlLogin);
        
   }
 
 
   
   
}
