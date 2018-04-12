<?php
// AFFICHE LES ERREURS
error_reporting(E_ALL);

?>


<section class="formLogin">
    <h2>LOGIN</h2>
        <form action="" method="POST" >
            <input class="login" type="text" name="user" required placeholder="Identifiant"/>
            <input class="login" type="password" name="password" required placeholder=" Mot de passe" />
            <button id="connexion" type="submit">SE CONNECTER</button>
            <input type="hidden" name="codebarre" value="login">
            <div class="response">


  <?php

error_reporting(E_ALL);



if ($objetRequest->get("codebarre", "") == "login")
    {
        
        $objetTraitementForm = new App\Controller\TraitementForm;
        $objetRespository = $this->getDoctrine()->getRepository(App\Entity\Utilisateurs::class);

        $objetTraitementForm->traiterLogin( $objetRequest, 
                                            $objetConnection, 
                                            $objetRespository, 
                                            $objetSession );
    }


?>
            </div>   
        </form>
</section>