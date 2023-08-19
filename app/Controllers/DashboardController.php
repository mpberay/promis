<?php

namespace App\Controllers;
use \App\Models\Authentications\AuthModel;

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
        $this->render('DashboardView', $data);

    }

}
