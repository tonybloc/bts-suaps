
<?php

##### FICHIER DE ROUTE #####
/*
 * Role du fichier : 
 *  Charge le bon controleur
 *  ceci est un commentaire de test rémy
 */
require_once('./config.php');
require_once(ROOT_FOLDER . DS. 'controler/controler.php');


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

