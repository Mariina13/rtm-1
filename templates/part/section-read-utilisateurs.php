<div class="ok">
<?php error_reporting(E_ALL);

ob_start();

        if ($objetRequest->get("codebarre", "") == "desactiver")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->desactiverUtilisateur($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}
?>
</div>
<?php
$verfNiveau = $objetSession->get("niveau");
if($verifNiveau == 9)
{

$messageUpdate = ob_get_clean();   
?>

<!--SECTION POUR LE BOUTON CREATE -->
<section id="ajouter" class="ajouter">

        <form class="formAjouter" method="POST" action="#section-create-utilisateurs">
            <label class="ajout"> Ajouter un nouvel utilisateur </label>
                <input type="hidden" name="afficher" value="create">
                <input type="hidden" name="codebarre" value="inscription">
                <button class="buttonAjout" type="submit"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
        </form>
</section>
<?php } ?>

<hr>
<?php echo $messageUpdate ?>
<!--SECTION POUR MODIFIER ET SUPPRIMER + AFFICHAGE DES DONNEES CELON LE NIVEAU -->
<section>
    <table id="tableId" class="read" data-order='[[ 1, "asc" ]]' data-page-length='5'>

<?php

    // on change le titre du tableau selon le niveau
    $verifNiveau = $objetSession->get("niveau");
    if($verifNiveau == 7)
    {
        echo
<<<CODEHTML
        <caption> Mes informations personnelles </caption>
CODEHTML;
}
    else
    {
        echo
<<<CODEHTML
        <caption> Liste des Utilisateurs </caption>
CODEHTML;
    }
?>

        <thead class="readEntete">
            <tr>
                <th> Identifiant </th>
                <th> Nom </th>
                <th> Prénom </th>
                <th> Niveau </th>
                <th> Modifier </th>
<?php
$verifNiveau = $objetSession->get("niveau");

// On affiche le delete / inscription pour l'administrateur
    if($verifNiveau == 9)
    {
        echo
<<<CODEHTML
            <th> Désactiver </th>
CODEHTML;
    }
?>
            </tr>
        </thead>
        <tbody>
<?php

$idUpdate = $objetRequest->get("idUpdate", 0);
// RECUPERER LES AUTRES INFOS POUR PRE-REMPLIR LE FORMULAIRE
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\Utilisateurs::class);
$objetUtilisateurs = $objetRepository->find($idUpdate);
    // on affiche tous les elements pour l'administrateur
    $verifNiveau         = $objetSession->get("niveau");
    if($verifNiveau == 9)
    {
        $objetRepository = $this->getDoctrine()->getRepository(App\Entity\Utilisateurs::class);
        $tabResultat     = $objetRepository->findBy([], ["dateInscription" => "ASC"]);
        // on parcours la BDD pour extraire les informations.
        foreach($tabResultat as $objetUtilisateurs)
        {
            $id              = $objetUtilisateurs->getId();
            $nom             = $objetUtilisateurs->getNom();
            $prenom          = $objetUtilisateurs->getPrenom();
            $user            = $objetUtilisateurs->getUser();
            $password        = $objetUtilisateurs->getPassword();
            $niveau          = $objetUtilisateurs->getNiveau();
            $dateInscription = $objetUtilisateurs->getDateInscription("d/m/Y");
        
            echo
<<<CODEHTML
            <tr>
                <td>$user</td>
                <td>$nom</td>
                <td>$prenom</td>
CODEHTML
?>
<td>
<?php
if($niveau == 0)
{
    echo "Compte Désactivé";
}
else
{
    echo"$niveau";
}
?>
</td>
                <td>
                <form method="POST" action="#section-update-utilisateurs">
                    <input type="hidden" name="afficher" value="update">
                    <input type="hidden" name="idUpdate" value="<?php echo $id ?>">
                    <button class="modifier" type="submit"><i class="fas fa-edit"></i></button>
                </form>
                </td>
                <td>
                <form method="POST">
                    <input type="hidden" name="codebarre" value="desactiver">
                    <input type="hidden" name="idUpdate" value="<?php echo $id ?>">
                    <button class="supprimer" type="submit"><i class="fas fa-user-times"></i></button>
                </form>
                </td>
            </tr>
<?php 
        }
    }
    //Pour les utilisateurs niveau 7
    $verifNiveau         = $objetSession->get("niveau");
    if($verifNiveau == 7)
    {   
        // On récupére la ligne de l'utilisateur connecté
        $id = $objetSession->get("id");

        $objetRepository = $this->getDoctrine()->getRepository(App\Entity\Utilisateurs::class);
        $tabResultat     = $objetRepository->lireListeUser($objetConnection,$id);

        // on parcours la BDD pour extraire les informations.
    foreach($tabResultat as $tabLigne)
    {
        // on parcours la BDD pour extraire les informations.
        extract($tabLigne);    
        
        echo
<<<CODEHTML
            <tr>
                <td>$nom</td>
                <td>$prenom</td>
                <td>$user</td>
                <td>$niveau</td>
CODEHTML;
?>              
                <td>
                <form method="POST" action="#section-update-utilisateurs">
                    <input type="hidden" name="afficher" value="updateUser">
                    <input type="hidden" name="idUpdate" value="<?php echo $id ?>">
                    <button class="modifier" type="submit"><i class="fas fa-edit"></i></button>
                </form>
                </td>
            </tr>
<?php
    }
    }
?>
        </tbody>
    </table>
</section>


