<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require "Baza.php";
        $id = ($_GET['id'])?? '';
        
        if($id !== ''){
            
            $red = $baza->daj_sat($id);
            $sta = "update";
        }else{
            $red = ["proizvodjac"=>" ", "model"=>" ","opis"=>" ","slika"=>" ", "cena"=>0];
            $sta = "insert";
        }
    ?>
    <a href="index_baza.php">NASLOVNA</a>

    <form action="baza_fje.php" method="POST">

        <input value="<?=$id?>" name="id" type="hidden" />
        <input value="<?=$sta?>" name="sta" type="hidden" />
        Proizvodjac:<input value="<?=$red['proizvodjac']?>" type="text" name="proizvodjac" />
        Model:<input value="<?=$red['model']?>" type="text" name="model" />
        Opis:<input value="<?=$red['opis']?>" type="text" name="opis" />
        Slika:<input value="<?=$red['slika']?>" type="text" name="slika" />
        Cena:<input value="<?=$red['cena']?>" type="number" name="cena"  />
        <input name="dugme" type="submit" value="SNIMI SAT" />
    </form>
</body>
</html>