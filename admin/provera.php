<?php
    session_start();
    $u = $_POST['name'];
    $p = $_POST['password'];
    

    $conn = new mysqli('localhost', 'root', '', 'projekat_webshop');
    
    if ($conn->connect_error)
        echo 'JOK connect: '. $conn->connect_error;

    $podaci = $conn->query("SELECT * FROM `user` WHERE `name`='$u' AND `password`='$p'");
   
    
    if(mysqli_num_rows($podaci) == 0){
        echo "Pogresan user i/ili pass";
    }else{
        echo "Uspesno ste logovani <a href='tabela.php'>TABELA</a>";
        $p = $podaci->fetch_all(MYSQLI_ASSOC);
        $id = $p[0]['id'];
        if(isset($_POST['log_tip']))
            setcookie('user_id', $id, time()+(60*60*24*30));
        else    
            $_SESSION['user_id'] = $id;
    }
?>