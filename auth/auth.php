<?php
function isConnect():bool{
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['user']);
}

function redirection_to_login():void{
    if(!isConnect()){
        header(
            'Location: auth/login.php'
        );
    }
}
?>