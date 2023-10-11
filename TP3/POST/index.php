<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="style_form" action="index.php" method="GET">
    <select name="css">
    <option value="style1">style1</option>
    <option value="style2">style2</option>
    </select>
    <input type="submit" value="Appliquer" />
</form>
<?php
if(isset($_GET['css'])) {
    setcookie('Style', $_GET['css']);
}
?>
</body>
</html>

