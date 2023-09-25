<?php

namespace App\Controllers\Libraries\Psgc;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use \App\Models\Libraries\Psgc\ProvinceModel;
class ProvinceController extends BaseController
{
    private $provinceModel = NULL;

    public  function __construct()
    {
        $this->provinceModel = new ProvinceModel();
    }
    public function index()
    {
        //
    }
    public function actionInsertUpdate(){
        $id = uniqid();
        $provID = $this->request->getPost('provId');
        $provCode = $this->request->getPost('code');
        $checkCodeExist = $this->provinceModel->checkProvinceExist($provCode,$provID)->get()->getResultArray();
        //print_r($checkCodeExist);
        if($checkCodeExist){
            $response = [
                'status' => 'error',
                'msg' => 'Already exist, Please enter the PSGC Code properly. . .',  
                'success' => false,   
                'title' => "Province PSGC Code",      
            ];
        }else{
            $dataArray = [
                "provinceCode" => $provCode,
                "provinceName" => $this->request->getPost('name'),
                "provinceAcronym" => $this->request->getPost('acronym'),
                "regionID" => $this->request->getPost('getRegion'),
                "isActive" => 1
            ];
            if($provID == ""){
                //condition insert
                $action = $this->provinceModel->provinceInsert($dataArray,$id);
                $response_id = $id;
                $response_title = "Add new province";
                $response_msg =  "Successfully Added . . .";
            }else{
                //condition update
                $action = $this->provinceModel->provinceUpdate($dataArray,$provID);
                $response_id = $provID;
                $response_title = "Update province";
                $response_msg =  "Successfully updated . . .";
            }
            
            if($action == 1){
                $response = [
                    'success' => true, 
                    'status' => 'success',
                    'msg' => $response_msg,    
                    'title' => $response_title,     
                    "id" => $response_id, 
                ];
            }else{
                $response = [
                    'success' => false,   
                    'status' => 'error',
                    'msg' => 'Please contact system admnistrator. . .', 
                    'title' => "Server Error",      
                ];
            }
        }   
        //$action = $this->provinceModel->provinceInsert($dataArray,$id);
        //echo $action;
        //print_r($checkCodeExist);
        return $this->response->setJSON($response);
    }
    public function getProvinceDatatable(){   
        $regionID = $this->request->getGet('region');
        $id = $this->request->getGet('id');

        $builder = $this->provinceModel->getDatatable($regionID,$id);
        //print_r($builder->get()->getResultArray());
        return DataTable::of($builder)
        ->addNumbering('no')
        //->hide('username')
        // ->setSearchableColumns(['username', 'hostname','firstname','lastname','date'])
        ->add('status', function($row){
            if($row->isActive == 0){
                $status = '<a class="ms-2" href="#" style="color:red" onclick="jsProvinceStatus(\''.$row->provinceID.'\',\''.$row->isActive.'\')">In Active</a>';
            }else{
                $status = '<a class="ms-2" href="#" style="color:green" onclick="jsProvinceStatus(\''.$row->provinceID.'\',\''.$row->isActive.'\')">Active</a>';
            }
            return $status;
        }, 'last')
        ->add('action', function($row){
            return '<a class="ms-2" href="#" style="color:blue" onclick="jsGitProvinceInfo(\''.$row->provinceID.'\',\''.$row->regionID.'\')">Update</a>';
        }, 'last')
        // ->add('fullname', function($row){
        //     return ''.$row->firstname.' '.$row->middlename.' '.$row->lastname.' '.$row->extensionname.'';
        // }, 'last')
        ->toJson(true);
    }
    public function getRegion(){
        $response = $this->provinceModel->getAllRegion()->get()->getResultArray();
        return $this->response->setJSON($response);
    }
    public function status(){
        $provinceID = $this->request->getPost('id');
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
        $action = $this->provinceModel->provinceUpdate($data,$provinceID);
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
    public function getInformation(){
        $region_id = "";
        $data = [
            "prov_id" => $this->request->getGet("prov_id"),
            "region_id" => $this->request->getGet("region_id"),
        ];
        $dataJson['province'] = $this->provinceModel->getDatatable($region_id, $data['prov_id'])->get()->getResultArray();
        $dataJson['region'] = $this->provinceModel->getAllRegion(["regionID !=" => $data['region_id']])->get()->getResultArray();
        return $this->response->setJSON($dataJson);
    }
    public function getProvince(){
        $region_id = $this->request->getGet("region_id");
        $dataJson['province'] = $this->provinceModel->getAllProvince(["regionID" => $region_id])->get()->getResultArray();
        return $this->response->setJSON($dataJson);
    }
}
