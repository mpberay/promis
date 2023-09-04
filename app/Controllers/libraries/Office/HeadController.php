<?php

namespace App\Controllers\Libraries\Office;

use App\Controllers\BaseController;
use \App\Models\Libraries\Office\HeadModel;
use \Hermawan\DataTables\DataTable;
class HeadController extends BaseController
{
    private $headModel = NULL;
    public function __construct()
    {
        $this->headModel = new HeadModel();
        //$this->dateNow = date('Y-m-d H:i:s', now());
    }
    public function index()
    {
        //
    }
    public function getHead($headID){
        $param = [
            'headID' => $headID
        ];
        $response = $builder = $this->headModel->getHeadDatatable($param)->get()->getResultArray();
        //print_r($position->get()->getResultArray());
        return $this->response->setJSON($response);
    }
    public function actionInsertUpdate(){
        // $headID = $this->request->getPost('headID');
        // $id = uniqid();
        $dataArray = [
            "firstname" => $this->request->getPost('firstname'),
            "middlename" => $this->request->getPost('middlename'),
            "lastname" => $this->request->getPost('lastname'),
            "extensionname" => $this->request->getPost('extensionname'),
            "sex" => $this->request->getPost('radioSex'),
            "posID" => $this->request->getPost('getPosition'),
            //"dateAdded" => date('Y-m-d H:i:s'),
            "isActive" => 1
        ];
        //condition to insert and update 
        if($this->request->getPost('headID') == ""){
            $paramModel = "headInsert";
            $msg = 'New office head successfully added';
            $headID = uniqid();
        }else{
            $paramModel = "headUpdate";
            $msg = 'Office head successfully updated';
            $headID = $this->request->getPost('headID');
        }
        $action = $this->headModel->$paramModel($dataArray,$headID);
        //condition json response to ajax
        if($action == 1){
            $response = [
                'status' => 'success',
                'msg' => $msg,  
                'success' => true,
                'headID' => $headID          
            ];
        }else{
            $response = [
                'status' => 'error',
                'msg' => 'Sever error, Contact system administrator',  
                'success' => false,        
            ];
        }
        return $this->response->setJSON($response);
        // print_r($data);
        //echo $action;
    }
    public function getHeadDatatable($headID){
        if($headID == 0){
            $param = NULL;
        }else{
            $param = [
                'headID' => $headID
            ];
        }
        $builder = $this->headModel->getHeadDatatable($param);
        //print_r($builder->get()->getResultArray());
        //echo $headID;
        return DataTable::of($builder)
        ->addNumbering('no')
        //->hide('username')
        // ->setSearchableColumns(['username', 'hostname','firstname','lastname','date'])
        ->add('status', function($row){
            if($row->isActive == 0){
                $status = '<a class="ms-2" href="#" style="color:red" onclick="jsUpdateHeadStatus(\''.$row->headID.'\',\''.$row->isActive.'\')">In Active</a>';
            }else{
                $status = '<a class="ms-2" href="#" style="color:green" onclick="jsUpdateHeadStatus(\''.$row->headID.'\',\''.$row->isActive.'\')">Active</a>';
            }
            return $status;
        }, 'last')
        ->add('action', function($row){
            return '<a class="ms-2" href="#" style="color:blue" onclick="jsUpdateHeadInformation(\''.$row->headID.'\')">Update</a>';
        }, 'last')
        ->toJson(true);
    }
    public function actionStatus(){
        $headID = $this->request->getPost('headID');
        $status = $this->request->getPost('status');
        if($status == 1){
            $data = [
                'isActive' => 0
            ];
            $msg = 'Successfully Deactivated';
        }else{
            $data = [
                'isActive' => 1
            ];
            $msg = 'Successfully Activated';
        }
        $action = $this->headModel->headStatus($data,$headID);
        //echo $action;
        if($action == 1){
            $response = [
                'status' => 'success',
                'msg' =>  $msg,  
                'success' => true              
            ];
        }else{
            $response = [
                'status' => 'error',
                'msg' => 'Sever error. contact system administrator',  
                'success' => false              
            ];
        }
        return $this->response->setJSON($response);
    }
    public function getAllHead(){
        $response = $this->headModel->getAllHead()->get()->getResultArray();
        //print_r($position->get()->getResultArray());
        return $this->response->setJSON($response);
    }
}
