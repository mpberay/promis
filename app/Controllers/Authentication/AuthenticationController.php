<?php

namespace App\Controllers\Authentication;

use  App\Controllers;
use CodeIgniter\Controller;
//use App\Controllers\BaseController;
// use CodeIgniter\HTTP\CLIRequest;
// use CodeIgniter\HTTP\IncomingRequest;
// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;
// use Psr\Log\LoggerInterface;

class AuthenticationController extends Controller
{
    private $facebook=NULL;
	private $fb_helper=NULL;
    function __construct(){
		require_once APPPATH. 'Libraries/vendor/autoload.php';
		$this->facebook =  new \Facebook\Facebook([
			'app_id'  => 'APP ID',
			'app_secret'  => 'APP SECRET KEY',
			'default_graph_version' => 'v2.3'
		]);
		$this->fb_helper = $this->facebook->getRedirectLoginHelper();
	}
    public function index($page = 'home')
    {
        // if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        //     // Whoops, we don't have a page for that!
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        // }
        
        echo view('Authentications/LoginView');
    }

}