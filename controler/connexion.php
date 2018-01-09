<?php 
    session_start();
    require_once(__DIR__. '/../config.php');
    require_once(ROOT_FOLDER . DS .'model'. DS .'model.php');
    require_once(ROOT_FOLDER . DS .'model'. DS .'user.class.php');
    
    
    // DECONNEXION DE L'UTILISATEUR
    if(isset($_GET['disc']) && $_GET['disc'] == 1){
        // On supprimer la variable user
        session_unset();
        echo $_POST;
        //header('Location: /Projet_SUAPS/view/indexView.php');
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
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        
        //$password = password_hash($password, PASSWORD_DEFAULT);
        //echo $password;
        $current_user = getUser($email);
        
        var_dump($current_user);
        
        // Si l'identifiant existe dans la bdd, alors
        if($current_user != null)
        {
            // On vérifie que le password correspond
            if($current_user['PASSWORD_UTIL'] == $password)
            {
               // $_SESSION['user_test'] = new User($email);
                
                
                // Connexion de l'utilisateur
                $_SESSION['user'] = array(
                    'email' => $current_user['EMAIL'],
                    'nom' => $current_user['LASTNAME_UTIL'],
                    'prenom' => $current_user['FIRSTNAME_UTIL'],
                    'id'=> $current_user['ID_UTIL']
                );
                
                $_SESSION['message_connect_error'] = "";
                // Redirection vers la page d'acceuil
                //header('Location: /Projet_SUAPS/view/indexView.php');
            }
            else
            {
                $_SESSION['message_connect_error'] = "Identifiant ou mot de passe invalide";   
            }
        }
        else
        {
            $_SESSION['message_connect_error'] = "Identifiant ou mot de passe invalide";
        }
        //header('Location: /Projet_SUAPS/view/connectUserView.php');
    }
    
    
?>