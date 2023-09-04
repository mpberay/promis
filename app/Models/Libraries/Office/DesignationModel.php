<?php

namespace App\Models\Libraries\Office;

use CodeIgniter\Model;

class DesignationModel extends Model
{
    public function designationInsert($data,$desID){
        $query = $this->db
            ->table('lib_office_designation')
            ->set('desID',$desID)
            ->set($data)
            ->set("dateAdded", date('Y-m-d H:i:s'))
            ->insert();
        return $query;
    }
    public function designationUpdate($data,$desID){
        $query = $this->db
            ->table('lib_office_designation')
            ->where('desID',$desID)
            ->update($data);
        return $query;
    }
    public function getDatatable($conditions = []){
        $query = $this->db
            ->table('lib_office_designation');
            //if naa parameter
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->orderBy('dateAdded','DESC');
        return $query;//->get()->getResultArray();
    }
    public function getAllDesignation($conditions = []){
        $query = $this->db
            ->table('lib_office_designation');
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->where('isActive',1);
            $query->orderBy('desName','ASC');
        return $query;
    }
}
