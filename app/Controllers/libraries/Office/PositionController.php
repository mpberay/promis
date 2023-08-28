<?php

namespace App\Controllers\Libraries\Office;

use App\Controllers\BaseController;
use \App\Models\Libraries\Office\PositionModel;
use CodeIgniter\I18n\Time;
use \Hermawan\DataTables\DataTable;
class PositionController extends BaseController
{
    private $positionModel = NULL;
    //private $dateNow = NULL;
    public function __construct()
    {
        $this->positionModel = new PositionModel();
        //$this->dateNow = date('Y-m-d H:i:s', now());
    }
    public function index()
    {
        //
    }
    public function loadPosition($postID){
        // echo $postID;
        //echo 'asdasd';
        $builder = $this->positionModel->loadPosition($postID);
        //print_r($builder);
        return DataTable::of($builder)
            ->addNumbering('no')
            //->hide('username')
            // ->setSearchableColumns(['username', 'hostname','firstname','lastname','date'])
            ->add('status', function($row){
                if($row->isActive == 0){
                    $status = '<a class="ms-2" href="#" style="color:red" onclick="jsIsActive(\''.$row->posID.'\',\''.$row->isActive.'\')">In Active</a>';
                }else{
                    $status = '<a class="ms-2" href="#" style="color:green" onclick="jsIsActive(\''.$row->posID.'\',\''.$row->isActive.'\')">Active</a>';
                }
                return $status;
            }, 'last')
            ->add('action', function($row){
                return '<a class="ms-2" href="#" style="color:blue" onclick="jsUpdate(\''.$row->posID.'\',\''.$row->isActive.'\',\''.$row->posName.'\',\''.$row->posAcronym.'\')">Update</a>';
            }, 'last')
            ->toJson(true);
    }
    public function actionInsert(){
        $id = uniqid();
        $posID = $this->request->getPost('posID');
        if($posID == ""){
            $dataInsert = [
                "posID" => $id,
                "posName" => $this->request->getPost('posName'),//$this->request->getPost('username'),
                'posAcronym' => $this->request->getPost('posAcronym'), //$this->request->getPost('username'),
                'dateAdded' => date('Y-m-d H:i:s'),
                'isActive' => 1
            ];
            $action = $this->positionModel->insertPosition($dataInsert);
        }else{
            $dataUpdate = [
                "posName" => $this->request->getPost('posName'),//$this->request->getPost('username'),
                'posAcronym' => $this->request->getPost('posAcronym'), //$this->request->getPost('username'),
                'isActive' => 1
            ];
            $action = $this->positionModel->statusPosition($dataUpdate,$posID);
        }
        // $action = $this->positionModel->insertPosition($data);
        //echo $action;
        if($action == 0){ //insert 
            $response = [
                'status' => 'success',
                'msg' => 'Successfully save',  
                'success' => true,
                'posID' => $id          
            ];
        }else if($action == 1){ //update 
            $response = [
                'status' => 'success',
                'msg' => 'Successfully update',  
                'success' => true,
                'posID' => $posID          
            ];
        }else{
            $response = [
                'status' => 'error',
                'msg' => 'Sever error. contact system administrator',  
                'success' => false,
                'posID' => 0                           
            ];
        }
        return $this->response->setJSON($response);
    }
    public function actionStatus(){
        $posID = $this->request->getPost('posID');
        $isActive = $this->request->getPost('isActive');
        if($isActive == 1){
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
        
        $action = $this->positionModel->statusPosition($data,$posID);
        // echo $action;
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
    
}
