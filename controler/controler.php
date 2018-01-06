
<?php
##### FICHIER DE CONTROLE #####
/*
 * Role du fichier : 
 *  Demande aux differents modèles des données, puis il les distribuent
 *  dans les fichier de vue adéquate. 
 */


require_once('model/model.php');
//require_once('model/user.class.php');
//require_once('model/form.class.php');


/**
 * Methode de test (pour l'instant)
 */
function defaultMethode()
{
    
    require('view/indexView.php');
    var_dump(userExist("durantmarc@gmail.com"));
    
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