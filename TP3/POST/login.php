<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php  
echo '<div class="'.$_COOKIE["Style"].'">';
?>
    <form id="login_form" action="connected.php" method="POST">
    <table>
    <tr>
        <th>Login :</th>
        <td><input type="text" name="login"></td>
    </tr>
    <tr>
        <th>Mot de passe :</th>
        <td><input type="password" name="password"></td>
    </tr>
    <tr>
        <th></th>
        <td><input type="submit" value="Se connecter..." /></td>
    </tr>
    </table>
</form>
</div>
</body>
