<?php 
    session_start();

    $usuario = $_POST['txtEmail'];
    $pass = $_POST['txtPass'];

    if($email == 'refugio@ejemplo.com' && $pass == "refugio"){
        $_SESSION['email'] = $email;

        header('Location: ../vistaAdmin.php');
    }else{
        $_SESSION['error'] = 1;
    }

?>