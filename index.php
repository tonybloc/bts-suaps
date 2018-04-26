<?php

/**
 * Fichier de root
 */

require_once(__DIR__ .'/config.php');
require_once(ROOT_FOLDER.DS.'controler'.DS.'controler.php');

try
{
    if(isset($_GET['mode']))
    {
        if($_GET['mode'] == "booking")
        {
            bookingMode();
        }
        else if($_GET['mode'] == "login")
        {
            loginMode();
        }
        else if($_GET['mode'] == "statistic")
        {
            statisticMode();
        }
        else if($_GET['mode'] == "home")
        {
            homepageMode();
        }
    }
    else
    {
        homepageMode();
    }
}
catch(Exception $e)
{
    echo "Erreur : " . $e->getMessage();
}

