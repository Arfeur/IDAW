<?php
    // on simule une base de données
    $users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'maitrejedi' );

    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;

    if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            session_start();
            $curentUser = array(
                "{$tryLogin}" => "{$tryPwd}"
            );
            print_r($curentUser);
            $login = $tryLogin;
            $_SESSION["newsession"]=$curentUser;
            echo '<form method="post" action="login.php"> 
                    <input type="submit" name="button1  "
                    class="button" value="Se déconnecter" /> ';
            if(isset($_POST['button1'])) { 
                session_unset();
                session_destroy(); 
            } 
        } 
        else
            $errorText = "Erreur de login/password";
    } 
    else
        $errorText = "Merci d'utiliser le formulaire de login";
    if(!$successfullyLogged) {
        echo $errorText;
    } 
    else {
        echo "<h1>Bienvenu ".$login."</h1>";
    }
?>
