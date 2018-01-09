<<<<<<< HEAD
<?php 
use model\Calendar;

$title = "Réservation";

require_once ('../config.php');
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
=======
<main>
	<section>
	    <!-- en-tête -->
		<div class="setup-wrapper">
    		<!-- Inscription -->
    		<div class="account_header">
            	<h2>Compte utilisateur</h2>
         	</div>
         	<div>
        		<table class="table">
        			<thead>
        				<tr>
        					<th scope ="col">#nomdumois#</th>
        					<th scope ="col">Joueur1</th>
        					<th scope ="col">Joueur2</th>
        					<th scope ="col">Joueur3</th>
        					<th scope ="col">Joueur4</th>
       					</tr>
       				</thead>
       				<tbody>
       					<tr>
        					<th scope = "row">Lundi #numj</th>
        					<td>#nomj1#</td>
        					<td>#nomj2#</td>
        					<td>#nomj3#</td>
        					<td>#nomj4#</td>
        				</tr>
       					<tr>
        					<th scope = "row">Mardi #numj</th>
        					<td>#nomj1#</td>
        					<td>#nomj2#</td>
        					<td>#nomj3#</td>
        					<td>#nomj4#</td>
        				</tr>
        				<tr>
        					<th scope = "row">Mercredi #numj</th>
        				<td>#nomj1#</td>
       						<td>#nomj2#</td>
       						<td>#nomj3#</td>
       						<td>#nomj4#</td>
       					</tr>
        				<tr>
        					<th scope = "row">Jeudi #numj</th>
        					<td>#nomj1#</td>
        					<td>#nomj2#</td>
        					<td>#nomj3#</td>
       						<td>#nomj4#</td>
       					</tr>
        				<tr>
        					<th scope = "row">Vendredi #numj</th>
        					<td>#nomj1#</td>
        					<td>#nomj2#</td>
        					<td>#nomj3#</td>
       						<td>#nomj4#</td>
       					</tr>
       					<tr>
        					<th scope = "row">Samedi #numj</th>
        					<td>#nomj1#</td>
        					<td>#nomj2#</td>
        					<td>#nomj3#</td>
        					<td>#nomj4#</td>
        				</tr>
       					<tr>
       						<th scope = "row">Dimanche #numj</th>
        					<td>#nomj1#</td>
        					<td>#nomj2#</td>
        					<td>#nomj3#</td>
        					<td>#nomj4#</td>
        				</tr>
        			</tbody>
       			</table>
    		</div>
		</div>
	</section>
</main>

<?php 
require_once(__DIR__ .'/../config.php');
?>
>>>>>>> branch 'master' of https://gitlab.com/TonyMochel/Projet_SUAPS.git
