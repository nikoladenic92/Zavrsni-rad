<?php


    class Baza{
        private $conn;
        public $greska;

        function connect(){
            $this->conn = new mysqli("localhost", "root", "", "projekat_webshop");

            if($this->conn->connect_error){
                $this->greska = $this->conn->connect_error;
                return false;
            }
               
            $this->conn->set_charset("utf8");
            return true;
        }

        function upit($sql){
            return $this->conn->query($sql);
        }
        function real_escape_string($str){
            return $this->conn->real_escape_string($str);
        }
        function greska(){
            return $this->conn->error;
        }
        function affected_rows(){
            return $this->conn->affected_rows;
        }
        function insert_id(){
            return $this->conn->insert_id;
        }


        function daj_satove(){
            $podaci_baze = $this->upit("SELECT * FROM satovi");    
            return $podaci_baze->fetch_all(MYSQLI_ASSOC);
        }
        function daj_sat($id){
            $podaci_baze = $this->upit("SELECT * FROM satovi WHERE id=$id");    
            $podaci_baze->data_seek(0);
            return $podaci_baze->fetch_assoc();

        }
        function insert_sat($proizvodjac, $model, $opis, $slika, $cena){
            $proizvodjac = $this->real_escape_string($proizvodjac);
            $model = $this->real_escape_string($model);
            $opis = $this->real_escape_string($opis);
            $slika = $this->real_escape_string($slika);
            $cena = $this->real_escape_string($cena);

            return $this->upit("INSERT INTO satovi(proizvodjac, model, opis, slika, cena) VALUES 
            ('$proizvodjac', '$model','$opis','$slika', '$cena')");
        }
        function update_sat($id, $proizvodjac, $model, $opis,$slika,$cena){
            $proizvodjac = $this->real_escape_string($proizvodjac);
            $model = $this->real_escape_string($model);
            $opis = $this->real_escape_string($opis);
            $slika = $this->real_escape_string($slika);
            $cena = $this->real_escape_string($cena);

            return $this->upit("UPDATE satovi 
            SET proizvodjac='$proizvodjac',model='$model', opis='$opis',slika='$slika',cena=$cena
            WHERE id=$id
        ");
        }
        function delete_sat($id){
            $id = $this->real_escape_string($id);
            return $this->upit("DELETE FROM satovi WHERE id=$id");
        }
    }

    $baza = new Baza();
    if(!$baza->connect()) die($baza->greska);
?>