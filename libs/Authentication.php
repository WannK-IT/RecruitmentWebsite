<?php 
class Authentication{
    public static function checkLogin(){
        if(!isset($_SESSION['login']['loginSuccess'])){
            URL::direct('admin', 'account', 'login');
        }
    }
}
?>