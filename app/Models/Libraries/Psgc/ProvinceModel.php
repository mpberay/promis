<?php

namespace App\Models\Libraries\Psgc;

use CodeIgniter\Model;

class ProvinceModel extends Model
{
    public function sectionInsert($data,$secID){
        $query = $this->db
            ->table('lib_office_section')
            ->set('secID',$secID)
            ->set($data)
            ->set("dateAdded", date('Y-m-d H:i:s'))
            ->insert();
        return $query;
    }
    public function sectionUpdate($data,$secID){
        $query = $this->db
            ->table('lib_office_section')
            ->where('secID',$secID)
            ->update($data);
        return $query;
    }
    public function getDatatable($conditions = []){
        $query = $this->db
            ->table('lib_psgc_provinces');
            //if naa parameter
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->orderBy('provinceName','ASC');
        return $query;//->get()->getResultArray();
    }
    public function getAllRegion($conditions = []){
        $query = $this->db
            ->table('lib_psgc_region');
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->where('isActive',1);
            $query->orderBy('regionName','ASC');
        return $query;
    }
}
