<?php 
require_once(__DIR__ .'/../../config.php');

// Vérifie si une session existe déja sinon on la crée
if(!isset($_SESSION))
{
    session_start();
}

if(isset($_SESSION['user']))
{
    var_dump($expression);
?>


<?php
}

?>
<script>
	console.log('hello');
</script>
