
<?php 
use model\Calendar;

$title = "Réservation";

require_once (__DIR__.'/../config.php');
require_once (ROOT_FOLDER.DS.'model'.DS.'calendar.class.php');
require_once (ROOT_FOLDER.DS.'view'.DS.'header.php');
ob_start();
$calendar1 = new Calendar(date("m"),date("Y"));
?>

<h1 style="text-align:center">
	<?php echo $calendar1->getMonthToString($calendar1->getMonth())." ".$calendar1->getYear(),
	$calendar1->_generate();
    ?>
</h1>

<?php $content = ob_get_clean(); require(ROOT_FOLDER.DS.'view'.DS.'template.php');?>
