
<?php
##### FICHIER DE MODELE #####
/*
 * Rôle du fichier :
 *  Cherche/Modifie/Insert des données dans la bdd
 *  ...
 */
require_once('config.php');

/**
 * Connexion à une base de donnée
 * @return PDO
 */
function dbConnect()
{
    try{
        $bdd = new PDO(
            BD_MOTEUR.':host='.DB_HOST_NAME.';dbname='.DB_DATABASE_NAME.';charset=utf8', DB_USER_NAME, DB_PASSWORD);
    }
    catch(Exception $e){
        die("Erreur : " . $e->getMessage());
    }
    return $bdd;
}

function verifUserConnection($email)
{
    $bdd = dbConnect();
    
    $user = $bdd->prepare("SELECT email, passsword_util FROM utilisateur WHERE email=:email");
    $user->execute(array(':email'=> $email));
    var_dump($user);
    $data = $user->fetch();
    var_dump($data);
    
}
