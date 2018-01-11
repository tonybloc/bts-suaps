
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
 * Recupère les informations d'un utilisateur dans la bdd 
 * @param string $email
 * @return array|NULL
 * retourne, si un utilisateur existe dans le bdd, la liste des information du l'utilisateur
 * sinon retourne null
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
function updateUser($user)
{
    global $myConnection;
    // Si $user est bien un utilisateur alors
    if($user instanceof User)
    {
        
    }
}

function generateStatistic($user)
{
    if($user instanceof User)
    {
        "<div></div>";
    }
}

function getUsersToInvite()
{
    global $myConnection;
    $myConnection->query("SELECT LASTNAME_UTIL,FIRSTNAME_UTIL,EMAIL,ID_ROLE FROM Utilisateur");
    return $myConnection->resultset();
}
    
    

function initSessionUsers(){
    global $myConnection;
    
    $bufferTabUsers = getUsersToInvite();
    $bufferusers = 0;
    $_SESSION['Users'] = [];
    foreach($bufferTabUsers as $row => $link)
    {
        $bufferusers++;
        $_SESSION['Users'][$bufferusers]=$link['LASTNAME_UTIL'].'..'.$link['FIRSTNAME_UTIL'].'..'.$link['EMAIL'].'..'.$link['ID_ROLE'];
        
    }
}




