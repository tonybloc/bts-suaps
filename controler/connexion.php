<?php 
require_once(__DIR__. '/../config.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'model.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'user.class.php');

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}
   
    
    // DECONNEXION DE L'UTILISATEUR
    if(isset($_GET['disc']) && $_GET['disc'] == 1)
    {
        // Détruit les varaibles de session
        session_unset();
        
        // Rediréction vers la page d'acceuil
        header('Location: /Projet_SUAPS/view/indexView.php');
    }
    
    
    
    // CONNEXION DE L'UTILISATEUR
    // Vérification des données saisies
    if(empty($_POST['email']) && empty($_POST['password']))
    {
        // Redirection vers la page de connexion
        header('Location: /Projet_SUAPS/view/connectUserView.php');
    }
    else 
    {
        // Affectation des données
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        
        // --- $password = password_hash($password, PASSWORD_DEFAULT);
        
        // Recherche dans la bdd si il existe un utilisateur (email)
        $user_array = getUser($email);
        
        // Si l'utilisateur existe dans la bdd
        if($user_array != null)
        {
            // Vérification du mot de passe
            if($user_array['PASSWORD_UTIL'] == $password)
            {
                // Utilisateur connecté : 
                $_SESSION['user'] = serialize(new User($user_array));
                
                // Message d'erreur à vide
                $_SESSION['message_connect_error'] = "";
                
                // Rediréction vers la page d'acceuil
                header('Location: /Projet_SUAPS/view/indexView.php');
            }
            else
            {
                // Mot de passe incorrecte
                $_SESSION['message_connect_error'] = "Identifiant ou mot de passe invalide";   
            }
        }
        else
        {
            // Identifiant incorrecte
            $_SESSION['message_connect_error'] = "Identifiant ou mot de passe invalide";
        }
        //R
        header('Location: /Projet_SUAPS/view/connectUserView.php');
    }
    
    
?>