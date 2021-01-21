<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require "include/header.php";
    require "baza/Baza.php";
    require "proizvod.php";

    
$podaci=$baza->daj_satove();

    echo "<div class='sredina'>";

        echo "<div class='div2'>";
        
        $x=new Meni();
        $x->menu();
        echo "</div>";

        echo "<div class='sredina'>";
        $p=$_GET['id'];
        $lp=new ListaProizvoda($podaci);
        $proizvod=$lp->pretraga($p);
        echo $proizvod->prikaziProizvodDetaljnije();
        echo "</div>";

    echo "</div>";

    
   require "include/footer.php";


?>
</body>
</html>