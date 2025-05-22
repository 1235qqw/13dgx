<?php

$login = $_GET['login'];
$password = $_GET['password'];
if ( $login != "") {
    $auth = $_GET['auth'];

    $on = file_exists("userspas/$login");

    if ( $on == false ) {
        $auth = 'reg';
    } else {
        $auth = 'log';
    }


    if ( $auth == "reg" ) {
        $password2 = md5($password);
        $password2 = md5($password2);
        mkdir("userspas/$login/");
        mkdir("users/$login/");
        file_put_contents("userspas/$login/password.txt", $password2);
        file_put_contents("users/$login/Global", $password2);
    
        echo("Вы зарегестрировались");
    } else {
        $password3 = file_get_contents("userspas/$login/password.txt");
    
        $passwordto = md5($password);
        $passwordto = md5($passwordto);
    
        if ( $passwordto == $password3) {
            echo("Зашол");
        } else {
            echo("пересмотри пароль");
        }
    }
}
?>