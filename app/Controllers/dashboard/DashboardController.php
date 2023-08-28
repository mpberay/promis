<?php

namespace App\Controllers\dashboard;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        // if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        //     // Whoops, we don't have a page for that!
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        // }
        // $userModel = new AuthModel();
        // $user_id = session()->get('LoginUserInfo');
        // $userInfo = $userModel->find($user_id);

        //$data['user_info'] = $userInfo;
        $data['id_num'] = date('m-d-Y').'-'.uniqid();
        //$data['UserInfo'] = $this->sessionUserInfo;
        //print_r($this->sessionUserInfo);
        $this->render('DashboardView');

    }
    
}
