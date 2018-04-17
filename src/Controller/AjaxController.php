<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

//namespace App\Entity\Bornes;
//namespace App\Entity\TableEtatSysteme;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AjaxController
    extends Controller


{


    /*public function executeList(Request $objetRequest)
    {
        if ($objetRequest->isXmlHttpRequest())
        {
            $q = Doctrine_Query::create()
            ->select('id,sigep,type,type_equipement,adresse_equipement,numero_interne,sigep_virtuel,connexion,quai_defaut,data_spoti,ref_version_table,data_siv_sent')
            ->from('bornes');

            $pager = $this->getPager('bornes', $q, $objetRequest->getParameter('ajax', $this->getPage()), $request->getParameter('iDisplayLength'));

            $aaData = array();
            $list = $pager->getResults();
            foreach ($list as $v)
            {                                             
            $aaData[] = array(
                "0" => $v->getId(),
                "1" => $v->getSigep(),
                "2" => $v->getType(),
                "3" => $v->getTypeEquipement(),
                "4" => $v->getAdresseEquipement(),
                "5" => $v->getNumeroInterne(),
                "6" => $v->getSigepVirtuel(),
                "7" => $v->getConnexion(),
                "8" => $v->getQuaiDefaut(),
                "9" => $v->getDataSpoti(),
                "10" => $v->getRefVersionTable(),
                "11" => $v->getDtaSivSent(),
                );
            }

            $output = array(
                "iTotalRecords" => count($pager),
                "iTotalDisplayRecords" => $request->getParameter('iDisplayLength'),
                "aaData" => $aaData,
            );

        return $this->renderText(json_encode($output));
        }
    }*/
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