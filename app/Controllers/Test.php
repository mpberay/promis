<?php

namespace App\Controllers;
use App\Libraries\Auth;
class Test extends BaseController{
    public function check(){
        $password = $this->request->getPost('password');
        //echo Auth::HashPassword($password);
        echo password_hash($password, PASSWORD_BCRYPT);
    }
    public function sample1(){
        $a = 1;
        $b = 2;
        $this->sample($a,$b);
    }
}
