<?php

namespace App\Controllers\Internet;

//use CodeIgniter\Controller;
use App\Controllers\BaseController;
// use CodeIgniter\HTTP\CLIRequest;
// use CodeIgniter\HTTP\IncomingRequest;
// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;
// use Psr\Log\LoggerInterface;

class NewAccountController extends BaseController
{
    public function index()
    {
        
        $this->render('Internet/NewAccountView');
    }

}