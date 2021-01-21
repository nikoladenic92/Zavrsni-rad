<?php
    session_start();
 

    class Korpa{
        function __construct()
        {
            if(!isset($_SESSION['stavke_korpe']))
                $_SESSION['stavke_korpe'] = [ ];
        }

        function dodaj_proizvod_u_korpu($id, $kol, $cena, $proizvodjac){
            array_push($_SESSION['stavke_korpe'], 
                ['id'=>$id, 'proizvodjac'=>$proizvodjac, 'cena'=>$cena, 'kolicina'=>$kol]);
        }
        function promeni_kolicinu($id, $kol){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++)
                if($_SESSION['stavke_korpe'][$i]['id'] === $id)
                   $_SESSION['stavke_korpe'][$i]['kolicina'] = $kol; 
        }
        function dodaj_kolicinu($id, $kol){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++)
                if($_SESSION['stavke_korpe'][$i]['id'] === $id)
                   $_SESSION['stavke_korpe'][$i]['kolicina'] += $kol; 
        }
        function obrisi_proizvod($id){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++)
                if($_SESSION['stavke_korpe'][$i]['id'] === $id){
                    array_splice($_SESSION['stavke_korpe'], $i, 1);
                    return;
                }
        }
        function obrisi_korpu(){
            $_SESSION['stavke_korpe'] = [];
        }
        function __toString()
        {
           return json_encode($_SESSION['stavke_korpe']); 
        }
        function da_li_postoji_proizvod($id){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++){
                if($_SESSION['stavke_korpe'][$i]['id'] === $id)
                    return true;
            }
            return false;
        }
        function prikazi(){
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Prizvodjac</th>";
                echo "<th>Cena</th>";
                echo "<th>Kolicina</th>";
                echo "<th>Ukupno</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo  "</tr>";
                for($i=0; $i<count($_SESSION['stavke_korpe']); $i++){
                echo "<tr>";
                echo "<td>".$_SESSION['stavke_korpe'][$i]['proizvodjac']."</td>";
                echo "<td>".$_SESSION['stavke_korpe'][$i]['cena']."</td>";
                echo "<td>".$_SESSION['stavke_korpe'][$i]['kolicina']."</td>";
                echo "<td>".$_SESSION['stavke_korpe'][$i]['cena'] * $_SESSION['stavke_korpe'][$i]['kolicina']."</td>";
                echo "<td>
                <form action='dodaje_kolicinu.php' method='GET'>
                    <input type='hidden' value='".$_SESSION['stavke_korpe'][$i]['id']."' name='id' />
                    <input type='submit' value='DODAJ U KORPU' />
                </form>
                </td>";
                echo "<td>
                <form action='obrisi.php' method='GET'>
                    <input type='hidden' value='".$_SESSION['stavke_korpe'][$i]['id']."' name='id' />
                    <input type='submit' value='OBRISI PROIZVOD' />
                </form>
                </td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<div>
            <form action='isprazni_korpu.php' method='GET'>
                <input type='submit' value='ISPRAZNI KORPU' />
            </form>
            </div>";
            echo "<div><form action='snimi.php' method='GET'>
                
                    <input style='width:430px' type='submit' value='SNIMI' />
                </form>
                </div>";
        }
        function ukupno(){
            
            $ukupno=0;            
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++){
                $ukupno+=$_SESSION['stavke_korpe'][$i]['cena'] * $_SESSION['stavke_korpe'][$i]['kolicina'];
            }
                
            return $ukupno;

        }
       
    }
    

    $korpa = new Korpa();
    
?>
