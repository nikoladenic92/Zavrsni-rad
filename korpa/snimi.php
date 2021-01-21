<?php
    require "Korpa.php";
    require "Baza_korpa.php";

    $uku = $korpa->ukupno();
    $baza->snimi($uku);
    echo "USPESNO";
    echo "<a href='../index.php'>VRATI SE NA PRODAVNICU</a>";

?>