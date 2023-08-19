<?php 

    namespace App\Libraries;
    class Hash
    {
        public static function encrypt($password){
            return password_hash($password, PASSWORD_BCRYPT);
        }
        public static function check($password, $dbpassword){
            if(password_verify($password,$dbpassword)){
                return true;
            }
            return false;
        }
    }
?>