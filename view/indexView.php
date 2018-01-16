<?php 
require_once(__DIR__ .'/../config.php');

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}
?>

<?php
$title = "Golf Suaps"; 


?>

<?php ob_start(); ?>

<?php 
require(ROOT_FOLDER.DS.'view'.DS.'header.php');


?>
<div class="container">
		<div class="row">
			<h2>Bienvenue sur le site de réservation de golf de la plateforme suaps.</h2>
		</div>
		<div class="row pres-row color-green">
			<div class="col-xs-8 col-sm-8 pres-text a-right">
				<h4>Avec la plateforme en ligne de réservation suaps, vous pouvez facilement <mark>consulter</mark> votre calendrier de réservation pour les deux semaines à venir.</h4>
			</div>
			<div class="col-xs-4 col-sm-4 pres-img" style="background-image:url('http://random.cat/i/LQrMm.jpg')">
			</div>
		</div>
		<div class="row pres-row color-white">
			<div class="col-xs-4 col-sm-4 pres-img" style="background-image:url('http://random.cat/i/NFJQj.jpg')">
			</div>
			<div class="col-xs-8 col-sm-8 col-xs-offset-4 col-sm-offset-4 pres-text">
				<h4>En tant que membre adhérant à suaps, vous avez la possibilité de <mark>réserver</mark> votre parcours de golf à l'avance.</h4>
			</div>
		</div>
		<div class="row pres-row color-green">
			<div class="col-xs-8 col-sm-8 pres-text a-right">
				<h4>Vous pouvez aussi facilement consulter un <mark>suivi</mark> de votre utilisation directement à côté du calendrier (statistiques).</h4>
			</div>
			<div class="col-xs-4 col-sm-4 pres-img" style="background-image:url('http://random.cat/i/TuJmK.jpg')">
			</div>
		</div>
		<div class="row pres-row color-white">
			<div class="col-xs-4 col-sm-4 pres-img" style="background-image:url('http://random.cat/i/buGD2.jpg')">
			</div>
			<div class="col-xs-8 col-sm-8 col-xs-offset-4 col-sm-offset-4 pres-text">
				<h4>Vous avez aussi la possibilité d'invitez d'autres membres adhérants à jouer sur un parcours réservé.</h4>
			</div>
		</div>
		<div class="jumbotron color-green">
			<div class="container">
				<h3>Pour vous inscrire ou vous connecter, il vous suffit de cliquer sur le bouton ci-dessous :</h3>
				<p><a class="btn btn-default color-gray" href="#" role="button">C'est parti!</a></p>
			</div>
		</div>
	</div>

<?php $content = ob_get_clean();?>
<?php require(ROOT_FOLDER.DS.'view'.DS.'template.php') ?>
