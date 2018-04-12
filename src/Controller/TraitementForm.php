<?php
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

use ORM\EntityManager;

namespace App\Controller;
// DANS LA MECANIQUE DE SYMFONY
// App              => src
// App\Controller   => src/Controller

class TraitementForm
{
    // METHODES
    // CONSTRUCTEUR
    function __construct ()
    {
        // DEBUG
        // echo "[TraitementForm::__construct]";
    }
    
    function traiterInscription ($objetRequest, $objetConnection, $objetRepository)
    {
      
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $user               = $objetRequest->get("user",    "");
        $nom                = $objetRequest->get("nom",     "");
        $prenom             = $objetRequest->get("prenom",  "");
        $password           = $objetRequest->get("password","");
        $niveau             = $objetRequest->get("niveau","");
        $heureConnexion     = $objetRequest->get("heureConnexion", "");
        $heureDeconnexion   = $objetRequest->get("heureDeconnexion","");
        $dateInscription    = $objetRequest->get("dateInscription", "");
        
        $dateInscription = date("Y-m-d H:i:s");
        // UN PEU DE SECURITE (BASIQUE)
        if ( ($user != "") && ($password != "") && ($niveau != ""))
        {
           
            // On vérifie que l'user et le membre ne sont déjà pas dans la base
            $objetUtilisateurs = $objetRepository->findBy(["user" => $user]);

            if ($objetUtilisateurs) 
            {
                echo
<<<CODEHTML
<div class ="ko"> L'identifiant est déjà pris</div>
CODEHTML;
            }

            else 
            {        
            // http://php.net/manual/en/function.password-hash.php
            $password = hash('sha256', $password, false);
            
            // ON VA STOCKER LES INFOS DANS LA TABLE SQL user
            // ON VA UTILISER UN OBJET FOURNI PAR SYMFONY DE LA CLASSE Connection
            $objetConnection->insert("utilisateurs", 
                                        [   
                                            "niveau"           => $niveau,
                                            "prenom"           => $prenom,
                                            "nom"              => $nom, 
                                            "user"             => $user, 
                                            "password"         => $password,                                
                                        ]);
            
            // MESSAGE POUR LE VISITEUR
            echo "L'utilisateur $nom $prenom ($user) a bien été créé ";
            }

        }   
        
        
    }
    
    function traiterLogin ($objetRequest, $objetConnection, $objetRepository, $objetSession)
    {
        
        $user      = $objetRequest->get("user",       "");
        $password   = $objetRequest->get("password",    "");
        
        // UN PEU DE SECURITE (BASIQUE)
        if ( ($user != "") && ($password != ""))
        {

            $objetUtilisateurs  = $objetRepository->findOneBy([ "user" => $user ]);
            if ($objetUtilisateurs)
            {
              
                $idUser         = $objetSession->get("id"); 
                $password = hash('sha256', $password, false);
                //$passwordHash = $objetUtilisateurs->getPassword();
                
                if ($password)
                {
                    $tabResultat         = $objetRepository->ajouterHeureConnexion($objetConnection, $user);
                    //OK
                    // LES MOTS DE PASSE CORRESPONDENT
                    $user           = $objetUtilisateurs->getUser();
                    $niveau         = $objetUtilisateurs->getNiveau();
                    $id             = $objetUtilisateurs->getId();
                    $nom            = $objetUtilisateurs->getNom();
                    $prenom         = $objetUtilisateurs->getPrenom();
                    
                    // MEMORISER LES INFOS DANS UNE SESSION
                    
                    $objetSession->set("id", $id);
                    $objetSession->set("niveau", $niveau);
                    $objetSession->set("user", $user);
                    $objetSession->set("nom", $nom);
                    $objetSession->set("prenom", $prenom);
                    $objetSession->set("password", $password);
                   
                    
                }
                else 
                {
                    // KO
                    // LE MOT DE PASSE N'EST PAS BON
                    echo 
<<<CODEHTML
<div class="ko"> Mot de passe incorrect </div>
CODEHTML;
}
            }
            else 
            {
                echo 
    <<<CODEHTML
    <div class="ko"> Identifiant inconnu</div>
CODEHTML;
            }
        }

    }
    function traiterParametre($objetRequest, $objetConnection, $objetRepository, $objetSession)
    {

        $id                      = $objetRequest->get("id","");
        $idStations              = $objetRequest->get("idStations","");
        $version                 = $objetRequest->get("version",  "");
        $seuilApprocheVehicule   = $objetRequest->get("seuilApprocheVehicule","");
        $modeAffRuptureCom       = $objetRequest->get("modeAffRuptureCom","");
        $seuilDetRuptureCom      = $objetRequest->get("seuilDetRuptureCom", "");
        $modeDeFonctionnement    = $objetRequest->get("modeDeFonctionnement","");
        $seuilDeMaintien         = $objetRequest->get("seuilDeMaintien", "");
        $texteProxVehicule       = $objetRequest->get("texteProxVehicule", "");
        $envoye                  = $objetRequest->get("envoye","");
        //TABLE OPERATION UTILISATEUR

        $dateOperation         = $objetRequest->get("dateOperation","");
        $operation             = $objetRequest->get("operation","");
        $sousTypeOperation     = $objetRequest->get("sousTypeOperation", "");
        // UN PEU DE SECURITE (BASIQUE)
            if (isset($_POST["id_stations"]) && ($version != "") && ($modeAffRuptureCom != ""))
            {
            
                $envoye = 1;
                
                $sousTypeOperation = 0 ;
                $dateOperation = date("Y-m-d H:i:s");
                $modeDeFonctionnement = 1;
                
                $operation = 1;
                
                $idStations     = $_POST["id_stations"];

                $objetConnection->insert("parametrage_bornes", 
                            [   
                                "version"                => $version,
                                "id_stations"            => $idStations,
                                "seuilApprocheVehicule"  => $seuilApprocheVehicule, 
                                "modeAffRuptureCom"      => $modeAffRuptureCom, 
                                "seuilDetRuptureCom"     => $seuilDetRuptureCom,
                                "modeDeFonctionnement"   => $modeDeFonctionnement,
                                "seuilDeMaintien"        => $seuilDeMaintien,
                                "texteProxVehicule"      => $texteProxVehicule,
                                "envoye"                 => $envoye                         
                            ]);
                $idUser           = $objetSession->get("id");

                $objetConnection->insert("table_operations_utilisateur",
                            [   "utilisateurs_id"       => $idUser,
                                "date_operation"        => $dateOperation,
                                "operation"             => $operation,
                                "sous_type_operation"   => $sousTypeOperation,
                                "id_stations"           => $idStations
                            ]);
            // MESSAGE POUR LE VISITEUR
            /*echo
<<<CODEHTML
        <div class="response"> Vos paramétres ont été appliqués. </div>
CODEHTML;*/
            
            }
            else
            {
                $envoye = 0;
                $modeDeFonctionnement = 2;
                $idSations = $objetRequest->get("id","");
            
                $objetConnection->insert("parametrage_bornes", 
                            [   
                                "id_stations"            => $idStations,
                                "version"                => $version,
                                "seuilApprocheVehicule"  => $seuilApprocheVehicule, 
                                "modeAffRuptureCom"      => $modeAffRuptureCom, 
                                "seuilDetRuptureCom"     => $seuilDetRuptureCom,
                                "modeDeFonctionnement"   => $modeDeFonctionnement,
                                "seuilDeMaintien"        => $seuilDeMaintien,
                                "texteProxVehicule"      => $texteProxVehicule,
                                "envoye"                 => $envoye                         
                            ]);
    echo
    <<<CODEHTML
            <div class="ko"> Vos paramétres n'ont pas pu être appliqués. </div>
CODEHTML;
                                    
            }
    }   
}

