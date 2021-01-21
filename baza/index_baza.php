
<?php

require "Baza.php";

echo '<p><a href="../index.php">VRATI SE U PRODAVNICU</a></p>';
$podaci = $baza->daj_satove();

echo "<a href='forma.php'>DODAJ NOVI SAT</a>";
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
    echo "<td><a href='forma.php?id=".$red['id']."'>PROMENI</a></td>";
    echo "<td><a href='baza_fje.php?sta=delete&id=".$red['id']."'>OBRIŠI</a></td>";
    echo "</tr>";
}
?>