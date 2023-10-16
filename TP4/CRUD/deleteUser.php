<?php

require_once('config.php');
$connectionString = "mysql:host=". _MYSQL_HOST;
if(defined('_MYSQL_PORT'))
    $connectionString .= ";port=". _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
    $pdo = NULL;
try {
    $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $erreur) {
    echo 'Erreur : '.$erreur->getMessage();
}





if(isset($_POST["id"]))
{
    $id=$_POST['id'];

    $request = $pdo->prepare('DELETE FROM `users` WHERE `users`.`id` = '.$id.'');

    $request-> execute();



}
header('Location: http://localhost/IDAW/TP4/CRUD/users.php');
exit();
$pdo = null;
?>