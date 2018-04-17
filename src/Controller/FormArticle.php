<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;// DANS LA MECANIQUE DE SYMFONY
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
class FormArticle
    extends SecuController
{
    
    protected $objetRequest;
    // METHODES
    function creerMessage ($objetRequest, $objetConnection, $cheminSymfony, $objetSession)
    {
        $this->objetRequest = $objetRequest;
       
        // SI L'INFO N'EST PAS PRESENTE 
        // ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $texte                 = $objetRequest->get("texte","");
        $messageEnvoye         = $objetRequest->get("messageEnvoye", "");
        $typeMessagerie        = $objetRequest->get("typeMessagerie", "");
        $operation             = $objetRequest->get("operation","");
        $sousTypeOperation     = $objetRequest->get("sousTypeOperation", "");
        $typeMessagerie        = $objetRequest->get("typeMessagerie", "");
        $idInterne             = $objetRequest->get("idInterne","");
        $validite              = $objetRequest->get("validite","");
        if (isset($_POST["id_stations"]) && ($texte != ""))
        {
        
        $typeMessagerie = 2 ;
        $messageEnvoye  = 1;
        $dateEnvoi = date("Y-m-d H:i:s");
        //Traitement des informations pour la table opération utilisateurs
        $sousTypeOperation = 0 ;
        $idStations = $_POST["id_stations"];
        $idStations = implode(',' , $idStations);
        
        $idInterne = $idStations.$texte ;
        // on récupére l'identifiant de l'utilisateur
        $idUser         = $objetSession->get("id");
        
        $dateOperation = date("Y-m-d H:i:s");
        // Insertion dans la base de données
        $objetConnection->insert("messagerie_commerciale", 
                                [   "id_stations"       => $idStations,
                                    "id_interne"        => $idInterne,
                                    "validite"          => $validite,
                                    "texte"             => $texte,
                                    "date_envoi"        => $dateEnvoi,
                                    "message_envoye"    => $messageEnvoye,
                                    "type_messagerie"   => $typeMessagerie,
                                ]);        
        // Insertion dans la 2éme table
        $objetConnection->insert("table_operations_utilisateur",
                                [   "utilisateurs_id"       => $idUser,
                                    "date_operation"        => $dateOperation,
                                    "operation"             => $operation,
                                    "sous_type_operation"   => $sousTypeOperation,
                                    "id_stations"           => $idStations
                                ]);
        echo
        <<<CODEHTML
        <div class="ok"> Votre message est envoyé</div>
CODEHTML;
        }
        else
        {    
        echo
            <<<CODEHTML
            <div class="ko"> Le message n'as pas pu être envoyé </div>
CODEHTML;
        }
    }
    function creerMode ($objetRequest, $objetConnection, $cheminSymfony, $objetSession)
    {
        
        $dateOperation         = $objetRequest->get("dateOperation","");
        $operation             = $objetRequest->get("operation","");
        $sousTypeOperation     = $objetRequest->get("sousTypeOperation", "");
       
        $operation = 2;
        if (isset($_POST["id_stations"]) && ($sousTypeOperation == 1))
        {
        // on récupére l'identifiant de l'utilisateur
        $idUser         = $objetSession->get("id");
        //ON TRANSFORME LES STATIONS EN TABLEAUX POUR TOUTES LES RECUPEREES
        $idStations     = $_POST["id_stations"];
        $idStations = implode(',' , $idStations);
        
        $dateOperation = date("Y-m-d H:i:s");
     
            $objetConnection->insert("table_operations_utilisateur",
                                [   "utilisateurs_id"       => $idUser,
                                    "date_operation"        => $dateOperation,
                                    "operation"             => $operation,
                                    "sous_type_operation"   => $sousTypeOperation,
                                    "id_stations"           => $idStations
                                ]);
            
        echo
        <<<CODEHTML
        <div class="ok"> Le mode Théorique est activé </div>
CODEHTML;
        }
        if(isset($_POST["id_stations"]) && ($sousTypeOperation == 2))
        {
       //ON TRANSFORME LES STATIONS EN TABLEAUX POUR TOUTES LES RECUPEREES
        $idStations     = $_POST["id_stations"];
        $idStations = implode(',' , $idStations);
        // on récupére l'identifiant de l'utilisateur
        $idUser         = $objetSession->get("id");
        $dateOperation = date("Y-m-d H:i:s");
     
            $objetConnection->insert("table_operations_utilisateur",
                                [   "utilisateurs_id"       => $idUser,
                                    "date_operation"        => $dateOperation,
                                    "operation"             => $operation,
                                    "sous_type_operation"   => $sousTypeOperation,
                                    "id_stations"           => $idStations
                                ]);
            
        echo
        <<<CODEHTML
        <div class="ok"> Le mode Réel est activé </div>
CODEHTML;
        }
        if(isset($_POST["id_stations"]) && ($sousTypeOperation == 3))
        {
       //ON TRANSFORME LES STATIONS EN TABLEAUX POUR TOUTES LES RECUPEREES
        $idStations     = $_POST["id_stations"];
        $idStations = implode(',' , $idStations);
        // on récupére l'identifiant de l'utilisateur
        $idUser         = $objetSession->get("id");
        
        $dateOperation = date("Y-m-d H:i:s");
     
            $objetConnection->insert("table_operations_utilisateur",
                                [   "utilisateurs_id"       => $idUser,
                                    "date_operation"        => $dateOperation,
                                    "operation"             => $operation,
                                    "sous_type_operation"   => $sousTypeOperation,
                                    "id_stations"           => $idStations
                                ]);
            
        echo
        <<<CODEHTML
        <div class="ok"> Le mode Inopérant est activé </div>
CODEHTML;
        }
    }
    function updateMode ($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
    {
        $id                     = $objetRequest->get("id","");
        $idUpdate               = $objetRequest->get("idUpdate","");
        $sousTypeOperation     = $objetRequest->get("sousTypeOperation", "");
        // CONVERTIR $idUpdate EN NOMBRE
        $idUpdate = intval($idUpdate);
        
            if (isset($_POST["id_stations"]) && ($idUpdate > 0) && ($sousTypeOperation != ""))
            {   
                $idStations     = $_POST["id_stations"];
                $idStations = implode(',' , $idStations);
                 
                $utilisateursId   = $objetSession->get("id");
                
                $dateOperation     = date("Y-m-d H:i:s");
                $tabLigneUpdate =   [       "id_stations"         => $idStations,
                                            "sous_type_operation" => $sousTypeOperation,
                                            "utilisateurs_id"     =>  $utilisateursId,
                                            "date_operation"      => $dateOperation                                          
                                    ];
                $objetConnection->update("table_operations_utilisateur", $tabLigneUpdate,["id" => $idUpdate ]);
                echo 
                <<<CODEHTML
                <div class="ok">Modification(s) effectuée(s).</div>
CODEHTML;
            }
            
            else
            {
                echo
                <<<CODEHTML
                <div class="ko"> Veuillez remplir le(s) champ(s). </div>
CODEHTML;
            }
        }
    function updateMessage ($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
    {
        $id                     = $objetRequest->get("id","");
        $idUpdate               = $objetRequest->get("idUpdate","");       
        $idInterne              = $objetRequest->get("idInterne",""); 
        $sousTypeOperation      = $objetRequest->get("sousTypeOperation", "");  
        $operation              = $objetRequest->get("operation","");   
        $texte                  = $objetRequest->get("texte","");
        $idUpdate = intval($idUpdate);
        
            if (isset($_POST["id_stations"]) && ($idUpdate > 0) && ($texte != ""))
            {   
                $idStations     = $_POST["id_stations"];
                $idStations = implode(',' , $idStations);
                $idInterne = $idStations.$texte ;
                
                $utilisateursId   = $objetSession->get("id");
                $operation = 5;
                $sousTypeOperation = 1;
                $dateOperation    = date("Y-m-d H:i:s");
                $dateEnvoi = date("Y-m-d H:i:s");
                
                $tabLigneUpdate =   [       "id_stations"         => $idStations,
                                            "operation"           => $operation,
                                            "utilisateurs_id"     => $utilisateursId,
                                            "date_operation"      => $dateOperation,
                                            "sous_type_operation" => $sousTypeOperation                                        
                                    ];
                $objetConnection->update("table_operations_utilisateur", $tabLigneUpdate,["operation" => $idUpdate ]);
                $tabLigneUpdate =   [       "id_stations"        => $idStations,
                                            "texte"              => $texte,
                                            "date_envoi"         => $dateEnvoi,
                                            "id_interne"         => $idInterne                                        
                                    ];
                $objetConnection->update("messagerie_commerciale ", $tabLigneUpdate,["id" => $idUpdate]);
               
                echo 
                <<<CODEHTML
                <div class="ok">Modification(s) effectuée(s).</div>
CODEHTML;
            }
            
            else
            {
                echo
                <<<CODEHTML
                <div class="ko"> Veuillez remplir le(s) champ(s). </div>
CODEHTML;
            }
        }
        function updateMessageAnnule ($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
        {
            $idUpdate               = $objetRequest->get("idUpdate","");       
            $idStations             = $objetRequest->get("idStations","");       
            $operation              = $objetRequest->get("operation","");
            $dateOperation          = $objetRequest->get("dateOperation","");
            $messageAnnule          = $objetRequest->get("messageAnnule","");
            $sousTypeOperation     = $objetRequest->get("sousTypeOperation", "");
           
            // CONVERTIR $idUpdate EN NOMBRE
            $idUpdate = intval($idUpdate);
            //$operation = intval($operation);
        
                if (($idUpdate > 0) && ($operation == 5))
                {   
                    $sousTypeOperation = 2;
                    $dateAnnulation    = date("Y-m-d H:i:s");
                    $dateOperation     = date("Y-m-d H:i:s");
                    $utilisateursId  = $objetSession->get("id");
                    $messageEnvoye = 0;
                    $messageAnnule = 1 ;
                    $tabLigneUpdate =   [       "utilisateurs_id"       => $utilisateursId,
                                                "operation"             => $operation,
                                                "utilisateurs_id"       => $utilisateursId,
                                                "date_operation"        => $dateOperation,
                                                "sous_type_operation" => $sousTypeOperation                                        
                                        ];
                    $objetConnection->update("table_operations_utilisateur", $tabLigneUpdate,["id" => $idUpdate ]);
                    $tabLigneUpdate =   [       "date_annulation"   => $dateAnnulation,
                                                "message_envoye"    => $messageEnvoye, 
                                                "message_annule"    => $messageAnnule                                          
                                        ];
                    $objetConnection->update("messagerie_commerciale", $tabLigneUpdate,["id" => $idUpdate ]);
                                                 
                echo 
                <<<CODEHTML
                <div class="ok">Votre message a été annulé.</div>
CODEHTML;
                }
                else
                {
                echo
                <<<CODEHTML
                <div class="ko"> Le message n'a pas pu être annulé. </div>
CODEHTML;
                }
        }
    function updateUtilisateur ($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
    {
        $idUpdate               = $objetRequest->get("idUpdate","");       
        $nom                    = $objetRequest->get("nom","");       
        $prenom                 = $objetRequest->get("prenom","");       
        $user                   = $objetRequest->get("user","");
        $niveau                 = $objetRequest->get("niveau","");
        $password               = $objetRequest->get("password","");
        $confirmation           = $objetRequest->get("confirmation","");
        // CONVERTIR $idUpdate EN NOMBRE
        $idUpdate = intval($idUpdate);
            // SECURITE TRES BASIQUE
            if (($idUpdate >0) && ($user != "") && ($nom != "") && ($password != ""))
            {   
                // On test les 2 password s'ils sont identiques
                if($password == $confirmation)
                {
                $password = password_hash($password, PASSWORD_DEFAULT);
                // COMPLETER LES INFOS MANQUANTES
                $dateModification = date("Y-m-d H:i:s");
                // ON MET AUSSI A JOUR L'AUTEUR DE la modification
                $idUser           = $objetSession->get("id");
                // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#insert
                $tabLigneUpdate =   [       "nom"               => $nom, 
                                            "prenom"            => $prenom,
                                            "user"              => $user,
                                            "password"          => $password,
                                            "niveau"            => $niveau,
                                            "dateModification"  => $dateModification,
                                    ];
                $objetConnection->update("utilisateurs", $tabLigneUpdate, [ "id" => $idUpdate ]);
                // MESSAGE RETOUR POUR LE VISITEUR
                echo 
                <<<CODEHTML
                <div class="ok">Modification(s) effectuée(s) .</div>
CODEHTML;
                }
                else
                {
                    echo 
                <<<CODEHTML
                <div class="ko"> Veuillez saisir le même mot de passe</div>
CODEHTML;
                }
            }
            else
            {
                echo
            <<<CODEHTML
            <div class="ko">Veuillez remplir le champ <i class="fas fa-arrow-right"></i> Mot de passe </div>
CODEHTML;
            }
        }
        function updatePassword($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
        {
            $idUpdate               = $objetRequest->get("idUpdate","");       
            $password               = $objetRequest->get("password","");
            $confirmation           = $objetRequest->get("confirmation","");
    
            // CONVERTIR $idUpdate EN NOMBRE
            $idUpdate = intval($idUpdate);
    
                // SECURITE TRES BASIQUE
                if (($idUpdate > 0) && ($password != ""))
                {   
                    // On test les 2 password s'ils sont identiques
                    if($password == $confirmation)
                    {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $dateModification = date("Y-m-d H:i:s");
                    $idUser           = $objetSession->get("id");
    
                    // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#insert
                    $tabLigneUpdate =   [       "password"          => $password,
                                                "dateModification"  => $dateModification
                                        ];
                    $objetConnection->update("utilisateurs", $tabLigneUpdate, [ "id" => $idUpdate ]);
    
                    // MESSAGE RETOUR POUR LE VISITEUR
                    echo 
                    <<<CODEHTML
                    <div class="ok">Votre mot de passe a été modifié. </div>
CODEHTML;
                    }
                    else
                    {
                        echo 
                    <<<CODEHTML
                    <div class="ko"> Veuillez saisir le même mot de passe</div>
CODEHTML;
                    }
                }
                else
                {
                    echo
                <<<CODEHTML
                <div class="ko">Veuillez remplir le champ <i class="fas fa-arrow-right"></i> Mot de passe </div>
CODEHTML;
                }
        }
        function desactiverUtilisateur($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
        {
       
        $idUpdate = $objetRequest->get("idUpdate","");
        $password = $objetRequest->get("password","");
        $niveau   = $objetRequest->get("niveau","");
        $verifUser = $objetSession->get("id");
        $idUpdate = intval($idUpdate);
            // SECURITE TRES BASIQUE
            if ($idUpdate > 0)
            {
                $dateModification = date("Y-m-d H:i:s");
                $password = "1/;desactiver;/2";
                $niveau = 0;
        
                $tabLigneUpdate = [ "password"          => $password,
                                    "dateModification"  => $dateModification,
                                    "niveau"            => $niveau
                                  ];
                $objetConnection->update("utilisateurs", $tabLigneUpdate, [ "id" => $idUpdate ]);
                // MESSAGE RETOUR POUR LE VISITEUR
                echo
            <<<CODEHTML
            <div class="ok">L'utilisateur a été désactivé </div>
CODEHTML;
            }
            else
            {
            
            echo
            <<<CODEHTML
                <div class="ko">  <i class="fas fa-exclamation-triangle"></i>  Attention , le compte n'as pas pu être désactivé !</div>
CODEHTML;
            }        
        }
   
}