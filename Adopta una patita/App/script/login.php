<?php 
    session_start();

    $email = $_POST['txtEmail'];
    $pass = $_POST['txtPass'];

    if($email == 'refugio@ejemplo.com' && $pass == "refugio1"){
        $_SESSION['email'] = $email;

        header('Location: ../vistaAdmin.php');
    }else{

        $_SESSION['error'] = 1;
        header('Location: ../inicio_sesion.php');
    }

?>