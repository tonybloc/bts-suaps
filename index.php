<?php

/**
 * Fichier de root
 */

require(__DIR__ . '/config.php');
require(ROOT_FOLDER.DS.'controler'.DS.'controler.php');
require(ROOT_FOLDER.DS.'controler'.DS.'controlerAdmin.php');
require(ROOT_FOLDER.DS.'controler'.DS.'controlerBooking.php');
require(ROOT_FOLDER.DS.'controler'.DS.'controlerLogin.php');
require(ROOT_FOLDER.DS.'controler'.DS.'controlerStatistic.php');

 

try
{
    if(isset($_GET['mode']))
    {
        if($_GET['mode'] == "booking")
        {
            bookingMode();
        }else if($_GET['mode'] == "login")
        {
            loginMode();
        }else if($_GET['mode'] == "statistic")
        {
            statisticMode();
        }else if($_GET['mode'] == "home"){
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

