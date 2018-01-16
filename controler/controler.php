
<?php
##### FICHIER DE CONTROLE #####
/*
 * Role du fichier : 
 *  Demande aux differents modèles des données, puis il les distribuent
 *  dans les fichier de vue adéquate. 
 */

require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER.DS .'model'. DS .'model.php');

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}


// Reservation d'un participant
if(isset($_GET['place']) && isset($_GET['date']) && isset($_GET['userid']))
{
    
    if(!empty($_GET['place']) && !empty($_GET['date']) && !empty($_GET['userid']))
    {
        $place = htmlspecialchars($_GET['place']);
        $date = htmlspecialchars($_GET['date']);
        $userid = htmlspecialchars($_GET['userid']);
        
        reservation($userid, $place, $date, null);
        initSessionUsersCalendar();
        header("location: /Projet_SUAPS/view/reservView.php");
    }
}



/**
 * Methode de test (pour l'instant)
 */
function defaultMethode()
{
    require(ROOT_FOLDER.DS.'view'.DS.'indexView.php');
    
}

/**
 * Controleur pour les statistique de l'utilisateur
 */
function statisticUser()
{
    
}

/**
 * Controleur pour la réservation d'un utilisateur
 */
function booking()
{
    
}

/**
 * Autre Controleur .....
 */
function autre()
{
    
}