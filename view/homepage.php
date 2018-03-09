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

<div class="container">
		<div class="row">
			<h2 style="text-align:center">Bienvenue sur le site de réservation de golf de la plateforme Suaps.</h2>
		</div>
		<div class="row pres-row color-green">
			<div class="col-xs-8 col-sm-8 pres-text">
				<h4>Avec la plateforme en ligne de réservation suaps, vous pouvez facilement consulter votre calendrier de réservation pour les deux semaines à venir.</h4>	
			</div>
			<div class="col-xs-4 col-sm-4 pres-img" style="background-image:url('http://www.campusbn.org/wp-content/uploads/2014/05/free-golf-pacakage.jpg')">
			</div>
		</div>
		<div class="row pres-row color-white">
			<div class="col-xs-4 col-sm-4 pres-img" style="background-image:url('http://suaps.edu.umontpellier.fr/files/2017/04/golf-300x201.jpg')">
			</div>
			<div class="col-xs-8 col-sm-8 col-xs-offset-4 col-sm-offset-4 pres-text">
				<h4>En tant que membre adhérant à suaps, vous avez la possibilité de réserver votre parcours de golf à l'avance.</h4>
			</div>
		</div>
		<div class="row pres-row color-green">
			<div class="col-xs-8 col-sm-8 pres-text a-right">
				<h4>Vous pouvez aussi facilement consulter un suivi de votre utilisation directement à côté du calendrier (statistiques).</h4>
			</div>
			<div class="col-xs-4 col-sm-4 pres-img" style="background-image:url('http://class.uca.fr/sites/class.uca.fr/IMG/jpg/cache_31606213.jpg')">
			</div>
		</div>
		<div class="row pres-row color-white">
			<div class="col-xs-4 col-sm-4 pres-img" style="background-image:url('https://suaps.u-bourgogne.fr/wp-content/uploads/2015/02/IMG_53911-361x530.jpg')">
			</div>
			<div class="col-xs-8 col-sm-8 col-xs-offset-4 col-sm-offset-4 pres-text">
				<h4>Vous avez aussi la possibilité d'invitez d'autres membres adhérants à jouer sur un parcours réservé.</h4>
			</div>
		</div>
	</div>

<?php $content = ob_get_clean();?>
<?php require(ROOT_FOLDER.DS.'view'.DS.'Layout'.DS.'LayoutSimple.php') ?>
