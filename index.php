
<?php

##### FICHIER DE ROUTE #####
/*
 * Role du fichier : 
 *  Charge le bon controleur
 *  
 */
require_once('controler/controler.php');

if(isset($_GET['mode']))
{
    // controler admin
    if($_GET['mode'] == 'admin')
    {
        
    }else 
    {
        // controleur par défaut
        test();
    }
}
else
{
    // controleur par d�faut
    defaultMethode();
}
