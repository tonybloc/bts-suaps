<?php 
require_once(__DIR__ .'/../../config.php');

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}


if(isset($_SESSION['Users']) && isset($_SESSION['user']))
{
   
?>

<script>

	// Liste des utilisateurs
	var users = new Array(<?= $_SESSION['Users']?>);
	
	// Utilisateur connecté
	var userConnected = {<?= convertUserToStringJS(unserialize($_SESSION['user'])) ?>};
	
	
	
	sessionStorage.setItem("users", JSON.stringify(users));
	sessionStorage.setItem("userMail", userConnected['email']);
	sessionStorage.setItem("userName", userConnected['name'] + ' ' + userConnected['lastName']);
	sessionStorage.setItem("userRole", userConnected['role']);
	sessionStorage.setItem("userId", userConnected['id']);
	

</script>

<?php
}

?>

