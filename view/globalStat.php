<?php 
require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER.DS.'model'.DS.'user.class.php');
require_once(ROOT_FOLDER.DS.'model'.DS.'model.php');

$title="Statistique";

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}
?>

<?php 
ob_start();
require_once( ROOT_FOLDER.DS.'view'.DS.'header.php')

?>


<?php $content = ob_get_clean();?>
<?php require(ROOT_FOLDER.DS.'view'.DS.'template.php') ?>