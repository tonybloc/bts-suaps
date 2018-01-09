<?php 

session_start();

require_once(__DIR__ .'/../config.php');
$title = "Golf Suaps"; 


?>

<?php ob_start(); ?>

<?php require(ROOT_FOLDER.DS.'view'.DS.'header.php');?>

<?php $content = ob_get_clean();?>
<?php require(ROOT_FOLDER.DS.'view'.DS.'template.php') ?>
