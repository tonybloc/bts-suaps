
<?php 

$title = "Réservation";

require_once (__DIR__.'/../config.php');
require_once (ROOT_FOLDER.DS.'model'.DS.'model.php');
require_once (ROOT_FOLDER.DS.'model'.DS.'calendar.class.php');


if(!isset($_SESSION))
{
    session_start();    
}

initSessionUsers();
$calendar1 = new Calendar(date("d"),date("m"),date("Y"));


if(!isset($_GET['next']))
{
    $i = 0;
}
else{
    if($_GET["date"] == "sui"){
        $i = $_GET['next'];
        
        $calendar1->addDay(14*$i);
       
        
        echo "index i : ".$i . " - GET : " . $_GET['next'];
    }
    else if($_GET["date"] == "pre"){
        $i = $_GET['next'];
        
        $calendar1->addDay(14*$i);        
        
        echo "index i : ".$i . " - GET : " . $_GET['next'];
    }
    
}
?>
<?php ob_start(); ?>


<div class="panel_reservation">
	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
			<a class="btn btn-primary" href=<?= isset($_GET['next'])?"/Projet_SUAPS/view/ViewBooking?date=pre&next=". ($_GET['next']-1):"/Projet_SUAPS/view/ViewBooking?date=pre&next=-1" ?>> Precedent</a>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
			<h1 class="reserv_title"> 
				<?= 'Planning : '.$calendar1->getMonthYearToString(); ?>
			</h1>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
			<a class="btn btn-primary" href=<?= isset($_GET['next'])?"/Projet_SUAPS/view/ViewBooking?date=sui&next=". ($_GET['next']+1):"/Projet_SUAPS/view/ViewBooking?date=sui&next=1" ?>> Suivant</a>
		</div>
	</div>
	
	<?php
	$calendar1->_generate();
	initSessionUsersCalendar();
	require_once (ROOT_FOLDER.DS.'asset'.DS.'js'.DS.'fill_calendar.php');
	require_once (ROOT_FOLDER.DS.'view'.DS.'modalReservation.php');
	
	?>
</div>


<?php 
$bookingContent = ob_get_clean(); 
require(ROOT_FOLDER.DS.'view'.DS.'Layout'.DS.'LayoutBooking.php');
?>
