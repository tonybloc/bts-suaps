<?php
/***
 * Controleur : Réservation
 */
require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER.DS .'model'. DS .'model.php');


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
    initSessionUsersCalendar();
    header("Location: /Projet_SUAPS/view/ViewBooking.php");
}else{
    header("Location: /Projet_SUAPS/view/ViewBooking.php");
}


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
            
            // Réservation (INSERT INTO) bdd
            reservation($userid, $place, $date, null);
            
            // Vérifi si c'est un weekend ou non
            if(jddayofweek($nbJourJulien) == 0 || jddayofweek($nbJourJulien) == 6)
            {
                supTicketWeekend($userid);
            }
            else{
                supTicketSemaine($userid);
            }
            // incrementation du nombre de parcours fait par l'utilisateur
            addNbParcours($userid);
    }
}

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

function actionAnnulationElse(){
    if(isset($_GET['place']) && isset($_GET['date']) && isset($_GET['userSelectedEmail']) &&
        !empty($_GET['place']) && !empty($_GET['date']) && !empty($_GET['userSelectedEmail'])){
            
            $place = htmlspecialchars($_GET['place']);
            $date = htmlspecialchars($_GET['date']);
            $userSelectedEmail = htmlspecialchars($_GET['userSelectedEmail']);
            
            $d = date_parse_from_format("Y-m-d", $date);
            
            $dateMonth = $d['month'];
            $dateYear = $d['year'];
            $dateDay = $d['day'];
            $nbJourJulien = cal_to_jd(CAL_GREGORIAN, $dateMonth, $dateDay, $dateYear);
            
            
            $user = getUser($userSelectedEmail);            
            annulerReservation($date, $user["ID_UTIL"], $place);
            supNbParcours($user["ID_UTIL"]);
            addAnnulation($user["ID_UTIL"]);
            
            // Réstitue un ticket weekend ou semaine en fonction du jour
            if(jddayofweek($nbJourJulien) == 0 || jddayofweek($nbJourJulien) == 6)
            {
                addTicketWeekend($user["ID_UTIL"], 1);
            }
            else{
                addTicketSemaine($user["ID_UTIL"], 1);
            }
    }
}

function actionInvitation(){
    
    if(isset($_GET['place']) && isset($_GET['date']) && isset($_GET['userid']) && isset($_GET['userinviteemail']) &&
        !empty($_GET['place']) && !empty($_GET['date']) && !empty($_GET['userid']) && !empty($_GET['userinviteemail']) ){
            
            echo "BOOOM !";
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
            
            reservation($userInvite['ID_UTIL'], $place, $date);
            
            // Supprime un ticket weekend ou semaine en fonction du jour
            if(jddayofweek($nbJourJulien) == 0 || jddayofweek($nbJourJulien) == 6)
            {
                supTicketWeekend($userid);
            }
            else{
                supTicketSemaine($userid);
            }

    }
}

?>
