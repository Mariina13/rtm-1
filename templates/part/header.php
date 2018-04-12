<?php
// JE RECUPERE LES URLS DES PAGES GRACE AU NOM DE LEUR ROUTE
$urlAccueil             = $this->generateUrl("accueil");
$urlLogin               = $this->generateUrl("login");
$urlFrontalSiv          = $this->generateUrl("frontalsiv");
$urlUtilisateurs        = $this->generateUrl("utilisateurs");
$urlMode                = $this->generateUrl("mode");
$urlParametrage         = $this->generateUrl("parametrage");
$urlMessagerie          = $this->generateUrl("messagerie");
$urlLogout              = $this->generateUrl("logout");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FRONTAL SIV V3.0</title>
    
    <!-- FONT AWESOME CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/fa-svg-with-js.css"/>
    <!-- DATATABLES -->
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/datatables.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/select.dataTables.min.css">
    
    <!-- CSS DES IHM -->
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/utilisateurs.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/sectionAccueil.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/tableau.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/messagerie.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/mediaScreen.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/mode.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/dataTables.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/frontalsiv_accueil.css">
</head>

<body>
    <header id="table_entete">
        <img src="assets/img/logo_sle_groupe_reactis2.bmp"/>

        <h1 class="h1">FRONTAL SIV SUPERVISION V3.0</h1>

    <div class="nav">

<?php
$verifNiveau = $objetSession->get("niveau");
// ON AFFICHE LE MENU A PARTIR DU NIVEAU 7
if ($verifNiveau >= 7)
{
    
    echo 
<<<CODEHTML
    <nav>
    <ul class="menu">
        <li>
            <a href="$urlFrontalSiv"> Gestion des Bornes </a>
        </li>
CODEHTML;
}
    if($verifNiveau >= 4)
    {
    echo
<<<CODEHTML
        <li>
            <a href="$urlMessagerie">Messagerie Commerciale</a>
        </li>
CODEHTML;
    }
    if($verifNiveau >= 7)
    {
        echo
<<<CODEHTML
        <li>
            <a href="$urlMode">Mode</a>
        </li>
        <li>
            <a href="$urlUtilisateurs">Espace Utilisateur</a>
CODEHTML;
        }
    if($verifNiveau >= 4)
    {
        echo
<<<CODEHTML
        <li>
            <a  href="$urlLogout"> Deconnexion </a>
        </li>
    </ul>
</nav>
CODEHTML;
    
    }
?>
    </div>
</header>

    <main>