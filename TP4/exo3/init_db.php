<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

        $sql =  file_get_contents('sql/create_db.sql');
        $pdo-> exec($sql);

        $pdo = null;
    ?>
</body>
</html>