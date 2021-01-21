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
     body{
        background: url("../pozadina.jpg") no-repeat center/cover;
    }
</style>
<body>
<?php
   
    unset($_SESSION['user_id']);
    setcookie('user_id',' ', time() - (60*60*24) ); 

?>
    <form action="provera.php" method="POST">
       Unesi ime: <input type="text" name="name" placeholder="korisnicko ime">
       Unesi lozinku: <input type="text" name="password" placeholder="lozinka">
       <input type="checkbox" name="log_tip" />Ostani prijavljen.
       
        <input type="submit" value="ULOGUJ SE">
    </form>
</body>
</html>