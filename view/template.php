<?php 
require_once(__DIR__ .'/../config.php');
require_once (ROOT_FOLDER.DS.'model'.DS.'model.php');
    
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title> <?= $title ?> </title>
	
		
        <!-- Style -->
        <link rel="stylesheet" href="/Projet_SUAPS/asset/css/calendar.css">
        <link rel="stylesheet" href="/Projet_SUAPS/asset/css/formulaire.css">
        <link rel="stylesheet" href="/Projet_SUAPS/asset/css/navigation.css">
        <link rel="stylesheet" href="/Projet_SUAPS/asset/css/header.css">
        <link rel="stylesheet" href="/Projet_SUAPS/asset/css/statistique.css">
        <link rel="stylesheet" href="/Projet_SUAPS/asset/css/reservation.css">
     
		
		<!--Style Bootstrap -->
        <link rel="stylesheet" href="/Projet_SUAPS/asset/bootstrap/css/bootstrap.min.css">
        
        <!-- Icons -->
        <link rel="stylesheet" href="/Projet_SUAPS/asset/font-awesome/css/font-awesome.min.css">
        
        
		<style>
		  body{
		      background-color:#EFEFEF;		      
		  }
		  .error{
		      color:red;
		  }
		</style>
	</head>
	
	<body>		
		<?= (isset($content))?$content:null  ?>
	</body>
	<p></p>
	
	<!-- Script -->
	
	<?php require_once(ROOT_FOLDER.DS.'asset'.DS.'js'.DS.'scriptCalendrier.php');?>
		
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="/Projet_SUAPS/asset/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
	 
	<script src="/Projet_SUAPS/asset/js/jquery.validate.js"></script>
	<script src="/Projet_SUAPS/asset/js/validationForm.js"></script>
	<?php require_once (ROOT_FOLDER.DS.'asset'.DS.'js'.DS.'app.php');?>
	


</html>
