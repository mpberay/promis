<?php

namespace App\Controllers\Libraries\Psgc;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    public function index()
    {
        $this->render('libraries/psgc/MainView');
    }
}
