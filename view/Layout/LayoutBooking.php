<?php 
require_once(__DIR__ .'/../../config.php');
require_once (ROOT_FOLDER.DS.'model'.DS.'model.php');
require_once (ROOT_FOLDER.DS.'model'.DS.'calendar.class.php');


if(!isset($_SESSION))
{
    session_start();
}
?>

<?php $title = "Réservation"; ?>

<?php require_once (ROOT_FOLDER.DS.'view'.DS.'ViewUserStatistique.php');?>
<?php require_once (ROOT_FOLDER.DS.'view'.DS.'menuAdmin.php');?>		

<?php ob_start(); ?>

<section>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 panel-left">
			<?=$userStatistique?>
			<?=$menuAdminContent?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 panel-right">
			<?= $bookingContent ?>
        </div>
	</div>	
</section>

<?php $mainContent = ob_get_clean();?>

<?php require(ROOT_FOLDER.DS.'view'.DS.'template.php') ?>