<?php
    require "Baza_korpa.php";
?>
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
    $baza = new Baza();
    $p = $baza->proizvodi();
    ?>
    <table border="1">
    <thead>
        <tr>
            <th>Proizvodjac</th>
            <th>Model</th>
            <th>Cena</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($p as $red){
                echo "<tr>";
                echo "<td>".$red['proizvodjac']."</td>";
                echo "<td>".$red['model']."</td>";
                echo "<td>".$red['cena']."</td>";
                ?>
                
                <td>
                <form action="kupi.php" method="GET">
                    <input type="hidden" value="<?=$red['id']?>" name="id" />
                    <input type="submit" value="KUPI" />
                </form>
                </td>
                <?php
                echo "</tr>";
            }
   
        ?>
    </tbody>
    </table>
    <a href="prikazi_korpu.php">KORPA PROIZVODA</a>
    <p><a href="../index.php">NAZAD NA PRODAVNICU</a></p>
   
</body>
</html>