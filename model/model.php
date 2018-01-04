
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
            DB_MOTEUR.':host='.DB_HOST_NAME.';dbname='.DB_DATABASE_NAME.';charset=utf8', DB_USER_NAME, DB_PASSWORD);
    }
    catch(Exception $e){
        die("Erreur : " . $e->getMessage());
    }
    return $bdd;
}

/**
 * Vérifie si un utilisateur existe dans la base de donnée
 * @param string : $email, email de l'utilisateur
 */
function userExist($email)
{
    $bdd = dbConnect();
    
    $user = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $user->execute(array($email));
    $data = $user->fetch();
    
    return (!empty($data)) ? true : false;
}


