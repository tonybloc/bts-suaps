
<?php
##### FICHIER DE MODELE #####
/*
 * Rôle du fichier :
 *  Cherche/Modifie/Insert des données dans la bdd
 *  Définit les actions à faire ...
 */

require_once('config.php');
require_once ('connect.class.php');
require_once ('user.class.php');


// Variables de connexion commune à toute les méthodes
$myConnection = new Connection();

/**
 * Vérifie si un utilisateur existe dans la base de donnée
 * @param string : $email, email de l'utilisateur
 */
function userExist($email)
{ 
    $myConnection->query("SELECT * FROM utilisateur WHERE email = :email");
    $myConnection->bind(':email', $email, PDO::PARAM_STR);
    $user = $myConnection->single();
    
    return (!empty($user)) ? true : false;
}

function userConnect($_email, $_password)
{
    if(userExist($_email))
    {
        $user = User::getUser($_email);
        if($_password === $user->getPassword())
        {
            $_SESSION['user_login'] = $user->getEmail();
            var_dump($_SESSION);
        }
    }
    else
    {
        
    }
    
}


