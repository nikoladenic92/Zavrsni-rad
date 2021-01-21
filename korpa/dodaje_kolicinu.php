<?php
require "Korpa.php";
require "Baza_korpa.php";

$id=$_GET['id'];
$korpa-> dodaj_kolicinu($id, 1);
header('Location: prikazi_korpu.php');
?>