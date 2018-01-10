<?php 
require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER.DS.'model'.DS.'user.class.php');


// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}

?>
    
    <section>
    	<div class="panel_stat">
    		<?php 
    		if(isset($_SESSION['user']))		
    		{
    		?>
    		<table>
    			<tr>
        			<td>
        				<strong><?= unserialize($_SESSION['user'])->getRoleLib() ?></strong>
        			</td>
    			</tr>
    		
    			<tr>
    				<td class="title_stat">Tickets SEM</td>
    				<td> : </td>
    				<td class="value_stat">
	    			<?= (unserialize($_SESSION['user'])->getNbTicketSemaine() != null) ? unserialize($_SESSION['user'])->getNbTicketWeek() : "0" ?>
    				</td>
    			</tr>
    			<tr>
    				<td class="title_stat">Tickets WE</td>
    				<td> : </td>
    				<td class="value_stat">
    				<?=  (unserialize($_SESSION['user'])->getNbTicketWeek() != null) ? unserialize($_SESSION['user'])->getNbTicketWeek() : "0" ?>
    				</td>
    			</tr>
    			<tr>
    				<td class="title_stat">Parcours</td>
    				<td> : </td>
    				<td class="value_stat">
    				 <?=  (unserialize($_SESSION['user'])->getNbTicketTotal() != null) ? unserialize($_SESSION['user'])->getNbTicketTotal() : "0" ?>
    				</td>
    			</tr>
    			<tr>
    				<td class="title_stat">Réservation</td>
    				<td> : </td>
    				<td class="value_stat">
    				<?= "" // à faire ?>
    				</td>
    			</tr>
    			<tr>
    				<td class="title_stat" >Annulation</td>
    				<td> : </td>
    				<td class="value_stat">
    				<?= "" // à faire ?>
    				</td>
    			</tr>
    			<tr>
    				<td class="title_stat" >Invitation</td>
    				<td> : </td>
    				<td class="value_stat">
    				<?= "" // à faire ?>
    				</td>
    			</tr>
    			<tr>
    				<td>
    				<p><a class="btn btn-default" href="/Projet_SUAPS/view/connectUserView.php">Se Connecter</a></p>
    				</td>
    			</tr>
    		</table>
    		
    		<?php        
            }
            else 
            {
            ?>
                <p><a class="btn btn-default" href="/Projet_SUAPS/view/connectUserView.php">Se Connecter</a></p>
           	<?php 
            }
            ?>
    	</div>
    </section>
<?php

    require(ROOT_FOLDER.DS.'view'.DS.'template.php');
?>