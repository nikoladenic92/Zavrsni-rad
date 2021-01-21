<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
     body{
        background: url("../pozadina.jpg") no-repeat center/cover;
    }
</style>

<?php
    require "Korpa.php";
    require "Baza_korpa.php";
    require "../proizvod.php";
    
    $id = $_GET['id'];

    if($korpa->da_li_postoji_proizvod($id)){
       
        $korpa-> dodaj_kolicinu($id, 1);
    }else{
        
        $p = $baza->proizvod_1($id);
        $korpa->dodaj_proizvod_u_korpu($id, 1, $p['cena'], $p['proizvodjac']);
    }

    echo $korpa;
    echo "<a href='index.php'>PROIZVODI</a>";
    //header('Location: index.php');
?>
</body>
</html>