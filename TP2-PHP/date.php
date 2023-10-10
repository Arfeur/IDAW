<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Date</title>
</head>
<body>
    <?php
        date_default_timezone_set('Europe/Paris');
        echo date(DATE_RFC2822);

        $prenom = 'Arthur';
        $nom = 'CHEVASSUT';
        $age = "28";

        echo "<br> Prenom: $prenom";

        echo "<br> Age: $age" ;

        echo "<br> Je suis " .$prenom. " " .$nom. " et j'ai " .$age. " ans";

        $x = 4;
        $y = 7;

        if($x>$y){
            echo "<br> $x est plus grand que $y";
        }
        else{
            echo "<br> $y est plus garnd que $x";
        }


    ?>
    <p>Ceci est la date et l'heure actuelle en France</p>
    
</body>
</html>