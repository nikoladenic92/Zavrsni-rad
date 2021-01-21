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
    require  "proizvod.php";
    require  "baza/Baza.php";
    $podaci = $baza->daj_satove();
    

    echo "<div class='sredina'>";

        echo "<div class='div2'>";
       
        $x=new Meni();
        $x->menu();
        echo "</div>";

        echo "<div class='sredina'>";
        $lista= new ListaProizvoda($podaci);
        $lista->prikazi_grupu('analogni');
        echo "</div>";

    echo "</div>";

   
    require "include/footer.php";

    ?>
</body>
</html>