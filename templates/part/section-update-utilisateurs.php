<section class="update">


<?php error_reporting(E_ALL); 

ob_start();

// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "update")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateUtilisateur($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}
if ($objetRequest->get("codebarre", "") == "updateUser")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updatePassword($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}
$messageUpdate = ob_get_clean();

?>

<?php
$idUpdate = $objetRequest->get("idUpdate", 0);
// RECUPERER LES AUTRES INFOS POUR PRE-REMPLIR LE FORMULAIRE
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\Utilisateurs::class);
$objetUtilisateurs = $objetRepository->find($idUpdate);

            if ($objetUtilisateurs) :
    

// OK ON A TROUVE UN ARTICLE POUR CET ID
$nom             = $objetUtilisateurs->getNom();
$prenom          = $objetUtilisateurs->getPrenom();
$niveau          = $objetUtilisateurs->getNiveau();
$user            = $objetUtilisateurs->getUser();
$password        = $objetUtilisateurs->getPassword();
$dateInscription = $objetUtilisateurs->getDateInscription("d/m/Y");

$verifNiveau = $objetSession->get("niveau");
    // ON AFFICHE LE MENU A PARTIR DU NIVEAU 7
    if($verifNiveau == 9)
{ ?>

    <h3>Modifier les informations </h3>
        <form class="formUpdate" >
            <input type="text" name="nom" value="<?php echo $nom ?>" required autocomplete="on">
            <input type="text" name="prenom" value="<?php echo $prenom?>" autocomplete="on">
            <input type="text" name="user" value="<?php echo $user?>" autocomplete="on">
            <select name="niveau" required>
                <option value="">  Niveau actuel de l'utilisateur  : <?php echo $niveau ?> </option>
                <option value="4"> 4 ( Accés messagerie )</option>
                <option value="7"> 7 ( Utilisateur )</option>
                <option value="9"> 9 ( Administrateur )</option>
            </select>

            <input type="password" id= "password" name="password" value<?php echo $password?>required placeholder="Mot de passe">
            <input type="password" id= "confirmation" name="confirmation" placeholder="Confirmer le mot de passe">
            <form>
            <button type="submit"> <i id="modif" class="far fa-hand-point-right"></i> Modifier </button>
                <input type="hidden" name="afficher" value="update">
                <input type="hidden" name="idUpdate" value="<?php echo $idUpdate ?>">
                <input type="hidden" name="codebarre" value="update">
            </form>
            <div class="ok">
            <?php echo $messageUpdate ?>
            </div>
        </form>
<?php } 
    if($verifNiveau == 7)
       {

   ?>
   <h3> Modifier mon mot de passe </h3>
   <form class="formUpdate">
       <input id= "password" type="password" name="password" value<?php echo $password?> placeholder="Entrer votre nouveau mot de passe">
       <input id= "confirmation" type="password" name="confirmation" placeholder="Confirmer votre mot de passe" >
      
       <button class="buttonUser"type="submit"> <i id="modif" class="far fa-hand-point-right"></i> Modifier </button>
       <input type="hidden" name="afficher"  value="updateUser">
       <input type="hidden" name="idUpdate"  value="<?php echo $idUpdate ?>">
       <input type="hidden" name="codebarre" value="updateUser">
       <div class="ok">
       <?php echo $messageUpdate?>
       </div>
   </form>
   <?php 
   }
?>


</section>

<?php endif; ?>
<hr>
