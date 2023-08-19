<?php

namespace App\Controllers\landingpage;

//use CodeIgniter\Controller;
use App\Controllers\BaseController;
// use CodeIgniter\HTTP\CLIRequest;
// use CodeIgniter\HTTP\IncomingRequest;
// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;
// use Psr\Log\LoggerInterface;

class HomeController extends BaseController
{
    public function index()
    {
        
       return view('landingpage/home');
    }
}