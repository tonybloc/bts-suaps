<?php 

require_once(__DIR__. '/../config.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'model.php');

if(!isset($_SESSION))
{
    session_start();
}

if( empty($_POST['inscriptionFirsName']) && empty($_POST['inscriptionLastName']) &&
        empty($_POST['inscriptionEmail']) && empty($_POST['inscriptionPwd']) &&
            empty($_POST['inscriptionPwdComfirm']) )
{
    header("/Projet/view/inscription.php");
}
else
{

    $email = htmlspecialchars($_POST['inscriptionEmail']);
    $firstName = strtoupper(htmlspecialchars($_POST['inscriptionEmail']));
    $lastName = htmlspecialchars($_POST['inscriptionEmail']);
    $password = htmlspecialchars($_POST['inscriptionEmail']);
    $passwordConfirm = htmlspecialchars($_POST['inscriptionEmail']);
    
    if($password == $passwordConfirm)
    {
        inscritNewUser($email, $firstName, $lastName, $password);
    }
    else 
    {
        
            
    }
    
}

?>