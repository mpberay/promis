<?php

namespace App\Models\Libraries\Psgc;

use CodeIgniter\Model;

class CityMunModel extends Model
{
    public function getCityMunicipality($region_id,$province_id,$citymunID){
        $query = $this->db
                ->table('lib_psgc_citymun AS citymun')
                ->select('
                    citymun.citymunID,
                    citymun.citymunCode,
                    citymun.citymunName,
                    citymun.citymunAcronym,
                    citymun.provinceID,
                    citymun.zipCode,
                    citymun.dateAdded,
                    citymun.isActive,
                    province.provinceCode,
                    province.provinceName,
                    region.regionID,
                    region.regionCode,
                    region.regionName
                ')
                ->join('lib_psgc_provinces AS province','province.provinceID = citymun.provinceID','left')
                ->join('lib_psgc_region AS region','region.regionID = province.regionID','left');
                if($region_id != 0 && $province_id == 0 && $citymunID == 0){
                    $query->where('region.regionID',$region_id);
                }else if($region_id != 0 && $province_id != 0 && $citymunID == 0){
                    $query->where('province.provinceID',$province_id);
                }else if($region_id == 0 && $province_id == 0 && $citymunID != 0){
                    $query->where('citymun.citymunID',$citymunID);
                }
                $query  ->orderBy('region.regionName','ASC')
                        ->orderBy('province.provinceName','ASC')
                        ->orderBy('citymun.citymunName','ASC');
        return $query;
    }
    public function checkCodeExist($citymunCode,$citymunID){
        $query = $this->db
            ->table('lib_psgc_citymun');
            if($citymunID == ""){
                $query->where('citymunCode' ,$citymunCode);
            }else{
                $conditions = [
                    'citymunID !=' => $citymunID,
                    'citymunCode' => $citymunCode,
                ];
                $query->where($conditions);
            }
            
        return $query;
    }
    public function checkZipExist($zipCode,$citymunID){
        $query = $this->db
            ->table('lib_psgc_citymun');
            if($citymunID == ""){
                $query->where('zipCode' ,$zipCode);
            }else{
                $conditions = [
                    'citymunID !=' => $citymunID,
                    'zipCode' => $zipCode,
                ];
                $query->where($conditions);
            }
            
        return $query;
    }
    public function citymunInsert($data,$citymunID){
        $query = $this->db
            ->table('lib_psgc_citymun')
            ->set('citymunID',$citymunID)
            ->set($data)
            ->set("dateAdded", date('Y-m-d H:i:s'))
            ->insert();
        return $query;
    }
    public function citymunUpdate($data,$id){
        $query = $this->db
            ->table('lib_psgc_citymun')
            ->where('citymunID',$id)
            ->update($data);
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
    public function getAllCityMun($conditions = []){
        $query = $this->db
            ->table('lib_psgc_citymun');
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->where('isActive',1);
            $query->orderBy('citymunName','ASC');
        return $query;
    }
}
