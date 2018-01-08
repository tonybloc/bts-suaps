
<?php
##### FICHIER DE MODELE #####
/*
 * Rôle du fichier :
 *  Cherche/Modifie/Insert des données dans la bdd
 *  Définit les actions à faire ...
 */
require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'model.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'connect.class.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'user.class.php');



// Variables de connexion commune à toute les méthodes
$myConnection = new Connection();

/**
 * Vérifie si un utilisateur existe dans la base de donnée
 * @param string : $email, email de l'utilisateur
 */
function userExist($email)
{ 
    global $myConnection;
    
    $myConnection->query("SELECT * FROM utilisateur WHERE email = :email");
    $myConnection->bind(':email', $email, PDO::PARAM_STR);
    $user = $myConnection->single();
    
    return (!empty($user)) ? true : false;
}
/**
 * Recupère les informations d'un utilisateur dans la bdd 
 * @param string $email
 * @return array|NULL
 * retourne la liste des information du l'utilisateur si il existe sinon retourne null
 */
function getUser($email)
{
   global $myConnection;
   
   $myConnection->query("SELECT * FROM utilisateur WHERE email = :email");
   $myConnection->bind(':email', $email, PDO::PARAM_STR);
   
   $user = $myConnection->single();
   
   if($myConnection->rowCount() > 0)
   {
       return $user;
   }
   else
   {
       return null;
   }
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


