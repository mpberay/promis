<?php

namespace App\Controllers\Libraries\Office;

use App\Controllers\BaseController;
use \App\Models\Libraries\Office\SectionModel;
use \Hermawan\DataTables\DataTable;

use \App\Models\Libraries\Office\DivisionModel;
use \App\Models\Libraries\Office\HeadModel;
use \App\Models\Libraries\Office\DesignationModel;
class SectionController extends BaseController
{
    private $sectionModel = NULL;
    private $divisionModel = NULL;
    private $headModel = NULL;
    private $designationModel = NULL;

    public function __construct()
    {
        $this->sectionModel = new SectionModel();
        $this->divisionModel = new DivisionModel();
        $this->headModel = new HeadModel();
        $this->designationModel = new DesignationModel();
    }
    public function index()
    {
        //
    }
    public function actionInsertUpdate(){
        // $headID = $this->request->getPost('headID');
        $id = uniqid();
        $dataArray = [
            "secCode" => $this->request->getPost('secCode'),
            "secName" => $this->request->getPost('secName'),
            "secAcronym" => $this->request->getPost('secAcronym'),
            "divID" => $this->request->getPost('divID'),
            "headID" => $this->request->getPost('headID'),
            "desID" => $this->request->getPost('desID'),
            "isActive" => 1
        ];
        //print_r($dataArray);
        //condition to insert and update 
        if($this->request->getPost('secID') == ""){
            $paramModel = "sectionInsert";
            $msg = 'New section office successfully added';
            $secID = $id;
        }else{
            $paramModel = "sectionUpdate";
            $msg = 'This section office successfully updated';
            $secID = $this->request->getPost('secID');
        }
        //echo $msg;
        $action = $this->sectionModel->$paramModel($dataArray,$secID);
        // //condition json response to ajax
        if($action == 1){
            $response = [
                'status' => 'success',
                'msg' => $msg,  
                'success' => true,
                'divID' => $secID          
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
    public function getDatatable($secID){
        if($secID == 0){
            $param = NULL;
        }else{
            $param = [
                'secID' => $secID
            ];
        }
        $builder = $this->sectionModel->getDatatable($param);
        //print_r($builder->get()->getResultArray());
        //echo $headID;
        return DataTable::of($builder)
        ->addNumbering('no')
        //->hide('username')
        // ->setSearchableColumns(['username', 'hostname','firstname','lastname','date'])
        ->add('status', function($row){
            if($row->isActive == 0){
                $status = '<a class="ms-2" href="#" style="color:red" onclick="jsUpdateSectionStatus(\''.$row->secID.'\',\''.$row->isActive.'\')">In Active</a>';
            }else{
                $status = '<a class="ms-2" href="#" style="color:green" onclick="jsUpdateSectionStatus(\''.$row->secID.'\',\''.$row->isActive.'\')">Active</a>';
            }
            return $status;
        }, 'last')
        ->add('action', function($row){
            return '<a class="ms-2" href="#" style="color:blue" onclick="jsgitSectionInfo(\''.$row->secID.'\',\''.$row->divID.'\',\''.$row->headID.'\',\''.$row->desID.'\')">Update</a>';
        }, 'last')
            ->add('fullname', function($row){
                return ''.$row->firstname.' '.$row->middlename.' '.$row->lastname.' '.$row->extensionname.'';
            }, 'last')
        ->toJson(true);
    }
    public function actionStatus(){
        $secID = $this->request->getPost('secID');
        $status = $this->request->getPost('status');
        if($status == 1){
            $data = [
                'isActive' => 0
            ];
            $msg = 'Successfully Deactivated sec';
        }else{
            $data = [
                'isActive' => 1
            ];
            $msg = 'Successfully Activated sec';
        }
        $action = $this->sectionModel->sectionUpdate($data,$secID);
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
    public function getSectionInformation(){
        $data = [
            "secID" => $this->request->getGet("secID"),
            "divID" => $this->request->getGet("divID"),
            "headID" => $this->request->getGet("headID"),
            "desID" => $this->request->getGet("desID")
        ];
        
        $dataJson['section'] = $this->sectionModel->getDatatable(["secID" => $data['secID']])->get()->getResultArray();
        $dataJson['division'] = $this->divisionModel->getAllDivision(["divID !=" => $data['divID']])->get()->getResultArray();
        $dataJson['head'] = $this->headModel->getAllHead(["headID !=" => $data['headID']])->get()->getResultArray();
        $dataJson['designation'] = $this->designationModel->getAllDesignation(["desID !=" => $data['desID']])->get()->getResultArray();
        
        return $this->response->setJSON($dataJson);
        // print_r($data);
    }
}
