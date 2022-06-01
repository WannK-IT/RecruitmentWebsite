<?php 
class Authentication{
    public static function checkLogin(){
        if(!isset($_SESSION['login']['loginSuccess'])){
            URL::direct('admin', 'account', 'login');
        }
    }

    public static function checkLoginDefault(){
        $result = false;
        if(@$_SESSION['loginDefault']['loginSuccess'] == true)
        {
            $result = true;
        }
        return $result;
    }
}
?>