<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index($page = 'home')
    {
        // if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        //     // Whoops, we don't have a page for that!
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        // }

        //return view('include/header'). view('pages/' . $page). view('include/footer');
        //$this->render('pages/home');
        echo "asdasd";
        
    }

}
