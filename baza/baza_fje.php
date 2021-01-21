<?php
    require "Baza.php";

    $sta = $_REQUEST['sta'];

    if($sta === 'insert' || $sta === 'update'){
        $proizvodjac = $_POST['proizvodjac'];
        $model = $_POST['model'];
        $opis = $_POST['opis'];
        $slika = $_POST['slika'];
        $cena = $_POST['cena'];
       

    }
    if($sta === 'insert'){
        $b = $baza->insert_sat($proizvodjac, $model, $opis,$slika,$cena);
    }


    if($sta === 'update'){
        $id = $_POST['id'];
        $b = $baza->update_sat($id, $proizvodjac, $model, $opis,$slika,$cena);
    }

    if($sta === 'delete'){
        $id = $_GET['id'];
        $b = $baza-> delete_sat($id);
    }


    if($b === false){
        echo "Greska: ".$baza->greska;
    }else{
        if($sta == 'update')
        echo "Promenjeno: ". $baza->affected_rows();
        if($sta == 'delete')
            echo " Obrisano: ". $baza->affected_rows();
        if($sta == 'insert')
            echo " novi ID: ".$baza->insert_id();
        echo '<a href="index_baza.php">VRATI SE NA TABELU</a>';
        echo '<p><a href="../index.php">VRATI SE U PRODAVNICU</a></p>';
    }
?>