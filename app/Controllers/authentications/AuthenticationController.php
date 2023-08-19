<?php

namespace App\Controllers\authentications;

use  App\Controllers;
use  App\Libraries\Hash;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use \App\Models\Authentications\AuthModel;
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

    public function __construct(){
		require_once APPPATH. 'Libraries/vendor/autoload.php';
		$this->facebook =  new \Facebook\Facebook([
			'app_id'  => 'APP ID',
			'app_secret'  => 'APP SECRET KEY',
			'default_graph_version' => 'v2.3'
		]);
		$this->fb_helper = $this->facebook->getRedirectLoginHelper();

        helper(['url','form']);
	}
    public function index()
    {
        // if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        //     // Whoops, we don't have a page for that!
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        // }
        if(!session()->get('LoginUserInfo')){
            return view('Authentications/LoginView');
        }else{
            return redirect()->to(base_url('/dashboard'));
        }
        
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
    public function IsssoLogin(){
        $issso_data = $this->request->getVar('user_info');
        $emp_id = $issso_data['employeeid'];

        $LoginModel = new AuthModel();
        //check is exist
        $userInfo = $LoginModel->where('employee_id',$emp_id)->first();

        if($userInfo){
            
            $status = "1";
        }else{  
            $id = $issso_data['employeeid'].'-'. uniqid();
            $userinfo_data = [
                'id' => $id,
                'employee_id' => $issso_data['employeeid'],
                'username' => $issso_data['preferred_username'],
                'password_hash' =>Hash::encrypt($issso_data['employeeid']),
                'firstname' => $issso_data['given_name'],
                'lastname' => $issso_data['family_name'],
                'email' => $issso_data['email'],
            ];
            $query = $LoginModel->insert($userinfo_data);
            $status = "2";
        }

        session()->set('LoginUserInfo',$emp_id);
        $output = array(
            "status" => $status,
        );

        echo json_encode($output);
    }




    public function LoginUser(){
        $data_validated = $this->validate([
            'password' => [
                'rules' => 'required|min_length[5]|max_length[20]',
                // 'errors' => [
                //     'required' => 'Your Password is required',
                //     'min_length' => 'Password has minimum of five characters',
                //     'max_length' => 'Password has maximum of five characters'
                // ]
            ],
        ]);
        
        $email = $this->request->getPost('email');
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
                $LoginModel = new AuthModel();
                $userInfo = $LoginModel->where('email',$email)->first();
    
                if($userInfo) {
                    //print_r($userInfo);
                    $checkpassword = Hash::check($password,$userInfo['password_hash']);
    
                    if(!$checkpassword){
                        $response = [
                            'success' => false ,
                            'msg' => "Incorrect Password",
                        ];
                    }
                    else{
                        $user_id = $userInfo['id'];
                        session()->set('LoginUserInfo',$user_id);
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
            //return redirect()->to(base_url('/'));
        }
        return $this->response->setJSON($response);
    }
    public function LogoutUser(){
        if(session()->has('LoginUserInfo')){
            session()->remove('LoginUserInfo');
        }
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
        $user_id = date('m-d-Y').'-'.uniqid();
        $data = [
            'id' => $user_id,
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'password_hash' => Hash::encrypt($password),
        ];

        $auth_model = new \App\Models\Authentications\AuthModel();
        $query = $auth_model->insert($data);
        if(!$query){
            return redirect()->back()->with('failed', 'Server error');
        }else{
            return redirect()->back()->with('success', 'Successfully Register');
        }

    }

}