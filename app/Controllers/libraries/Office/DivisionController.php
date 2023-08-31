<?php

namespace App\Controllers\Libraries\Office;

use App\Controllers\BaseController;
use \App\Models\Libraries\Office\DivisionModel;
use \Hermawan\DataTables\DataTable;
class DivisionController extends BaseController
{
    private $divisionModel = NULL;
    public function __construct()
    {
        $this->divisionModel = new DivisionModel();
    }
    public function index()
    {
        //
    }
    public function actionInsertUpdate(){
        // $headID = $this->request->getPost('headID');
        $id = uniqid();
        $dataArray = [
            "divCode" => $this->request->getPost('divCode'),
            "divName" => $this->request->getPost('divName'),
            "divAcronym" => $this->request->getPost('divAcronym'),
            "headID" => $this->request->getPost('headID'),
            "desID" => $this->request->getPost('desID'),
            "isActive" => 1
        ];
        //condition to insert and update 
        if($this->request->getPost('divID') == ""){
            $paramModel = "divisionInsert";
            $msg = 'New division office successfully added';
            $divID = uniqid();
        }else{
            $paramModel = "divisionUpdate";
            $msg = 'Division office successfully updated';
            $divID = $this->request->getPost('divID');
        }
        $action = $this->divisionModel->$paramModel($dataArray,$divID);
        //condition json response to ajax
        if($action == 1){
            $response = [
                'status' => 'success',
                'msg' => $msg,  
                'success' => true,
                'desID' => $divID          
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
    public function getDatatable($divID){
        if($divID == 0){
            $param = NULL;
        }else{
            $param = [
                'divID' => $divID
            ];
        }
        $builder = $this->divisionModel->getDatatable($param);
        //print_r($builder->get()->getResultArray());
        //echo $headID;
        return DataTable::of($builder)
        ->addNumbering('no')
        //->hide('username')
        // ->setSearchableColumns(['username', 'hostname','firstname','lastname','date'])
        ->add('status', function($row){
            if($row->isActive == 0){
                $status = '<a class="ms-2" href="#" style="color:red" onclick="jsUpdateDivisionStatus(\''.$row->divID.'\',\''.$row->isActive.'\')">In Active</a>';
            }else{
                $status = '<a class="ms-2" href="#" style="color:green" onclick="jsUpdateDivisionStatus(\''.$row->divID.'\',\''.$row->isActive.'\')">Active</a>';
            }
            return $status;
        }, 'last')
        ->add('action', function($row){
            return '<a class="ms-2" href="#" style="color:blue" onclick="jsgitDivisionInfo(\''.$row->divID.'\')">Update</a>';
        }, 'last')
            ->add('fullname', function($row){
                return ''.$row->firstname.' '.$row->middlename.' '.$row->lastname.' '.$row->extensionname.'';
            }, 'last')
        ->toJson(true);
    }
    public function actionStatus(){
        $divID = $this->request->getPost('divID');
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
        $action = $this->divisionModel->divisionUpdate($data,$divID);
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
    public function getDivisionInformation($divID){
        $response = $this->divisionModel->getDatatable(["divID" => $divID])->get()->getResultArray();
        //print_r($position->get()->getResultArray());
        return $this->response->setJSON($response);
    }
}
