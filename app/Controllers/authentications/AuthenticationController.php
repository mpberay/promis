<?php
namespace App\Controllers\authentications;
use  App\Controllers;
use  App\Libraries\Hash;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use \App\Models\Authentications\AuthModel;

class AuthenticationController extends Controller
{
    private $facebook = NULL;
	private $fb_helper = NULL;
    private $hostname = NULL;
    private $dateNow = NULL;
    private $ipAddress = NULL;
    public function __construct(){
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
                    }
                    else{
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
                            'user_id' => $userInfo[0]['id']
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
        $data_validated = $this->validate([
            'firstname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Firstname is required',
                ]
            ],
            'lastname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Lastname is required',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Your Email is required',
                    'valid_email' => 'Email address already exist'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[20]|matches[confirm_password]',
                'errors' => [
                    'required' => 'Your Password is required',
                    'min_length' => 'Password has minimum of five characters',
                    'max_length' => 'Password has maximum of five characters',
                    'matches' => 'Password did not match'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|min_length[5]|max_length[20]|matches[password]',
                'errors' => [
                    'required' => 'Your Cofirm Password is required',
                    'min_length' => 'Password has minimum of five characters',
                    'max_length' => 'Password has maximum of five characters',
                    'matches' => 'Password did not match'
                ]
            ],
        ]);

        if(!$data_validated){
            return view('authentications/SignupView',['validation' => $this->validator]);
        }

        $password = $this->request->getPost('password');
        //$user_id = date('m-d-Y').'-'.uniqid();
        $data = [
            'id' => uniqid(),
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'password_hash' => Hash::encrypt($password),
        ];

        
        $query = $auth_model->insert($data);
        if(!$query){
            return redirect()->back()->with('failed', 'Server error');
        }else{
            return redirect()->back()->with('success', 'Successfully Register');
        }

    }

}