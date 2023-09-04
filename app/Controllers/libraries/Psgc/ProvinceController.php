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
    public function getDatatable($regionCode){
        $param = [
            'regionCode' => $regionCode
        ];
        $builder = $this->provinceModel->getDatatable($param);
        // print_r($builder->get()->getResultArray());
        return DataTable::of($builder)
        ->addNumbering('no')
        //->hide('username')
        // ->setSearchableColumns(['username', 'hostname','firstname','lastname','date'])
        ->add('status', function($row){
            if($row->isActive == 0){
                $status = '<a class="ms-2" href="#" style="color:red" onclick="jsUpdateSectionStatus(\''.$row->provinceCode.'\',\''.$row->isActive.'\')">In Active</a>';
            }else{
                $status = '<a class="ms-2" href="#" style="color:green" onclick="jsUpdateSectionStatus(\''.$row->provinceCode.'\',\''.$row->isActive.'\')">Active</a>';
            }
            return $status;
        }, 'last')
        ->add('action', function($row){
            return '<a class="ms-2" href="#" style="color:blue" onclick="jsgitSectionInfo(\''.$row->provinceCode.'\')">Update</a>';
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
}
