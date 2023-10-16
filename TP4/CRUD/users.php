<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once('config.php');

        $isUpdating = false;
        $updateId = "";
        $updateName = "";
        $updateMail = "";

        if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["email"]))
        {
            $updateId=$_POST['id'];
            $updateName= $_POST['name'];
            $updateMail= $_POST['email'];
            $isUpdating = true;        
        }



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
        $request = $pdo->prepare("select * from users");

        $request-> execute();

        $resultat = $request->fetchAll(PDO::FETCH_ASSOC);

        echo 
            '<table>

            <tr>
                <td>Id</td>
                <td>Nom</td>
                <td>Mail</td>
            </tr>';

            foreach ($resultat as $users){
                echo "<tr>";
                echo "<td> {$users['id']} </td>";
                echo "<td> {$users['name']} </td>";
                echo "<td> {$users['email']} </td>";
                echo "<td><form method='post' action='deleteUser.php'>";
                echo '<input type="hidden" name="id" value='.$users['id'].'>';
                echo '<input type="submit" name="submit" value="Supprimer">';
                echo "</form></td>";
                echo "<td><form method='post' action='users.php'>";
                echo '<input type="hidden" name="id" value='.$users['id'].'>';
                echo '<input type="hidden" name="name" value='.$users['name'].'>';
                echo '<input type="hidden" name="email" value='.$users['email'].'>';
                echo '<input type="submit" name="submit" value="Modifier">';
                echo "</form></td>";
                echo "</tr>";
            }
            echo "</table>";

        $pdo = null;
        if($isUpdating){
            echo "<form method='post' action='modifyUser.php'>";
            echo "<input type='hidden' name='id' value='$updateId'>";
            echo "<input type='text' class='form' placeholder='Paul Durand' name='name' value='$updateName'>";
            echo "<br>";
            echo "<input type='email' class='form' placeholder='example@mail.com' name='email' value='$updateMail'>";
            echo "<br>";
            echo "<input type='submit' value='Modifier'></input>";
        }
        else{
            echo "<form method='post' action='addUser.php'>";
            echo "<input type='text' class='form' placeholder='Paul Durand' name='name'>";
            echo "<br>";
            echo "<input type='email' class='form' placeholder='example@mail.com' name='email'>";
            echo "<br>";
            echo "<input type='submit' value='Ajouter'></input>";

        }
        ?>

</body>
</html>