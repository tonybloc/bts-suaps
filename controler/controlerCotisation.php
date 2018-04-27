<?php 
/*
 * Inscription des utilisateur 
 */
require_once(__DIR__. '/../config.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'model.php');

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_POST['mode']) && !empty($_POST['mode'])){
    $mode = $_POST['mode'];
    
    if($mode == "admin"){
        cotisationAdmin();
    }
    // mode = user
    else{
        cotisationUtilisateurs();
    }
}


/**
 * Cotisation Administrateur (Gestion des ticket + role des utlisateur : membre, adhérant, invité, admin)
 */
function cotisationAdmin(){
    
    if( isset($_POST['validation_achat'])) {
        
        if( isset($_POST['choix_utilisateur']) && empty($_POST['choix_utilisateur'])
            && isset($_POST['nombre_ticket']) && empty($_POST['nombre_ticket'])
            && isset($_POST['validation_achat']) && empty($_POST['validation_achat'])
            && isset($_POST['type_ticket']) && empty($_POST['type_ticket']))
        {
            $_SESSION['message_achat_non_valider'] = "Champs invalide";
            header("location: /Projet_SUAPS/view/ViewCotisationAdmin.php?validation=wrong");
        }
        else{
            $userId = htmlspecialchars($_POST['choix_utilisateur']);
            $nombreTicket = htmlspecialchars($_POST['nombre_ticket']);
            $typeTicket = htmlspecialchars($_POST['type_ticket']);
            $validation = htmlspecialchars($_POST['validation_achat']);
            
            
            if($validation == 1){                
                // Ticket weekend
                if($typeTicket == "ticket_weekend"){
                    addTicketWeekend($userId,$nombreTicket);
                }
                // Ticket semaine
                else{
                    addTicketSemaine($userId,$nombreTicket);
                }
                $_SESSION['message_achat_valider'] = "Achat validé ! ".$nombreTicket." tickets seront ajouté au compte de l'utilisateur" ;
                header("location: /Projet_SUAPS/view/ViewCotisation.php?validation=success");
            }
            else{
                $_SESSION['message_achat_non_valider'] = "Veuillez valider l'achat";
                header("location: /Projet_SUAPS/view/ViewCotisationAdmin.php?validation=wrong");
            }
        }
    }else{
        $_SESSION['message_achat_non_valider'] = "Veuillez valider l'achat";
        header("location: /Projet_SUAPS/view/ViewCotisationAdmin.php?validation=wrong");
    }
    
}

/**
 * Cotisation Utilisateurs (Achat de ticket)
 */
function cotisationUtilisateurs(){
    
    if( isset($_POST['validation_achat'])) {
        if( isset($_POST['choix_utilisateur']) && empty($_POST['choix_utilisateur'])
            && isset($_POST['nombre_ticket']) && empty($_POST['nombre_ticket'])
            && isset($_POST['validation_achat']) && empty($_POST['validation_achat'])
            && isset($_POST['type_ticket']) && empty($_POST['type_ticket']))
        {
            $_SESSION['message_achat_non_valider'] = "Champs invalide";
            header("location: /Projet_SUAPS/view/ViewCotisation.php?validation=wrong");
        }
        else{
            $userId = htmlspecialchars($_POST['choix_utilisateur']);
            $nombreTicket = htmlspecialchars($_POST['nombre_ticket']);
            $typeTicket = htmlspecialchars($_POST['type_ticket']);
            $validation = htmlspecialchars($_POST['validation_achat']);
            
            
            if($validation == 1){
                
                // Ticket weekend
                if($typeTicket == "ticket_weekend"){
                    addTicketWeekend($userId,$nombreTicket);
                }
                // Ticket semaine
                else{
                    addTicketSemaine($userId,$nombreTicket);
                }
                $_SESSION['message_achat_valider'] = "Achat validé ! ".$nombreTicket." tickets seront ajouté à votre compte";
                header("location: /Projet_SUAPS/view/ViewCotisation.php?validation=success");
            }
            else{
                $_SESSION['message_achat_non_valider'] = "Veuillez valider votre achat";
                header("location: /Projet_SUAPS/view/ViewCotisation.php?validation=wrong");
            }
        }
    }else{
        $_SESSION['message_achat_non_valider'] = "Veuillez valider votre achat";
        header("location: /Projet_SUAPS/view/ViewCotisation.php?validation=wrong");
    }
}

?>