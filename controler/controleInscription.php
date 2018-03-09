<?php 

require_once(__DIR__. '/../config.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'model.php');

if(!isset($_SESSION))
{
    session_start();
}
echo "THERE";
if( isset($_POST['inscriptionFirstName']) && isset($_POST['inscriptionLastName']) &&
    isset($_POST['inscriptionEmail']) && isset($_POST['inscriptionPwd']) &&
    isset($_POST['inscriptionPwdComfirm']) )
{
    echo "isset ok";
    if( empty($_POST['inscriptionFirstName']) && empty($_POST['inscriptionLastName']) &&
        empty($_POST['inscriptionEmail']) && empty($_POST['inscriptionPwd']) &&
        empty($_POST['inscriptionPwdComfirm']) )
    {
        $_SESSION['message_inscription_error'] = "";
        header("location: /Projet_SUAPS/view/ViewInscription.php?insc=wrong");
    }
    else
    {
        echo "empty ok";
        $email = htmlspecialchars($_POST['inscriptionEmail']);
        $firstName = strtoupper(htmlspecialchars($_POST['inscriptionFirstName']));
        $lastName = htmlspecialchars($_POST['inscriptionLastName']);
        $password = htmlspecialchars($_POST['inscriptionPwd']);
        $passwordConfirm = htmlspecialchars($_POST['inscriptionPwdComfirm']);
        
        if($password == $passwordConfirm)
        {
            inscritNewUser($email, $firstName, $lastName, $password);
            $_SESSION['message_inscription_confirm'] = "Utilisateur inscrit";
            header("location: /Projet_SUAPS/view/ViewInscription.php?insc=success");
        }
        else
        {
            $_SESSION['message_inscription_error'] = "Mot de passe invalide";
            header("location: /Projet_SUAPS/view/ViewInscription.php?insc=wrong");
        }
    }
}else{
    header("location: /Projet_SUAPS/view/ViewInscription.php?insc=wrong");
}
    


?>