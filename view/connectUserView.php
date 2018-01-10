<?php 
require_once(__DIR__ .'/../config.php');
require_once(ROOT_FOLDER.DS.'model'.DS.'form.class.php');

session_start();

// COMMENTIARE
$title = "Golf Suaps";

// Création du formulaire
$form = new Form($_POST);

?>

<?php 
// Démarrer la temporisation
ob_start(); 
?>
     
	<?php require( ROOT_FOLDER.DS.'view'.DS.'header.php')?>
	
	<section class="container" id="connection">
		<div class="test">
			<h1>Connexion Suaps Golf</h1>
			</br>
        	<form class="form-horizontal" method="post" action="/Projet_SUAPS/controler/connexion.php">            	
            	<div class="form-group">
            		<?php 
            		  echo $form->label("Email","col-sm-2 control-label","input_email");
            		?>
            		<div class="col-sm-8">
            		<?php
            		  echo $form->email("email","input_email","form-control","Votre email (ex: dupont@domaine.fr)");
            		?>
            		</div>        		
            	</div>
            	<div class="form-group">
            		<?php 
            		  echo $form->label("Mot de passe","col-sm-2 control-label","input_password");
            		?>
            		<div class="col-sm-8">
            		<?php
            		  echo $form->password("password","input_password","form-control","Mot de passe");
            		?>
            		</div>
            	</div>
            	<div class="form-group">
            		<div class="col-sm-offset-2 col-sm-4">
            			<?php echo $form->submit("Se Connecter", "input_submit", "btn btn-default")?>
            		</div>
            		<div class="col-sm-4">
                		<p id="message_connect_error"><?php
                			if(isset($_SESSION['message_connect_error']))
                			{
                			    echo $_SESSION['message_connect_error'];
                			}
                			else 
                			{
                			    echo "";
                			}
                			
                			?>
            			</p>
            		</div>
            	</div>
        	</form>
		</div>    	
    </section>
    <?php 
        //var_dump($_SESSION);
    ?>
    
<?php 
    // On récupère le contenu crée par tempon de ob_start()
    $content = ob_get_clean();
?>
<?php require(ROOT_FOLDER.DS.'view'.DS.'template.php');?>