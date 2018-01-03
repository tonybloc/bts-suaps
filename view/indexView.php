
<?php $title = "Golf Suaps"; ?>

<?php ob_start(); ?>

<?php require("header.php");?>
<section class="navigation">
	<?php require('navView.php');?>
</section>

<?php $content = ob_get_clean();?>
<?php require('template.php') ?>

