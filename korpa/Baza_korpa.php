<?php
class Baza{
    public $conn;
    function __construct(){
        $this->conn = new mysqli("localhost", "root", "", "projekat_webshop");
        if($this->conn->connect_error)
            die("Nije konektovan na bazu");
    }
    function proizvodi(){
        $proizvodi = $this->conn->query("SELECT * FROM satovi");
        $p = $proizvodi->fetch_all(MYSQLI_ASSOC);
        return $p;
    }
    function proizvod_1($id){
        $proizvodi = $this->conn->query("SELECT * FROM satovi WHERE id=$id");
        $p = $proizvodi->fetch_all(MYSQLI_ASSOC);
        return $p[0];
    }
    function snimi($uku){

        $this->conn->autocommit(FALSE);  
        $t = $this->conn->query("INSERT INTO `korpa`(`id`, `datum_vreme`, `ukupno`) VALUES 
            (null, NOW(), $uku )");
        $id = $this->conn->insert_id;
        if(!$t){
            $this->conn->rollback();
            die("Nije upisano! ".$this->conn->error);
        }
        for($i=0; $i<count($_SESSION['stavke_korpe']); $i++){
            $t = $this->conn->query("INSERT INTO `stavke_korpe`
            (`id`, `korpa_id`, `proizvod_id`, `cena`, `kolicina`) VALUES 
            (null, $id, ".
            $_SESSION['stavke_korpe'][$i]['id'].", ".
            $_SESSION['stavke_korpe'][$i]['cena'].", ".
            $_SESSION['stavke_korpe'][$i]['kolicina']." ) "
            );
            if(!$t){
                $this->conn->rollback();
                die("NEUSPESNO: $i".$this->conn->error);
            }
        }
            
        $this->conn->commit();
        $this->conn->autocommit(TRUE);
}

}
$baza = new Baza();
?>