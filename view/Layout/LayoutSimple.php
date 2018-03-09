<?php
require_once(__DIR__ .'/../../config.php');


if(!isset($_SESSION))
{
    session_start();
}
?>

<?php ob_start(); ?>

<div>
	<?= $content?>
</div>

<?php $mainContent = ob_get_clean();?>

<?php require(ROOT_FOLDER.DS.'view'.DS.'template.php') ?>