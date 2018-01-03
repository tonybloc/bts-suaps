
<?php 
// Ce fichier joue le rôle de Routeur entre les différents contrôleurs
require('controler/controler.php');

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
    // controleur par défaut
    test();
}
