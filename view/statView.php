<?php 
require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER.DS.'model'.DS.'user.class.php');


// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}
?>
    

<div class="panel_stat">
	<?php 
	if(isset($_SESSION['user']))		
	{
	?>
	<div class="panel_title">
		<h4>Statistique</h4>
	</div>
	<div class="panel_content">
    	<table class="table_stat">
    		<tr>
    			<td colspan="3">
    				<p class="stat_user_title"><?= unserialize($_SESSION['user'])->getLastName() . ' ' .unserialize($_SESSION['user'])->getFirstName().' ('.unserialize($_SESSION['user'])->getRoleLib().')' ?></p>
    			</td>
    		</tr>
    	
    		<tr>
    			<td class="title_stat">Tickets SEM</td>
    			<td class="separator_stat"> : </td>
    			<td class="value_stat">
    			<?= (unserialize($_SESSION['user'])->getNbTicketSemaine() != null) ? unserialize($_SESSION['user'])->getNbTicketWeek() : "0" ?>
    			</td>
    		</tr>
    		<tr>
    			<td class="title_stat">Tickets WE</td>
    			<td class="separator_stat"> : </td>
    			<td class="value_stat">
    			<?=  (unserialize($_SESSION['user'])->getNbTicketWeek() != null) ? unserialize($_SESSION['user'])->getNbTicketWeek() : "0" ?>
    			</td>
    		</tr>
    		<tr>
    			<td class="title_stat">Parcours</td>
    			<td class="separator_stat"> : </td>
    			<td class="value_stat">
    			 <?=  (unserialize($_SESSION['user'])->getNbTicketTotal() != null) ? unserialize($_SESSION['user'])->getNbTicketTotal() : "0" ?>
    			</td>
    		</tr>
    		<tr>
    			<td class="title_stat">Réservation</td>
    			<td class="separator_stat"> : </td>
    			<td class="value_stat">
    			<?= "" // à faire ?>
    			</td>
    		</tr>
    		<tr>
    			<td class="title_stat" >Annulation</td>
    			<td class="separator_stat"> : </td>
    			<td class="value_stat">
    			<?= "" // à faire ?>
    			</td>
    		</tr>
    		<tr>
    			<td class="title_stat" >Invitation</td>
    			<td class="separator_stat"> : </td>
    			<td class="value_stat">
    			<?= "" // à faire ?>
    			</td>
    		</tr>
    	</table>
	</div>	
	<?php        
    }
    else 
    {
    ?>
    	<p style="text-align:center;padding:5px;margin:5px 0px 0px 0px;"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i></p>
    	<p style="text-align:center;padding:5px;">Pour réserver une place, vous devez vous connecter</p>
        <p style="text-align:center;padding:5px;"><a class="btn btn-default" href="/Projet_SUAPS/view/connectUserView.php">Se Connecter</a></p>
   	<?php 
    }
    ?>
</div>
