
<?php

##### FICHIER DE ROUTE #####
/*
 * Role du fichier : 
 *  Charge le bon controleur
 *  ceci est un commentaire de test rémy
 */

require(__DIR__ . '/config.php');
require(ROOT_FOLDER.DS.'controler'.DS.'controler.php');
 

try
{
    if(isset($_GET['mode']))
    {
        // controler admin
        if($_GET['mode'] == 'admin')
        {
            
        }else
        {
            // controleur par défaut
            defaultMethode();
        }
    }
    else
    {
        // controleur par défaut
        defaultMethode();
    }
}
catch(Exception $e)
{
    echo "Erreur : " . $e->getMessage();
}

