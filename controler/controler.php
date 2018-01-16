
<?php
##### FICHIER DE CONTROLE #####
/*
 * Role du fichier : 
 *  Demande aux differents modèles des données, puis il les distribuent
 *  dans les fichier de vue adéquate. 
 */

require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER.DS .'model'. DS .'model.php');

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}


// Reservation et Annulation d'un participant
if(isset($_GET['place']) && isset($_GET['date']) && isset($_GET['userid']) && isset($_GET['mode']))
{
    if(!empty($_GET['place']) && !empty($_GET['date']) && !empty($_GET['userid']) && !empty($_GET['mode']))
    {
        $mode = htmlspecialchars($_GET['mode']);
        $place = htmlspecialchars($_GET['place']);
        $date = htmlspecialchars($_GET['date']);
        $userid = htmlspecialchars($_GET['userid']);
       
        $d = date_parse_from_format("Y-m-d", $date);
        
        $dateMonth = $d['month'];
        $dateYear = $d['year'];
        $dateDay = $d['day'];
        $nbJourJulien = cal_to_jd(CAL_GREGORIAN, $dateMonth, $dateDay, $dateYear);
        
        //echo $dateYear . " - " . $dateMonth . " - " . $dateDay;
        
        // Réservation d'une place
        if ($mode == "reservation" )
        {
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
        else if ($mode == "annulation")
        {
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
        
        // J'ai la flème de réfléchir il est 23H
        else if ($mode == "invitation" && isset($_GET['userinviteemail']) && !empty($_GET['userinviteemail']) )
        {
            
            $userInviteEmail = htmlspecialchars($_GET['userinviteemail']);
            $userInvite = getUser($userInviteEmail);
            
            reservation($userInvite['ID_UTIL'], $place, $date);
            
            //echo jddayofweek($nbJourJulien);
            
            // Supprime un ticket weekend ou semaine en fonction du jour
            if(jddayofweek($nbJourJulien) == 0 || jddayofweek($nbJourJulien) == 6)
            {
                supTicketWeekend($userid);
            }
            else{
                supTicketSemaine($userid);
            }
            
        }
        
        initSessionUsersCalendar();
        header("location: /Projet_SUAPS/view/reservView.php");
    }
}






/**
 * Methode de test (pour l'instant)
 */
function defaultMethode()
{
    require(ROOT_FOLDER.DS.'view'.DS.'indexView.php');
    
}

/**
 * Controleur pour les statistique de l'utilisateur
 */
function statisticUser()
{
    
}

/**
 * Controleur pour la réservation d'un utilisateur
 */
function booking()
{
    
}

/**
 * Autre Controleur .....
 */
function autre()
{
    
}