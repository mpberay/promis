<?php

namespace App\Models\Libraries\Office;

use CodeIgniter\Model;

class DivisionModel extends Model
{
    public function divisionInsert($data,$divID){
        $query = $this->db
            ->table('lib_office_division')
            ->set('divID',$divID)
            ->set($data)
            ->set("dateAdded", date('Y-m-d H:i:s'))
            ->insert();
        return $query;
    }
    public function divisionUpdate($data,$divID){
        $query = $this->db
            ->table('lib_office_division')
            ->where('divID',$divID)
            ->update($data);
        return $query;
    }
    public function getDatatable($conditions = []){
        $query = $this->db
            ->table('lib_office_division AS div')
            ->select('
                div.divID,
                div.divCode,
                div.divName,
                div.divAcronym,
                div.headID,
                div.desID,
                div.dateAdded,
                div.isActive,
                head.firstname,
                head.middlename,
                head.lastname,
                head.extensionname,
                des.desName,
                des.desAcronym,
            ')
            ->join('lib_office_head AS head','head.headID = div.headID','left')
            ->join('lib_office_designation AS des','des.desID = div.desID','left');
            //if naa parameter
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->orderBy('div.dateAdded','DESC');
        return $query;//->get()->getResultArray();
    }
    public function getAllDivision($conditions = []){
        $query = $this->db
            ->table('lib_office_division');
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->orderBy('divName','ASC');
        return $query;
    }
}
