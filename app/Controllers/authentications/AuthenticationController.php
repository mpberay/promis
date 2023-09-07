<?php
namespace App\Controllers\authentications;
use  App\Controllers;
use  App\Libraries\Hash;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use \App\Models\Authentications\AuthModel;

use App\Libraries\AuthLdap;
class AuthenticationController extends Controller
{
    private $facebook = NULL;
	private $fb_helper = NULL;
    private $hostname = NULL;
    private $dateNow = NULL;
    private $ipAddress = NULL;
    private $authModel = NULL;

    private $authLdap;
    private $session;

    public function __construct(){
        $this->session = \Config\Services::session();
        helper('date');
		require_once APPPATH. 'Libraries/vendor/autoload.php';
		$this->facebook =  new \Facebook\Facebook([
			'app_id'  => 'APP ID',
			'app_secret'  => 'APP SECRET KEY',
			'default_graph_version' => 'v2.3'
		]);
		$this->fb_helper = $this->facebook->getRedirectLoginHelper();

        //libraries
        helper(['url','form']);
        $this->hostname = gethostname();
        $this->dateNow = date('Y-m-d H:i:s', now());
        $request = service('request');
        $this->ipAddress = $request->getIPAddress();
        $this->authModel = new AuthModel();
	}

    public function ldap(){
        $username = "riemann";
        $password = "password";
        $this->authLdap = new AuthLdap();
        if (is_object($this->authLdap) && method_exists($this->authLdap, 'authenticate')){
            $authenticatedUserData  =   $this->authLdap->authenticate(trim($username),trim($password));
            if (!empty($authenticatedUserData)){
                $this->session->set($authenticatedUserData);
                echo "success login";
                //return redirect()->to('/user/dashboard');
            }
            else {
                echo "error username";
            }
        }
        else {
            echo "LDAP connection error";
        }
	}
    
    public function index(){
        $authModel = new AuthModel();
        // if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        //     // Whoops, we don't have a page for that!
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        // }
        if(!session()->get('LoginUserInfo')){
            return view('Authentications/LoginView');
        }else{
            return redirect()->to(base_url('/dashboard'));
        }  
        // $authModel = new AuthModel();
        // //$authModel->setTable('auth_user');
        // //$userInfo = $authModel->getLogin(['username' => 'asd']);
        // //echo $userInfo[0]['password_hash'];
        // //print_r($userInfo);

        // $sessionData = [
        //     'id' => uniqid(),
        //     'username' => "asdasdasasd"
        // ];
        // //$authModel->setTable('tbl_user_session');
        // $authModel->insertSession($sessionData);
        // $request = service('request');
        // $ipAddress = $request->getIPAddress();

        // echo "IP Address: $ipAddress";
    }
    public function RegisterView(){
        if(!session()->get('LoginUserInfo')){
            return view('authentications/SignupView');
        }else{
            return redirect()->to(base_url('/dashboard'));
        }
        
    }
    //ISSSO
    public function IsssoView(){
        return view('Authentications/IsssoView');
    }
   

    public function LoginUser(){
        $authModelLogin = new AuthModel();
        $data_validated = $this->validate([
            'password' => [
                'rules' => 'required|min_length[5]|max_length[20]',
            ],
        ]);
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $secret='6Leo8AkjAAAAAGgJmjBzXJTjkMa_0_nm3_AOjxyM';
       
        $credential = array(
            'secret' => $secret,
            'response' => $this->request->getVar('g-recaptcha-response')
        );
 
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        $status= json_decode($response, true);

        if($status['success']){ 
            if(!$data_validated){
                $response = [
                    'success' => false ,
                    'msg' => "Password has minimum of five characters and maximum of 20 characters, ",
                ];
            }else{
                //$authModel->setTable('auth_user');
                $userInfo = $authModelLogin->getLogin(['username' => $username]);
                if($userInfo) {
                    //print_r($userInfo);
                    $checkpassword = Hash::check($password,$userInfo[0]['password_hash']);
                    if(!$checkpassword){
                        $response = [
                            'success' => false ,
                            'msg' => "Incorrect Password",
                        ];
                    }else if($userInfo[0]['is_active'] == 0){
                        $response = [
                            'success' => false ,
                            'msg' => "Useraccount is not active, Contact system administrator to activate you account",
                        ];
                    }else{
                        $sessionData = [
                            'id' => uniqid(),
                            'user_id' => $userInfo[0]['id'],
                            'ip_address' => $this->ipAddress,
                            'hostname' => $this->hostname,
                            'date' => $this->dateNow,
                            'activity' => 'Login'
                        ];
                        //$authModel->setTable('tbl_user_session');
                        $authModelSession = new AuthModel();
                        $authModelSession->insertSession($sessionData);
                        session()->set('LoginUserInfo',[
                            'user_id' => $userInfo[0]['id'],
                            'username' => $userInfo[0]['username']
                        ]);
                        $response = [
                            'success' => true ,
                            'msg' => "Welcome ",
                        ];
                    }
                }else{
                    $response = [
                        'success' => false ,
                        'msg' => "Username not Exist ",
                    ];
                }
                
            }
        }else{
            $response = [
                'success' => false ,
                'msg' => "Lato2x Ka!",
            ];
        }
        //print_r($response);
        return $this->response->setJSON($response);
    }
    public function LogoutUser($userId){
        echo $userId;
        if(session()->has('LoginUserInfo')){
            session()->remove('LoginUserInfo');
        }
        $sessionData = [
            'id' => uniqid(),
            'user_id' => $userId,
            'ip_address' => $this->ipAddress,
            'hostname' => $this->hostname,
            'date' => $this->dateNow,
            'activity' => 'Logout'
        ];
        //$authModel->setTable('tbl_user_session');
        $authModelSession = new AuthModel();
        $authModelSession->insertSession($sessionData);
        return redirect()->to(base_url('/?access=loggedout'))->with('failed','Logout ka');
    }

    public function RegisterUser(){
        $emp_id = $this->request->getPost('employee_id');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $checkEmail = $this->authModel->getLogin(['email' => $email]);
        $checkUsername = $this->authModel->getLogin(['username' => $username]);
        $checkEmployeeId = $this->authModel->getLogin(['employee_id' => $emp_id]);
        $password = Hash::encrypt($this->request->getPost('password'),PASSWORD_DEFAULT);
        //print_r($username);
        if($checkEmployeeId ){
            $response = [
                'success' => false ,
                'msg' => "Employeed ID already exist ",
            ];
        }else if($checkEmail){
            $response = [
                'success' => false ,
                'msg' => "Email Address already exist ",
            ];
        }else if($checkUsername){
            $response = [
                'success' => false ,
                'msg' => "Username  already exist ",
            ];
        }else{
            $data = [
                'id' => uniqid(),
                'employee_id' => $this->request->getPost('employee_id'),
                'firstname' => $this->request->getPost('firstname'),
                'middlename' => $this->request->getPost('middlename'),
                'lastname' => $this->request->getPost('lastname'),
                'extensionname' => $this->request->getPost('extname'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password_hash' => $password,
                'date_register' => $this->dateNow,
                'is_active' => 0
            ];
            $insertNewAccount = $this->authModel->insertNewAccount($data);
            if($insertNewAccount == 0){
                $response = [
                    'success' => true ,
                    'msg' => "Successfully register please contact admin for activation",
                ];
            }else{
                $response = [
                    'success' => false ,
                    'msg' => "Server down contact serve administrator",
                ];
            }
        }
        // print_r($data);
        return $this->response->setJSON($response);
        //echo $insertNewAccount;
    }

}