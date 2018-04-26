<?php 
require_once(__DIR__ .'/../config.php');

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}

// Titre de la page
$title = "Golf Suaps"; 
// Débute la temporisation de sortie
ob_start();
?>

<div class="container">
	<div class="jumbotron color-green box-register">
		<div class="container">
			<h2>Bienvenue sur le site de réservation de golf de la plateforme suaps.</h2>
		</div>
	</div>
</div>

<?php 
// Récupère proprement le contenu du tempon
$content = ob_get_clean();
require(ROOT_FOLDER.DS.'view'.DS.'Layout'.DS.'LayoutSimple.php') ?>
