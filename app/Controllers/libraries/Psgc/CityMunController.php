<?php

namespace App\Controllers\Libraries\Psgc;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use \App\Models\Libraries\Psgc\CityMunModel;
use \App\Models\Libraries\Psgc\ProvinceModel;
class CityMunController extends BaseController
{
    private $citymunModel = NULL;
    private $provinceModel = NULL;
    public function __construct()
    {
        $this->citymunModel = new CityMunModel();
        $this->provinceModel = new ProvinceModel();
    }

    public function getCityMunDatatable(){
        $region_id = $this->request->getGet('region_id');
        $province_id = $this->request->getGet('province_id');
        $citymunID = $this->request->getGet('id');


        $builder = $this->citymunModel->getCityMunicipality($region_id,$province_id,$citymunID);
        //print_r($builder->get()->getResultArray());
        return DataTable::of($builder)
        ->addNumbering('no')
        ->add('status', function($row){
            if($row->isActive == 0){
                $status = '<a class="ms-2" href="#" style="color:red" onclick="jsUpdateCityMunStatus(\''.$row->citymunID.'\',\''.$row->isActive.'\')">In Active</a>';
            }else{
                $status = '<a class="ms-2" href="#" style="color:green" onclick="jsUpdateCityMunStatus(\''.$row->citymunID.'\',\''.$row->isActive.'\')">Active</a>';
            }
            return $status;
        }, 'last')
        ->add('action', function($row){
            return '<a class="ms-2" href="#" style="color:blue" onclick="jsGetCitymunInfo(\''.$row->regionID.'\',\''.$row->provinceID.'\',\''.$row->citymunID.'\')">Update</a>';
        }, 'last')
        ->toJson(true);
    }
    public function actionInsertUpdate(){
        $id = uniqid();
        $citymunID = $this->request->getPost('citymun_id');
        $cityCode = $this->request->getPost('citymuncode');
        $zipCode = $this->request->getPost('zip');
        
        //query checking existing 
        $checkCodeExist = $this->citymunModel->checkCodeExist($cityCode,$citymunID)->get()->getResultArray();
        $checkZipExist = $this->citymunModel->checkZipExist($zipCode,$citymunID)->get()->getResultArray();
        //print_r($checkCodeExist);
        if($checkCodeExist){
            $response = [
                'status' => 'error',
                'msg' => 'Already exist, Please enter the PSGC Code properly. . .',  
                'success' => false,   
                'title' => "City/Municipality PSGC Code",      
            ];
        }else if($checkZipExist){
            $response = [
                'status' => 'error',
                'msg' => 'Already exist, Please enter the Zip Code properly. . .',  
                'success' => false,   
                'title' => "City/Municipality Zip Code",      
            ];
        }else{
            $dataArray = [
                "citymunCode" => $this->request->getPost('citymuncode'),
                "citymunName" => $this->request->getPost('name'),
                "citymunAcronym" => $this->request->getPost('acronym'),
                "provinceID" => $this->request->getPost('getProvince'),
                "zipCode" => $zipCode,
                "isActive" => 1
            ];
            if($citymunID == ""){
                //condition insert
                $action = $this->citymunModel->citymunInsert($dataArray,$id);
                $response_id = $id;
                $response_title = "New City/Municipality";
                $response_msg =  "Successfully Added . . .";
            }else{
                //condition update
                $action = $this->citymunModel->citymunUpdate($dataArray,$citymunID);
                $response_id = $citymunID;
                $response_title = "Update City/Municipality";
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
        return $this->response->setJSON($response);
    }
    public function actionUpdateStatus(){
        $citymunID = $this->request->getPost('id');
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
        $action = $this->citymunModel->citymunUpdate($data,$citymunID);
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
        $data = [
            "regionID" => $this->request->getGet("region"),
            "provinceID" => $this->request->getGet("province"),
            "citymunID" => $this->request->getGet("citymun"),
        ];
        $dataJson['citymun'] = $this->citymunModel->getCityMunicipality($region_id=0,$province_id=0,$data['citymunID'])->get()->getResultArray();
        $dataJson['region'] = $this->provinceModel->getAllRegion(["regionID !=" => $data['regionID']])->get()->getResultArray();
        $dataJson['province'] = $this->citymunModel->getAllProvince(
            [
                "regionID =" => $data['regionID'],
                "provinceID !=" => $data['provinceID']
            ])->get()->getResultArray();
        return $this->response->setJSON($dataJson);

        //print_r($data);
    }
    public function getCitymun(){
        $province_id = $this->request->getGet("province_id");
        $dataJson['citymun'] = $this->citymunModel->getAllCityMun(["provinceID" => $province_id])->get()->getResultArray();
        return $this->response->setJSON($dataJson);
    }
}
