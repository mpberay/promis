<?php

namespace App\Controllers\Libraries\Office;

use App\Controllers\BaseController;
use \App\Models\Libraries\Office\DesignationModel;
use \Hermawan\DataTables\DataTable;
class DesignationController extends BaseController
{
    private $designationModel = NULL;
    public function __construct()
    {
        $this->designationModel = new DesignationModel();
    }
    public function actionInsertUpdate(){
        // $headID = $this->request->getPost('headID');
        // $id = uniqid();
        $dataArray = [
            "desName" => $this->request->getPost('desName'),
            "desAcronym" => $this->request->getPost('desAcronym'),
            "isActive" => 1
        ];
        //condition to insert and update 
        if($this->request->getPost('desID') == ""){
            $paramModel = "designationInsert";
            $msg = 'New employee designation successfully added';
            $desID = uniqid();
        }else{
            $paramModel = "designationUpdate";
            $msg = 'Employee designation successfully updated';
            $desID = $this->request->getPost('desID');
        }
        $action = $this->designationModel->$paramModel($dataArray,$desID);
        //condition json response to ajax
        if($action == 1){
            $response = [
                'status' => 'success',
                'msg' => $msg,  
                'success' => true,
                'desID' => $desID          
            ];
        }else{
            $response = [
                'status' => 'error',
                'msg' => 'Sever error, Contact system administrator',  
                'success' => false,        
            ];
        }
        return $this->response->setJSON($response);
        //print_r($dataArray);
        //echo $action;
    }
    public function getDatatable($desID){
        if($desID == 0){
            $param = NULL;
        }else{
            $param = [
                'desID' => $desID
            ];
        }
        $builder = $this->designationModel->getDatatable($param);
        //print_r($builder->get()->getResultArray());
        //echo $headID;
        return DataTable::of($builder)
        ->addNumbering('no')
        //->hide('username')
        // ->setSearchableColumns(['username', 'hostname','firstname','lastname','date'])
        ->add('status', function($row){
            if($row->isActive == 0){
                $status = '<a class="ms-2" href="#" style="color:red" onclick="jsUpdateDesignationStatus(\''.$row->desID.'\',\''.$row->isActive.'\')">In Active</a>';
            }else{
                $status = '<a class="ms-2" href="#" style="color:green" onclick="jsUpdateDesignationStatus(\''.$row->desID.'\',\''.$row->isActive.'\')">Active</a>';
            }
            return $status;
        }, 'last')
        ->add('action', function($row){
            return '<a class="ms-2" href="#" style="color:blue" onclick="jsDesignationLoadInformation(\''.$row->desID.'\',\''.$row->desName.'\',\''.$row->desAcronym.'\')">Update</a>';
        }, 'last')
        ->toJson(true);
    }
    public function actionStatus(){
        $desID = $this->request->getPost('desID');
        $status = $this->request->getPost('status');
        if($status == 1){
            $data = [
                'isActive' => 0
            ];
            $msg = 'Successfully Deactivated asdasdasd';
        }else{
            $data = [
                'isActive' => 1
            ];
            $msg = 'Successfully Activated';
        }
        $action = $this->designationModel->designationUpdate($data,$desID);
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
    public function getAllDesignation(){
        $response = $this->designationModel->getAllDesignation(["isActive" => 1])->get()->getResultArray();
        //print_r($position->get()->getResultArray());
        return $this->response->setJSON($response);
    }
}   
