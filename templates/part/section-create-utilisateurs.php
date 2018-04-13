<?php

error_reporting(E_ALL);

?>
<!--<a class="retour" href="<//?//php echo $urlUtilisateurs ?>"> Retour </a>-->
<section class="formUtilisateur">
    <h2> Créer un nouvel utilisateur <i id="i" class="fas fa-user-plus"></i></h2>

        <form method="POST">
            <input class="champ" type="text" name="nom" required placeholder="Nom"/>
            <input class="champ" type="text" name="prenom" required placeholder="Prénom"/>
            <input class="champ" type="text" name="user" required placeholder="Identifiant"/>
            <select name="niveau" required>
                <option value=""> -- Choisissez le type d'utilisateur --</option>
                <option value="4"> 4 ( Accés messagerie)</option>
                <option value="7"> 7 ( Utilisateur )</option>
                <option value="9"> 9 ( Administrateur )</option>
            </select>
            <input type="password" name="password" required placeholder="Mot de passe"/>
            <button type="submit"> Valider <i id="modifCreer" class="fas fa-check"></i></button>
            <input type="hidden" name="afficher" value="create">
            <input type="hidden" name="codebarre" value="inscription"/>
            <div class="response">


<?php
if ($objetRequest->get("codebarre", "") == "inscription")
{
    
    $objetTraitementForm = new App\Controller\TraitementForm;

    //On appelle les fichiers doctrine de l'entité Utilisateurs
    $objetRepository     = $this->getDoctrine()->getRepository(App\Entity\Utilisateurs::class);
    $objetTraitementForm->traiterInscription($objetRequest, $objetConnection, $objetRepository);
}

?>
            </div>  
        </form>
</section>

<hr>
