<?php

namespace App\Controllers\users;
use App\Controllers\BaseController;

use \Hermawan\DataTables\DataTable;
use \App\Models\Users\UsersModel;

class UsersController extends BaseController
{
    private $userModel = NULL;
    //private $sessionUserInfo = NULL;
    public function __construct()
    {
        $this->userModel = new UsersModel();
    }
    public function index()
    {
       $this->render('users/UsersSessionView');

    }
    
    public function userListPage(){
        $data['sample'] = 'test';
        $this->render('users/UsersListView',$data);
        //$this->render('DashboardView');
    }

    
    public function userLogsPage(){
        $data['sample'] = 'test';
        $this->render('users/UsersLogsView',$data);
        //print_r($this->userModel->getUsers());
        // $query = $this->userModel->getUsers();
        // print_r($query);
        
    }
    public function loadLogs(){
        $builder = $this->userModel->getUserLogs();

        //print_r($builder);
        return DataTable::of($builder)
            ->addNumbering('no')
            //->hide('username')
            ->setSearchableColumns(['username', 'hostname','firstname','lastname','date'])
            ->add('action', function($row){
                return '<a class="btn btn-success btn-square btn-xs btn-outline" href="#" data-bs-original-title="" title="" onclick="alert(\'edit customer: '.$row->username.'\')><span class="fa fa-edit">Update</span></a>';
            }, 'last')
            ->toJson(true);
    }
    public function loadList(){
        $builder = $this->userModel->getUsers();

        // print_r($builder);
        return DataTable::of($builder)
            ->addNumbering('no')
            //->hide('username')
            //->setSearchableColumns(['username', 'hostname','firstname','lastname','date'])
            ->add('status', function($row){
                if($row->is_active == 0){
                    $status = '<a class="ms-2" href="#" style="color:red">In Active</a>';
                }else{
                    $status = '<a class="ms-2" href="#" style="color:green">Active</a>';
                }
                return $status;
            }, 'last')
            ->toJson(true);
    }
}
