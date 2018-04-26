<?php

/*
 * Role du fichier : 
 * Liste les controleurs
 */

require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER.DS .'model'. DS .'model.php');

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}

/**
 * Affichage de la page d'acceuil
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