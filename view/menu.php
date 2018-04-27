<?php
require_once(__DIR__ .'/../config.php');

if(!isset($_SESSION))
{
    session_start();
}

ob_start(); 
if(isset($_SESSION['user'])){
?>
<div class="nav_admin">
	<div class="panel_title">
		<h4>Menu</h4>
	</div>
	<div class="panel_content">
    	<ul class="nav nav-pills nav-stacked">
			<li><a href="/Projet_SUAPS/view/ViewCotisation.php">Achat de ticket</a></li>
		</ul>
    </div>
</div>

<?php     
}
?>



<?php $menuContent = ob_get_clean();?>