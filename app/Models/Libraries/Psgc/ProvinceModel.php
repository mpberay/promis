<?php

namespace App\Models\Libraries\Psgc;

use CodeIgniter\Model;

class ProvinceModel extends Model
{
    public function provinceInsert($data,$provinceID){
        $query = $this->db
            ->table('lib_psgc_provinces')
            ->set('provinceID',$provinceID)
            ->set($data)
            ->set("dateAdded", date('Y-m-d H:i:s'))
            ->insert();
        return $query;
    }
    public function provinceUpdate($data,$id){
        $query = $this->db
            ->table('lib_psgc_provinces')
            ->where('provinceID',$id)
            ->update($data);
        return $query;
    }
    public function getDatatable($regionID,$id){
        $query = $this->db
            ->table('lib_psgc_provinces AS province')
            ->select('
                province.provinceID,
                province.provinceCode,
                province.provinceName,
                province.provinceAcronym,
                province.regionID,
                province.dateAdded,
                province.isActive,
                region.regionName
            ')
            ->join('lib_psgc_region AS region','region.regionID = province.regionID','left');
            //condition if exist
            if ($regionID == "" && $id != "") {
                $query->where('province.provinceID',$id);
            }
            //condition to laod per region filtiring 
            if($regionID != "" && $id == ""){
                $query->where('province.regionID',$regionID);
            }
            $query
                ->orderBy('region.regionName','ASC')
                ->orderBy('province.provinceName','ASC');
        return $query;//->get()->getResultArray();
    }
    public function checkProvinceExist($provinceCode,$provID){
        $query = $this->db
            ->table('lib_psgc_provinces');
            if($provID == ""){
                $query->where('provinceCode' ,$provinceCode);
            }else{
                $conditions = [
                    'provinceID !=' => $provID,
                    'provinceCode' => $provinceCode,
                ];
                $query->where($conditions);
            }
            
        return $query;
    }
    public function getAllRegion(){
        $query = $this->db
            ->table('lib_psgc_region');
            $query->where('isActive',1);
            $query->orderBy('regionName','ASC');
        return $query;
    }
    public function getAllProvince($conditions = []){
        $query = $this->db
            ->table('lib_psgc_provinces');
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->where('isActive',1);
            $query->orderBy('provinceName','ASC');
        return $query;
    }
}
