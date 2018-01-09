
<?php 
use model\Calendar;

$title = "Réservation";

require_once ('../config.php');
require_once (ROOT_FOLDER.DS.'model'.DS.'calendar.class.php');
require_once (ROOT_FOLDER.DS.'view'.DS.'header.php');
ob_start();

$calendar1 = new Calendar(14,date("m"),date("Y"));
?>

<h1 style="text-align:center">
	<?php echo $calendar1->getMonthToString($calendar1->getMonth())." ".$calendar1->getYear();?>
</h1>
	<?php
	   echo $calendar1->_generate();
    ?>


<?php $content = ob_get_clean(); require(ROOT_FOLDER.DS.'view'.DS.'template.php');?>

