<?php
require_once(__DIR__. '/../config.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'model.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'user.class.php');

if(!isset($_SESSION))
{
    session_start();
}


/*
 * DECONNEXION DE L'UTILISATEUR
 */
if(isset($_GET['disc']) && !empty($_GET['disc']) && intval($_GET['disc'],0) === 1)
{
    session_unset();  // supprime la session
    header('Location: /Projet_SUAPS/index.php');
}else{
    /*
     * CONNEXION DE L'UTILISATEUR
     */
    if(isset($_POST['email']) && isset($_POST['password']) &&
        !empty($_POST['email']) && !empty($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        // --- $password = password_hash($password, PASSWORD_DEFAULT);
        
        // Recherche dans la bdd si il existe un utilisateur (email)
        $user_array = getUser($email);
        
        if($user_array != null)
        {
            // Vérification du mot de passe
            if($user_array['PASSWORD_UTIL'] == $password)
            {
                // Utilisateur connecté :
                $_SESSION['user'] = serialize(new User($user_array));
                
                // Message d'erreur à vide
                $_SESSION['message_connect_error'] = "";
                $_SESSION['message_connect_success'] = "Vous êtes connecté";
                
                header('Location: /Projet_SUAPS/view/indexView.php');
            }
            // Mot de passe incorrecte
            else
            {
                $_SESSION['message_connect_error'] = "Identifiant ou mot de passe invalide";
                $_SESSION['message_connect_success']= "";
            }
        }
        else
        {
            $_SESSION['message_connect_error'] = "Identifiant ou mot de passe invalide";
            $_SESSION['message_connect_success']="";
        }
        header('Location: /Projet_SUAPS/view/ViewUserConnection.php');
    }
    else
    {
        header('Location: /Projet_SUAPS/view/ViewUserConnection.php');
    }
}






?>