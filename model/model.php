
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

/**
 * reserve à une place et à une date donnée un utilisateur
 * @param unknown $userEmail
 * @param unknown $place
 * @param unknown $date (format : YYYY-MM-dd)
 * @param unknown $etat (0: vide,  1: reserver, 2:inviter, 3:annuler) 
 */
function reservation($userEmail, $idPlace, $date, $etat)
{
    global $myConnection;
    $myUser = getUser($userEmail);
    
    $userId = $myUser['ID_UTIL'];
        
    $myConnection->query('INSERT INTO reserver(ID_UTIL, ID_PLACE, DATE_RESERVATION, ETAT) VALUES (:idUser, :idPlace, :dateReserv, :etat)');
    $myConnection->bind(':idUser', $userId, PDO::PARAM_INT);
    $myConnection->bind(':idPlace', $idPlace, PDO::PARAM_INT);
    $myConnection->bind(':dateReserv', $date, PDO::PARAM_STR);
    $myConnection->bind(':etat', $etat, PDO::PARAM_INT);
    
    $myConnection->execute(); 
}


/**
 * Remplie le calendrier avec les données contenu dans la bdd;
 */
function completeCalendar()
{
    
}
/**
 * 
 * @return unknown
 */
function getUsersToInvite()
{
    global $myConnection;
    $myConnection->query("SELECT LASTNAME_UTIL,FIRSTNAME_UTIL,EMAIL,ID_ROLE FROM Utilisateur");
    return $myConnection->resultset();
}
/**
 * cr�e une variable de session user qui contient uen chaine de characht�re
 * contenant les noms, prenoms, et mail de chaque user pr�sente dans la BDD
 */
function initSessionUsers()
{
    global $myConnection;
    
    $bufferTabUsers = getUsersToInvite();
    $bufferusers = 0;
    $_SESSION['Users']= "[";
    foreach($bufferTabUsers as $row => $link)
    {
        $bufferusers++;
        $_SESSION['Users'].="{'name':'".$link['FIRSTNAME_UTIL']."','lastname':'".$link['LASTNAME_UTIL']."','email':'".$link['EMAIL']."'},";
    }
    $_SESSION['Users'] = substr($_SESSION['Users'],0,strlen($_SESSION['Users'])-1);
    $_SESSION['Users'].= "]";
}

function fillcalendar()
{
    global $myConnection;
    $myConnection->query(
        "SELECT LASTNAME_UTIL,
        FIRSTNAME_UTIL,
        ID_PLACE,
        DATE_FORMAT(DATE_RESERVATION, '%Y-%M-%D'),
        EMAIL 
        FROM utilisateur u 
        INNER JOIN reserver r 
        ON r.ID_UTIL = u.ID_UTIL 
        WHERE DATE_RESERVATION >= CURDATE() 
        AND DATE_RESERVATION <= DATE_ADD(DATE_RESERVATION, INTERVAL 15 DAY)");
    return $myConnection->resultset();
}


