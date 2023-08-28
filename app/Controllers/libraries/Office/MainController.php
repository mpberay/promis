<?php

namespace App\Controllers\Libraries\Office;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    public function index()
    {
        //
    }
    public function officePage(){
        $this->render('libraries/offices/MainView');
    }
    public function divisionPage(){
        $this->render('libraries/offices/DivisionView');
    }
    public function sectionPage(){
        $this->render('libraries/offices/SectionsView');
    }
}
