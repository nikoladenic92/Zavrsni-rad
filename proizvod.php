<?php

class Proizvodi{
    private $id, $proizvodjac, $model, $opis, $slika, $cena, $grupa;
    function __construct($id, $proizvodjac, $model, $opis, $slika, $cena, $grupa){
        $this->id=$id;
        $this->slika=$slika;
        $this->model=$model;
        $this->opis=$opis;
        $this->proizvodjac=$proizvodjac;
        $this->cena=$cena;
        $this->grupa=$grupa;
    }
    function prikaziProizvod(){
        echo '<div class="proizvod">';
        echo "<a href='detaljnije.php?id=$this->id'>";
        echo '<div class="slika"';
        echo 'style="background-image:url(';
        echo "'$this->slika')";
        echo "\"></div>";
        echo "<div> Cena: ".$this->cena."</div>";
        echo '<div class="naziv"><h3>'.$this->proizvodjac.'</h3>';
        echo '<div><h3>'.$this->model.'</h3></div>';
        echo "</div>";
        echo "</a>";
        echo"<form action='korpa/kupi.php' method='GET'>
        <input type='hidden' value='".$this->id."' name='id' />
        <input style='width:100px' type='submit' value='KUPI' />
    </form>";
        echo "</div>";
        
    }
    function prikaziProizvodDetaljnije(){
      
        echo '<div class="proizvod" id="proizvod">';
        echo '<div class="slika"';
        echo 'style="background-image:url(';
        echo "'$this->slika')";
        echo "\">'</div>";
        echo '<div class="naziv"><h3>'.$this->proizvodjac.'</h3>';
        echo "</div>";
        echo "<div>".$this->model."</div>";
        echo "<div> Cena: ".$this->cena."</div>";
        echo "<div class='opis'> Opis: ".$this->opis."</div>";
        echo"<form action='korpa/kupi.php' method='GET'>
        <input type='hidden' value='".$this->id."' name='id' />
        <input style='width:100px' type='submit' value='KUPI' />
    </form>";
        echo "</div>";
        
    }

    function getID(){
        return $this->id;
    }

    function get_grupa(){
        return $this->grupa;
    }
}

class ListaProizvoda{
    private $proizvodi;

    function __construct($podaci){
        $this->proizvodi=[];

        for($i=0; $i<count($podaci); $i++){
            $this->proizvodi[$i]= new Proizvodi($podaci[$i]['id'],$podaci[$i]['proizvodjac'],$podaci[$i]['model'],$podaci[$i]['opis'],$podaci[$i]['slika'],$podaci[$i]['cena'],$podaci[$i]['grupa']);
        }
    }

    function prikazi(){
        for($i=0; $i<count($this->proizvodi); $i++){
            $this->proizvodi[$i]->prikaziProizvod();
        }
    }

    function pretraga($id_p){
        for($i=0; $i<count($this->proizvodi); $i++){
            if($this->proizvodi[$i]->getID()==$id_p) return $this->proizvodi[$i];
        }
        return false;
    }

     function prikazi_grupu($x){
      for($i=0; $i<count($this->proizvodi); $i++){
           if($this->proizvodi[$i]->get_grupa()==$x) $this->proizvodi[$i]->prikaziProizvod();
        }
     }
}
class Meni{
    function menu(){
        echo "<div><a href='admin/forma.php'>Prijavi se na sajt!</a></div>";
        echo "<div class='meni'>TIPOVI:</div>";
        echo "<div class='meni2'><a href='analogni.php' class='link'><img id='ikonica' src='analog_vektor.jpg' alt='yyy'>Analogni</a></div>";
        echo "<div class='meni2'><a href='digitalni.php' class='link'><img id='ikonica' src='digital_vektor.jpg' alt='yyy'>Digitalni</a></div>";    
    }

    
}

?>