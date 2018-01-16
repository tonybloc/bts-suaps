
<?php
##### FICHIER DE MODELE #####
/*
 * Rôle du fichier :
 *  Cherche/Modifie/Insert des données dans la bdd
 *  Définit les actions à faire ...
 */
require_once(__DIR__ .'/../config.php');
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


function inscritNewUser($email, $nom, $prenom, $password)
{
    global $myConnection;
    
    $myConnection->query("INSERT INTO utilisateur(`ID_ROLE`, `LASTNAME_UTIL`, `FIRSTNAME_UTIL`, `PASSWORD_UTIL`, `EMAIL`, `NB_TICKETS_SEMAINE`, `NB_TICKETS_WEEKEND`, `NB_TICKETS_TOTAL_UTIL`, `NB_ANNULATION_TOTAL`) 
                          VALUES (2,:lastName,:firstName,:password,:email,0,0,0,0)");
    $myConnection->bind(":lastName",$prenom, PDO::PARAM_STR);
    $myConnection->bind(":firstName",$nom, PDO::PARAM_STR);
    $myConnection->bind(":password",$password, PDO::PARAM_STR);
    $myConnection->bind("::email",$email, PDO::PARAM_STR);
    
    $myConnection->execute();
}
/**
 * 
 * @param unknown $user
 * @return string
 */
function convertUserToStringJS($user)
{
    $str = "'id': ". $user->getId() .", 'email': '". $user->getEmail() ."', 'lastName': '".$user->getLastName()."', 'name': '".$user->getFirstName()."', 'role': ".$user->getRole();
    return $str;
}
/**
 * Transforme un tableau (utilisateur) en chaine
 * @param unknown $array
 * @return string
 */
function convertOneArrayUserToStringJS($array)
{
    $str = "'id' : ". $array['ID_UTIL'] .", 'email' : '". $array['EMAIL'] ."', 'lastName' : '".$array['LASTNAME_UTIL']."', 'name' : '".$array['FIRSTNAME_UTIL']."', 'role' : ".$array['ID_ROLE'];
    return $str;
}
/**
 * Transforme le tableau des utilisateurs dans la bdd en chaine
 * @return string
 */
function convertAllUserToStringJS()
{
    $allUsersString = "{";
    $allUsers = getUsersToInvite();
    var_dump($allUsers);
    foreach($allUsers as $array){
        $allUsersString .= convertOneArrayUserToStringJS($array).",";
    }
        
    return substr($allUsersString, 0, -1) . "}";
}
function initScriptJS()
{
    echo '<script>';
    echo 'var arrayUser = new Array();';
    
    $allUsers = getUsersToInvite();
    foreach ($allUsers as $array)
    {
        echo "userArray.push(". convertOneArrayUserToStringJS($array). ")";
    }
    echo "console.log(arrayUser);";
    echo '</script>';
}


/**
 * reservation d'une place 
 * @param unknown $userId
 * @param unknown $place
 * @param unknown $date (format : YYYY-MM-dd)
 * @param unknown $etat (0: vide,  1: reserver, 2:inviter, 3:annuler) 
 */
function reservation($userId, $idPlace, $date, $etat)
{
    global $myConnection;
    
    $myConnection->query('INSERT INTO reserver(ID_UTIL, ID_PLACE, DATE_RESERVATION, ETAT) VALUES (:idUser, :idPlace, :dateReserv, :etat)');
    $myConnection->bind(':idUser', $userId, PDO::PARAM_INT);
    $myConnection->bind(':idPlace', $idPlace, PDO::PARAM_INT);
    $myConnection->bind(':dateReserv', $date, PDO::PARAM_STR);
    $myConnection->bind(':etat', $etat, PDO::PARAM_INT);
    
    $myConnection->execute(); 
}
function annulerReservation()
{
    global $myConnection;
    
}
/**
 * Décompte les ticket pour un utilisateur
 * @param unknown $dateCourrante
 * @param unknown $dateResrvation
 * @param unknown $listePersonne
 */
function decomptePlace($email)
{
    $user = getUser($email);
    var_dump($user);
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
    $myConnection->query("SELECT ID_UTIL,LASTNAME_UTIL,FIRSTNAME_UTIL,EMAIL,ID_ROLE FROM Utilisateur");
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
    $_SESSION['Users']= "";
    foreach($bufferTabUsers as $row => $link)
    {
        $bufferusers++;
        $_SESSION['Users'].="{'id':".$link['ID_UTIL'].",'name':'".$link['FIRSTNAME_UTIL']."','lastname':'".$link['LASTNAME_UTIL']."','email':'".$link['EMAIL']."','id_role':".$link['ID_ROLE']."},";
    }
    $_SESSION['Users'] = substr($_SESSION['Users'],0,strlen($_SESSION['Users'])-1);   
}

function getDatasToFillCalendar()
{
    global $myConnection;
    $myConnection->query(
        "SELECT LASTNAME_UTIL,
        FIRSTNAME_UTIL,
        ID_PLACE,
        DATE_RESERVATION AS DATE_RESERV,
        EMAIL 
        FROM utilisateur u 
        INNER JOIN reserver r 
        ON r.ID_UTIL = u.ID_UTIL 
        WHERE DATE_RESERVATION >= CURDATE() 
        AND DATE_RESERVATION <= DATE_ADD(DATE_RESERVATION, INTERVAL 15 DAY)");
    if ($myConnection!=null)
        return $myConnection->resultset();
}
function initSessionUsersCalendar()
{
    $bufferUsersToFill = getDatasToFillCalendar();
    if  ($bufferUsersToFill != "];")
    {
        $bufferUsersTab = 0;
        $_SESSION['UsersCalendar']= "[";
        foreach($bufferUsersToFill as $row => $link)
        {
            $bufferUsersTab++;
            $_SESSION['UsersCalendar'].="{'Lastname':'".$link['LASTNAME_UTIL']."','name':'".$link['FIRSTNAME_UTIL']."','place':'".$link['ID_PLACE']."','date':'".$link['DATE_RESERV']."','email':'".$link['EMAIL']."'},";
        }
        $_SESSION['UsersCalendar'] = substr($_SESSION['UsersCalendar'],0,strlen($_SESSION['UsersCalendar'])-1);
        $_SESSION['UsersCalendar'].= "]";
    }
}
