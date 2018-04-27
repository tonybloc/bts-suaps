<?php
/*
 * Réservation, Invitation, Annulation de parcours de golf
 */
require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER.DS .'model'. DS .'model.php');

if(!isset($_SESSION))
{
    session_start();
} 

// Suivan l'action
if(isset($_GET['action'])){    
    $mode = htmlspecialchars($_GET['action']);
    
    switch ($mode){
        case "reservation":
            actionReservation();
            break;
        case "annulation_self":
            actionAnnulationSelf();
            break;
        case "annulation_else":
            actionAnnulationElse();
            break;
        case "invitation":
            actionInvitation();
            break;
        default:
            break;        
    }
    header("Location: /Projet_SUAPS/view/ViewBooking.php");
}else{
    header("Location: /Projet_SUAPS/view/ViewBooking.php");
}

/**
 * Réservation
 */
function actionReservation(){
    if(isset($_GET['place']) && isset($_GET['date']) && isset($_GET['userid']) &&
        !empty($_GET['place']) && !empty($_GET['date']) && !empty($_GET['userid'])){
            
            $place = htmlspecialchars($_GET['place']);
            $date = htmlspecialchars($_GET['date']);
            $userid = htmlspecialchars($_GET['userid']);
            
            $d = date_parse_from_format("Y-m-d", $date);
            
            $dateMonth = $d['month'];
            $dateYear = $d['year'];
            $dateDay = $d['day'];
            $nbJourJulien = cal_to_jd(CAL_GREGORIAN, $dateMonth, $dateDay, $dateYear);
            
            if(getNumberOfBooking($userid) < 2){
                $_SESSION['ERREUR_TROP_DE_RESERVATION'] = "";
                // Vérifi si c'est un weekend ou non
                if(jddayofweek($nbJourJulien) == 0 || jddayofweek($nbJourJulien) == 6)
                {
                    if(getNbTicketWeekend($userid) <= 0){
                        $_SESSION['ERREUR_TICKETS_MANQUANTS'] = "Votre nombre de tickets 'weekend' est insuffisant (Veuillez contacter un administrateur pour créditer votre compte)";
                    }else{
                        $_SESSION['ERREUR_TICKETS_MANQUANTS']="";
                        reservation($userid, $place, $date, null);
                        supTicketWeekend($userid);
                        addNbParcours($userid);
                    }
                }
                else{
                    if(getNbTicketSemaine($userid) <= 0){
                        $_SESSION['ERREUR_TICKETS_MANQUANTS'] = "Votre nombre de tickets 'semaine' est insuffisant (Veuillez contacter un administrateur pour créditer votre compte)";
                    }else{
                        $_SESSION['ERREUR_TICKETS_MANQUANTS']="";
                        reservation($userid, $place, $date, null);
                        supTicketSemaine($userid);
                        addNbParcours($userid);
                    }
                }
            }else{
                $_SESSION['ERREUR_TROP_DE_RESERVATION'] = "Reservation imposible : maximum 2 réservation en avance";
            }
            
            
    }
}

/**
 * Annulation de sa propore réservation
 */
function actionAnnulationSelf(){
    if(isset($_GET['place']) &&  isset($_GET['date']) && isset($_GET['userid']) &&
        !empty($_GET['place']) && !empty($_GET['date']) && !empty($_GET['userid'])){
            
            $place = htmlspecialchars($_GET['place']);
            $date = htmlspecialchars($_GET['date']);
            $userid = htmlspecialchars($_GET['userid']);
            
            $d = date_parse_from_format("Y-m-d", $date);
            
            $dateMonth = $d['month'];
            $dateYear = $d['year'];
            $dateDay = $d['day'];
            $nbJourJulien = cal_to_jd(CAL_GREGORIAN, $dateMonth, $dateDay, $dateYear);
            
            annulerReservation($date, $userid, $place);
            supNbParcours($userid);
            addAnnulation($userid);
            
            // Réstitue un ticket weekend ou semaine en fonction du jour
            if(jddayofweek($nbJourJulien) == 0 || jddayofweek($nbJourJulien) == 6)
            {
                addTicketWeekend($userid, 1);
            }
            else{
                addTicketSemaine($userid, 1);
            }
    }
}

/**
 * Annulation d'une réservation d'un autre utilisateur (fonction utlisé pour les "admin")
 */
function actionAnnulationElse(){
    if(isset($_GET['place']) && isset($_GET['date']) && isset($_GET['userSelectedEmail']) && isset($_GET['userid']) &&
        !empty($_GET['place']) && !empty($_GET['date']) && !empty($_GET['userSelectedEmail']) && !empty($_GET['userid'])){
            
            $place = htmlspecialchars($_GET['place']);
            $date = htmlspecialchars($_GET['date']);
            $userSelectedEmail = htmlspecialchars($_GET['userSelectedEmail']);
            $userid = htmlspecialchars($_GET['userid']);
            
            $d = date_parse_from_format("Y-m-d", $date);
            $dateMonth = $d['month'];
            $dateYear = $d['year'];
            $dateDay = $d['day'];
            $nbJourJulien = cal_to_jd(CAL_GREGORIAN, $dateMonth, $dateDay, $dateYear);
            
            $user = getUser($userSelectedEmail);            
            $idUserInvite = getIdInviteOfReservation($date, $user["ID_UTIL"], $place);
            
            // Réstitue un ticket weekend ou semaine en fonction du jour
            if(jddayofweek($nbJourJulien) == 0 || jddayofweek($nbJourJulien) == 6)
            {
                if($idUserInvite != NULL){
                    annulerReservation($date, $user["ID_UTIL"], $place);
                    supNbParcours($user["ID_UTIL"]);
                    addAnnulation($idUserInvite);
                    addTicketWeekend($idUserInvite, 1);
                }
                else{
                    annulerReservation($date, $user["ID_UTIL"], $place);
                    supNbParcours($user["ID_UTIL"]);
                    addAnnulation($user["ID_UTIL"]);
                    addTicketWeekend($idUserInvite, 1);
                }
            }
            else{
                if($idUserInvite != NULL){
                    annulerReservation($date, $user["ID_UTIL"], $place);
                    supNbParcours($user["ID_UTIL"]);
                    addAnnulation($idUserInvite);
                    addTicketSemaine($idUserInvite, 1);
                }
                else{
                    annulerReservation($date, $user["ID_UTIL"], $place);
                    supNbParcours($user["ID_UTIL"]);
                    addAnnulation($user["ID_UTIL"]); 
                    addTicketSemaine($idUserInvite, 1);
                }
            }
    }
}

/**
 * Invitation d'une autre personne
 */
function actionInvitation(){
    
    if(isset($_GET['place']) && isset($_GET['date']) && isset($_GET['userid']) && isset($_GET['userinviteemail']) &&
        !empty($_GET['place']) && !empty($_GET['date']) && !empty($_GET['userid']) && !empty($_GET['userinviteemail']) ){
            
            $place = htmlspecialchars($_GET['place']);
            $date = htmlspecialchars($_GET['date']);
            $userid = htmlspecialchars($_GET['userid']);
            
            $d = date_parse_from_format("Y-m-d", $date);
            
            $dateMonth = $d['month'];
            $dateYear = $d['year'];
            $dateDay = $d['day'];
            $nbJourJulien = cal_to_jd(CAL_GREGORIAN, $dateMonth, $dateDay, $dateYear);
            
            $userInviteEmail = htmlspecialchars($_GET['userinviteemail']);
            $userInvite = getUser($userInviteEmail);
            
                        
            // Supprime un ticket weekend ou semaine en fonction du jour
            if(jddayofweek($nbJourJulien) == 0 || jddayofweek($nbJourJulien) == 6)
            {                
                if(getNbTicketWeekend($userid) <= 0){
                    $_SESSION['ERREUR_TICKETS_MANQUANTS'] = "Votre nombre de tickets 'semaine' est insuffisant (Veuillez contacter un administrateur pour créditer votre compte)";
                }else{
                    $_SESSION['ERREUR_TICKETS_MANQUANTS']="";
                    reservation($userInvite['ID_UTIL'], $place, $date, $userid);
                    supTicketWeekend($userid);
                }
            }
            else{
                if(getNbTicketSemaine($userid) <= 0){
                    $_SESSION['ERREUR_TICKETS_MANQUANTS'] = "Votre nombre de tickets 'semaine' est insuffisant (Veuillez contacter un administrateur pour créditer votre compte)";
                }else{
                    $_SESSION['ERREUR_TICKETS_MANQUANTS']="";
                    reservation($userInvite['ID_UTIL'], $place, $date, $userid);
                    supTicketSemaine($userid);
                }                
            }
            addNbParcours($userInvite['ID_UTIL']);

    }
}

?>
