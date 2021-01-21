<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        background: url("../pozadina.jpg") no-repeat center/cover;
        color: black;
        text-shadow: 1px 1px grey;
    }
</style>
<body>
    <?php
      if(!(  isset($_SESSION['user_id'])  ||  isset($_COOKIE['user_id'])) )
        die("Niste logovani");


           
$conn = new mysqli("localhost","root", "", "projekat_webshop");
if($conn->connect_error)
    die ("Greska konekcija:".$conn->connect_error);

$conn->set_charset("utf8");
$podaci_baze=$conn->query("SELECT * FROM  `satovi` ");

$podaci=$podaci_baze->fetch_all(MYSQLI_ASSOC);

echo "<a href='../baza/forma.php'>DODAJ NOVI SAT</a>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Proizvodjac</th>";
echo "<th>Model</th>";
echo "<th>Opis</th>";
echo "<th>Slika</th>";
echo "<th>Cena</th>";
echo "<th></th>";

echo "</tr>";
foreach($podaci as $red){
    echo "<tr>";
    
    echo "<td>".$red['proizvodjac']."</td>";
    echo "<td>".$red['model']."</td>";
    echo "<td>".$red['opis']."</td>";
    echo "<td>".$red['slika']."</td>";
    echo "<td>".$red['cena']."</td>";
    echo "<td><a href='../baza/forma.php?id=".$red['id']."'>PROMENI</a></td>";
    echo "<td><a href='../baza/baza_fje.php?sta=delete&id=".$red['id']."'>OBRIŠI</a></td>";
    echo "</tr>";
}
echo "<div><a href='../index.php'>NAZAD NA PRODAVNICU</a><div>";
    ?>
</body>
</html>