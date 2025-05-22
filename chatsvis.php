<?php

$login = $_GET['login'];
$password = $_GET['password'];

$on = file_exists("userspas/$login");

$password3 = file_get_contents("userspas/$login/password.txt");
    
$passwordto = md5($password);
$passwordto = md5($passwordto);

if ( $on == true ) {
    
    if ( $passwordto == $password3 ) {
    
        $i = 0;
    
        $dir = "users/$login/";
        $files1 = scandir($dir);
        $files2 = scandir($dir, 1);
    
        $ar = count($files2) - 3;
        
        if ( file_exists("users/$login") ) {
            while ($i <= $ar){
                echo $files2[$i] . "\n";
                $i++;
            }
        } else {
            mkdir("users/$login");
            file_put_contents("users/$login/Global", "1");
        }
    } else {
        echo "ERROR";
    }
} else {
    echo "";
}

?>