<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     body{
        background: url("../pozadina.jpg") no-repeat center/cover;
    }
</style>
<body>
    

<?php
require "Korpa.php";
require "Baza_korpa.php";

$korpa->prikazi();
echo "<p> UKUPNO: ".$korpa->ukupno()."</p>";

echo "<a href='index.php'>NASLOVNA STRANA</a>";
?>
</body>
</html>