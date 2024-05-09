<?php 
function isConnect():bool{
    if(session_status() === PHP_SESSION_NONE){
        session_start();
        $_SESSION['user']=1;
    }
    return !empty($_SESSION['user']);
}

function redirect_to_login():void{
    if(!isConnect()){
        header('Location: /login.php');
        exit();
    }
}