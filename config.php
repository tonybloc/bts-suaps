<?php 

############ FICHIER DE CONFIGURATION ############

/* Variables de connexion */
define ('DB_MOTEUR','mysql');				// type de la base
define ('DB_HOST_NAME','localhost');		// adresse du serveur
define ('DB_DATABASE_NAME','suaps');		// nom de la base de donnée
define ('DB_USER_NAME','root');				// identifiant de connexion
define ('DB_PASSWORD','');					// mots de passe de connexion

/* Gestion des liens dans le projet*/
define ('ROOT_FOLDER', __DIR__);           // Chemin du dossier courrant
define ('DS',DIRECTORY_SEPARATOR);         // Separation utiliser (linux /, windows \)

/* Autres Constantes */
define('INVITE',4);
define('ADHERANT',3);
define('MEMBRE',2);
define('ADMIN',1);
?>
