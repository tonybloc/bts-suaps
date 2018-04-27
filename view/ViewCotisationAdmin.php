<?php
require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'model.php');


if(!isset($_SESSION))
{
    session_start();
}

// combobox nombre de ticket
// combobox utilisateur
// combobox type de ticket
//
$title = "Cotisation";
?>

<?php ob_start(); ?>

<section class="container" id="cotisation">
	<div class="setup-wrapper">
        <!-- en-tête -->
      	<div class="account_header">
        	<h2>Mise à jours des cotisation</h2>
      	</div>
        <!-- Inscription -->
      	<div class="account_form">
        	<form id="formCotisation" action="/Projet_SUAPS/controler/controlerCotisation.php" method="post">
          		<fieldset>
            		<h3>Achats de tickets</h3>
            		<div class="row">
              			
              			<!-- Type de ticket -->
              			<div class="form-group col-md-12">
                			<label for="type_ticket">Type de Ticket</label>
                			<select id="type_ticket" name="type_ticket" class="form-control">
                				<option value="ticket_semaine">Tickets Semaine</option>
                				<option value="ticket_weekend">Tickets Weekend</option>
                			</select>
                			<div class="error error_type_ticket"></div>
              			</div>
              
                        <!-- Nombre de ticket -->
                  		<div class="form-group col-md-12">
                    		<label for="nombre_ticket">Nombre de ticket</label>
                    		<select id="nombre_ticket" name="nombre_ticket" class="form-control">
                            	<option value="1">1 (20€)</option>
                            	<option value="2">2 (40€)</option>
                            	<option value="3">3 (60€)</option>
                            	<option value="4">4 (80€)</option>
                            	<option value="5">5 (100€)</option>
                            	<option value="6">6 (120€)</option>
                            	<option value="7">7 (140€)</option>
                            	<option value="8">8 (160€)</option>
                            	<option value="9">9 (180€)</option>
                            	<option value="10">10 (200€)</option>
                            </select>
                 	   		<div class="error error_nombre_ticket"></div>
                  		</div>
                  		
                  		<!-- Utilisateur -->
                  		<input type="hidden" id="mode" name="mode" value="admin"></input>
            
                  		<div class="form-group col-md-12">
                  			<label for="choix_utilisateur">Choix Utilisateur</label>
                			<select id="choix_utilisateur" name="choix_utilisateur" class="form-control">
                				<?php 
                				    $users = getAllUser();
                				    foreach ($users as $user){
                				        ?>
                				        <option value="<?= $user["id"]?>"> <?= $user['prenom'] . " ". $user['nom']?></option>
                						<?php 
                				    }
                				?>
                			</select>
                			<div class="error error_type_ticket"></div>
                  		</div>
                  		
                  		<!-- Validation Achat -->
                  		<div class="form-group col-md-12">
                    		<div class="checkbox">
                         		<label>
                         			<input id="validation_achat" name="validation_achat" type="checkbox" value="1">
                            		Valider l'achat de tickets
                            	</label>
                        	</div>                    		
                 	   		<div class="error error_nombre_ticket"></div>
                  		</div>
                  		<div class="form-group">
              				<div class="col-sm-4">
              					<button type="submit" class="btn btn-default">Acheter</button>
             	 			</div>          
              				<div class="col-sm-4">
                    		<?php
                    		if(isset($_GET['validation'])){
                    		    
                    		    if($_GET['validation'] == "success" && isset($_SESSION['message_achat_valider']) && !empty($_SESSION['message_achat_valider']))
                    		    {
                    		        echo "<p style='color:green'><i style='padding:5px;color:green;'class='fa fa-check' aria-hidden='true'></i>" .  $_SESSION['message_achat_valider'] . "</p>";
                    		    }
                    		    else if($_GET['validation'] == "wrong" && isset($_SESSION['message_achat_non_valider']) && !empty($_SESSION['message_achat_non_valider']))
                    		    {
                    		        echo "<p style='color:red'><i style='padding:5px;color:red;'class='fa fa-times' aria-hidden='true'></i>" . $_SESSION['message_achat_non_valider'] . "</p>";
                    		    }
                    		    else {
                    		        echo "";
                    		    }
                    		}                			
                    		?>
            				</div>
         				</div>           
              		</div>
            	</fieldset>
        	</form>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require(ROOT_FOLDER.DS.'view'.DS.'Layout'.DS.'LayoutSimple.php') ?>

