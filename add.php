<?php

$login = $_GET['login'];
$password = $_GET['password'];

$to = $_GET['to'];


$on = file_exists("userspas/$login");

$password3 = file_get_contents("userspas/$login/password.txt");
    
$passwordto = md5($password);
$passwordto = md5($passwordto);

if ( $on == true ) {
    
    if ( $passwordto == $password3 ) {
        if( file_exists("users/$to") == true and file_exists("users/$to/$login" . "-" . "$to") == false and file_exists("users/$to/$to" . "-" . "$login") == false and file_exists("users/$login/$login" . "-" . "$to") == false and file_exists("users/$login/$to" . "-" . "$login") == false ) {
            if ( $to != $login ) {
                file_put_contents("users/$to/$login" . "-" . "$to", $to);
                file_put_contents("users/$login/$login" . "-" . "$to", $login);
            
                file_put_contents("chats/$login" . "-" . "$to", "$login создал переписку");
            }
        }
    } else {
        echo "ERROR";
    }
}

?>