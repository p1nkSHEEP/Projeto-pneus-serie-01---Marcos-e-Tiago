<?php
session_start();
if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST[''])){
    #com acesso

    function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    include_once("config.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
        
    //print_r('Email: ' . $email . "<br>");
    //print_r('Senha: ' . $senha. "<br>");

    $sql = "SELECT * FROM `cliente` WHERE username = '$username' AND password = '$password'";

    $result = $conexao->query($sql);

    //print_r($sql."<br>");
    //print_r($result);

    if (mysqli_num_rows($result) < 1){
    header('location: login.php');
    $login_status == false;
    }
    else{
    header('location: index.html');
    $login_status == true;
    }
}
else{
#sem acesso
    header('location: index2.html');
}
?>