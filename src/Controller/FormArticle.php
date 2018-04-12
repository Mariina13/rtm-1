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
        $typeMessagerie         = $objetRequest->get("typeMessagerie", "");

        if (isset($_POST["id_stations"]) && ($texte != ""))
        {
        
        $typeMessagerie = 2 ;

        $messageEnvoye  = "1";
        $dateEnvoi = date("Y-m-d H:i:s");
        


        //Traitement des informations pour la table opération utilisateurs
        $sousTypeOperation = 0 ;

        $idStations = $_POST["id_stations"];
        $idStations = implode(',' , $idStations);
     
        // on récupére l'identifiant de l'utilisateur
        $idUser         = $objetSession->get("id");
        
        $dateOperation = date("Y-m-d H:i:s");
        // Insertion dans la base de données
        $objetConnection->insert("messagerie_commerciale", 
                                [   "id_stations"       => $idStations,
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
        $this->objetRequest = $objetRequest;
        
        $dateOperation         = $objetRequest->get("dateOperation","");
        $operation             = $objetRequest->get("operation","");
        $sousTypeOperation     = $objetRequest->get("sousTypeOperation", "");
        $idStations            = $objetRequest->get("idStations","");

        $operation = 2;

        if (isset($_POST["id_stations"]) && ($sousTypeOperation == 1))
        {

        //Traitement des informations pour la table opération utilisateurs
        $idStations     = $_POST["id_stations"];
        // on récupére l'identifiant de l'utilisateur
        $idUser         = $objetSession->get("id");
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
        //Traitement des informations pour la table opération utilisateurs
        $idStations     = $_POST["id_stations"];
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
        //Traitement des informations pour la table opération utilisateurs
        $idStations     = $_POST["id_stations"];
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
        $idUpdate               = $objetRequest->get("idUpdate","");       
        $idStations             = $objetRequest->get("idStations","");
        $operation              = $objetRequest->get("operation","");
        
        // CONVERTIR $idUpdate EN NOMBRE
        $idUpdate = intval($idUpdate);
        
            if (($idUpdate > 0) && ($operation != ""))
            {   
                $utilisateursId   = $objetSession->get("id");
                
                $dateOperation    = date("Y-m-d H:i:s");
                $operation        = $objetRequest->get("operation");
                $idStations       = $objetRequest->get("id_stations");

                $idStations     = $_POST["id_stations"];
                $idStations = implode(',' , $idStations);


                $tabLigneUpdate =   [       "id_stations"        => $idStations,
                                            "operation"          => $operation,
                                            "utilisateurs_id"    =>  $utilisateursId,
                                            "date_operation"     => $dateOperation                                          
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
        $idUpdate               = $objetRequest->get("idUpdate","");       
        $idStations             = $objetRequest->get("idStations","");       
        $texte                  = $objetRequest->get("texte","");
        $operation              = $objetRequest->get("operation","");
        $messageAnnule          = $objetRequest->get("messageAnnule","");
        $typeMessagerie         = $objetRequest->get("typeMessagerie", "");
        
        // CONVERTIR $idUpdate EN NOMBRE
        $idUpdate = intval($idUpdate);
        
            if (($idUpdate > 0) && ($texte != "") && ($operation != ""))
            {   
                
                
                $utilisateursId   = $objetSession->get("id");
                
                $dateOperation    = date("Y-m-d H:i:s");
                $operation        = $objetRequest->get("operation");
                $typeMessagerie = 2;
                $idStations       = $objetRequest->get("id_stations");

                //$idStations     = $_POST["id_stations"];
                $idStations = implode(',' , $idStations);

                $dateEnvoi = date("Y-m-d H:i:s");
                
                $tabLigneUpdate =   [       "id_stations"        => $idStations,
                                            "operation"          => $operation,
                                            "utilisateurs_id"    =>  $utilisateursId,
                                            "date_operation"     => $dateOperation,
                                            "type_messagerie"    => $typeMessagerie                                         
                                    ];
                $objetConnection->update("table_operations_utilisateur", $tabLigneUpdate,["id" => $idUpdate ]);

                $tabLigneUpdate =   [       "id_stations"        => $idStations,
                                            "texte"              => $texte,
                                            "date_envoi"         => $dateEnvoi                                            
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
            $dateAnnulation         = $objetRequest->get("dateAnnulation","");
            $typeMessagerie         = $objetRequest->get("typeMessagerie", "");
            
            
            // CONVERTIR $idUpdate EN NOMBRE
            $idUpdate = intval($idUpdate);
            //$operation = intval($operation);
        
                if (($idUpdate > 0) && ($operation == 5))
                {   
                    
                    $idStations       = $objetRequest->get("id_stations");

                    $dateAnnulation = date("Y-m-d H:i:s");
                    $dateOperation = date("Y-m-d H:i:s");

                    $utilisateursId           = $objetSession->get("id");

                    $messageEnvoye = "0";
                    $messageAnnule = 1 ;

                    $typeMessagerie = 2;

                    $tabLigneUpdate =   [       "utilisateurs_id"       => $utilisateursId,
                                                "id_stations"           => $idStations,
                                                "operation"             => $operation,
                                                "utilisateurs_id"       => $utilisateursId,
                                                "date_operation"        => $dateOperation                                          
                                        ];
                    $objetConnection->update("table_operations_utilisateur", $tabLigneUpdate,["id" => $idUpdate ]);

                    $tabLigneUpdate =   [       "id_stations"       => $idStations,
                                                "date_annulation"   => $dateAnnulation,
                                                "type_messagerie"   => $typeMessagerie,
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
                                                "dateModification"  => $dateModification,
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
        function supprimerUtilisateur ($objetRequest, $objetConnection, $cheminSymfony, $objetSession, $tableName, $colName)
    {
        $idDelete          = $objetRequest->get("idDelete", "");
        // CONVERTIR EN NOMBRE
        $idDelete        = intval($idDelete);
        $nom             = $objetRequest->get("nom", "");
        $prenom          = $objetRequest->get("prenom", "");
        $niveau          = $objetRequest->get("niveau","");
        $user            = $objetRequest->get("user", "");
        $utilisateursId  = $objetRequest->get("utilisateursId","");

        //$verifUser  = $objetSession->get("id");
        $verifUser = $objetSession->get("id");
    
            // SECURITE TRES BASIQUE
            if ($idDelete > 0)
            {
            /*$utilisateursId = NULL;

            $tabLigneUpdate =   [ "utilisateurs_id" => $utilisateursId
                                ];
            $objetConnection->update("table_operations_utilisateur", $tabLigneUpdate, [ "id" => $idDelete]);
            */
            $objetConnection->delete($tableName, [ $colName => $idDelete ]);
            // Message retour pour L'utilisateur
            
            echo 
            <<<CODEHTML
            <div class="ok">L'utilisateur $nom a été supprimé</div>
CODEHTML;
                // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#delete
              
            }
            else
            {
            
            echo
            <<<CODEHTML
                <div class="ko">  <i class="fas fa-exclamation-triangle"></i>  Attention , Vous ne pouvez pas supprimer votre compte administrateur !</div>
CODEHTML;
            }        
    }
   
}