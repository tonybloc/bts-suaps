
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
$calendar1 = new Calendar(date("j"),date("n"),date("Y"));


if(!isset($_GET['next']))
{
    $i = 0;
}
else{
    if($_GET["date"] == "sui"){
        $i = $_GET['next'];
        
        $calendar1->addDay(15*$i);
    }
    else if($_GET["date"] == "pre"){
        $i = $_GET['next'];
        
        $calendar1->addDay(14*$i);
    }
    
}
?>
<?php ob_start(); ?>


<div class="panel_reservation">
	<div>
	<?php 
	if(!empty($_SESSION["ERREUR_TROP_DE_RESERVATION"]) ){	
	?>
	    <div class="alert alert-warning alert-dismissible">
	    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    	<strong>Attention :</strong>
	    	<?= $_SESSION["ERREUR_TROP_DE_RESERVATION"]?>
	    </div>
	<?php
	$_SESSION["ERREUR_TROP_DE_RESERVATION"]="";
	}
	?>
	<?php 
	if(!empty($_SESSION["ERREUR_TICKETS_MANQUANTS"]) ){	
	?>
	    <div class="alert alert-warning alert-dismissible">
	    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    	<strong>Attention :</strong>
	    	<?= $_SESSION["ERREUR_TICKETS_MANQUANTS"]?>
	    </div>
	<?php
	$_SESSION["ERREUR_TICKETS_MANQUANTS"]="";
	}
	?>
		<div style="text-align:center;">
			<h1 class="reserv_title"> 
				<?= 'Planning : '.$calendar1->getMonthYearToString(); ?>
			</h1>
		</div>
	</div>
	<div>
		<div style="text-align:center;">
			<a class="btn btn-primary btn-calandar-navigation" href=<?= isset($_GET['next'])?"/Projet_SUAPS/view/ViewBooking?date=pre&next=". ($_GET['next']-1):"/Projet_SUAPS/view/ViewBooking?date=pre&next=-1" ?>><i class="fa fa-angle-left"></i> Precedent </a>
			<a class="btn btn-primary btn-calandar-navigation" href=<?= isset($_GET['next'])?"/Projet_SUAPS/view/ViewBooking?date=sui&next=". ($_GET['next']+1):"/Projet_SUAPS/view/ViewBooking?date=sui&next=1" ?>> Suivant <i class="fa fa-angle-right"></i></a>
		</div>
	</div>
	
	<?php
	
	$calendar1->generate();
	initSessionUsersCalendar();
	
	?>
</div>


<?php 
$bookingContent = ob_get_clean(); 
require(ROOT_FOLDER.DS.'view'.DS.'Layout'.DS.'LayoutBooking.php');
?>
