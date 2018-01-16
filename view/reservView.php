
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


ob_start();
?>



<?php
// Importation des fichiers de vue :
require_once (ROOT_FOLDER.DS.'view'.DS.'header.php');
?>


<section>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 panel-left">
			<?php require_once (ROOT_FOLDER.DS.'view'.DS.'statView.php');?>
			<?php
			
			if(isset($_SESSION['user'])){
			    if(unserialize($_SESSION['user'])->getRole() == ADMIN)
			    {
			        require_once (ROOT_FOLDER.DS.'view'.DS.'management.php');
			    }
			}			
			?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 panel-right">
			<div class="panel_reservation">
            	<h1 class="reserv_title"> <?php echo 'Planning : '.$calendar1->getMonthYearToString();?> </h1>
            	<?php echo $calendar1->_generate();
            	initSessionUsersCalendar();
            	require_once (ROOT_FOLDER.DS.'asset'.DS.'js'.DS.'test.js');
            	require_once (ROOT_FOLDER.DS.'view'.DS.'modalReservation.php');
                require_once (ROOT_FOLDER.DS.'asset'.DS.'js'.DS.'fill_calendar.php');?>
            </div>
		</div>
	</div>	
</section>


<?php 
$content = ob_get_clean(); 
require(ROOT_FOLDER.DS.'view'.DS.'template.php');
?>
