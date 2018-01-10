
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