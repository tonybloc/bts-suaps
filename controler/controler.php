

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
function homepageMode()
{
    require(ROOT_FOLDER.DS.'view'.DS.'homepage.php');
}

/**
 * Controleur pour les statistique de l'utilisateur
 */
function statisticMode()
{
    require(ROOT_FOLDER.DS.'controler'.DS.'controlerStatistic.php');
}

/**
 * Controleur pour la réservation d'un utilisateur
 */
function bookingMode()
{
    require(ROOT_FOLDER.DS.'controler'.DS.'controlerBooking.php');
}

/**
 * Controleur pour la connexion
 */
function loginMode()
{
    require(ROOT_FOLDER.DS.'controler'.DS.'controlerLogin.php');
}