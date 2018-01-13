<?php 
require_once(__DIR__ .'/../config.php');

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}
?>

<?php
$title = "Golf Suaps"; 


?>

<?php ob_start(); ?>

<?php 

require(ROOT_FOLDER.DS.'view'.DS.'header.php');
require(ROOT_FOLDER.DS.'view'.DS.'statView.php');

?>

<?php $content = ob_get_clean();?>
<?php require(ROOT_FOLDER.DS.'view'.DS.'template.php') ?>
