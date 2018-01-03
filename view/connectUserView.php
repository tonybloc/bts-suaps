<?php $title = "Golf Suaps";?>

<?php require('../model/formulaire.php');?>

<?php 
    // Création du formulaire
    $form = new Form($_POST); 

?>
        
        
<?php 
    // Début de l'affichage 
    ob_start();
?>
	
	<?php require('../view/header.php')?>
	
	<section id="connection">
    	<form method="post" action="#">
        	<?php 
        	   echo $form->email('user_email', "Email");
        	   echo $form->password('user_pass', "Mot de passe");
        	   echo $form->submit();
        	 ?>
    	</form>
    	
    </section>
    
<?php 
    // On récupère le contenu crée par tempon de ob_start()
    $content = ob_get_clean();
?>
<?php require('../view/template.php');?>