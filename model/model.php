
<?php

function dbConnect()
{
    $bdd = new PDO('mysql:host=localhost;dbname=suaps;charset=utf8', 'root', '');
    return $bdd;
}
