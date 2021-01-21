<?php
require "Korpa.php";
require "Baza_korpa.php";

$id=$_GET['id'];
$korpa->  obrisi_proizvod($id);
header('Location: prikazi_korpu.php');
?>