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





if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["email"]))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mail = $_POST['email'];

    // Utilisation d'une requête préparée avec des paramètres liés
    $request = $pdo->prepare('UPDATE users SET name = :name, email = :email WHERE id = :id');
    $request->bindParam(':name', $name);
    $request->bindParam(':email', $mail);
    $request->bindParam(':id', $id);

    $request->execute();
    header('Location: http://localhost/IDAW/TP4/CRUD/users.php');
    exit();
}

$pdo = null;
?>