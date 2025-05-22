<?php

$login = $_GET['login'];
$text = $_GET['text'];
$show = $_GET['show'];

$name = $_GET['name'];

$password = $_GET['password'];

$on = file_exists("userspas/$login");

$chat = file_get_contents("chats/$name");

$password3 = file_get_contents("userspas/$login/password.txt");
    
$passwordto = md5($password);
$passwordto = md5($passwordto);


if ( $on == true) {
    
    if ( $passwordto == $password3) {
        if ( $show != "sh" ) {
            if ($text != '' ) {
                $o = $chat . "\n" . $login . " : " . $text;
        
                file_put_contents("chats/$name", $o);
                echo $o;
            }
        } else {
            $o = $chat;
            echo $o;
        }
    } else {
        echo "ERROR";
    }
}
?>
