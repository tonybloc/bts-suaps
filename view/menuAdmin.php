<?php 
require_once(__DIR__ .'/../config.php');

if(!isset($_SESSION))
{
    session_start();
}
?>

<?php ob_start(); ?>


<?php 
if(isset($_SESSION['user'])){
    if(unserialize($_SESSION['user'])->getRole() == ADMIN)
    {
       ?>    
            <div class="nav_admin">
            	<div class="panel_title">
            		<h4>Administration</h4>
            	</div>
            	<div class="panel_content">
                	<ul class="nav nav-pills nav-stacked">
                		<li><a href="/Projet_SUAPS/view/ViewGlobalStatistique.php">Statisitique Globals</a></li>
                		<li><a href="#">Cotisation des Membres</a></li>
                		<li><a href="/Projet_SUAPS/view/ViewInscription.php">Inscription des utilisateurs</a></li>
                		<li><a href="#">Tickets</a></li>
                	</ul>
                </div>
            </div>
       <?php 
    }
}	
?>

<?php $menuAdminContent = ob_get_clean();?>