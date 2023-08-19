<?php   
namespace App\Libraries;
class Auth{
    public static function HashPassword($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
}