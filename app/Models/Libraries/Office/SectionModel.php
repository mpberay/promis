<?php

namespace App\Models\Libraries\Office;

use CodeIgniter\Model;

class SectionModel extends Model
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
            ->table('lib_office_section AS sec')
            ->select('
                sec.secID,
                sec.secCode,
                sec.secName,
                sec.secAcronym,
                sec.divID,
                sec.headID,
                sec.desID,
                sec.dateAdded,
                sec.isActive,
                div.divCode,
                div.divName,
                div.divAcronym,
                head.firstname,
                head.middlename,
                head.lastname,
                head.extensionname,
                des.desName,
                des.desAcronym,
            ')
            ->join('lib_office_division AS div','div.divID = sec.divID','left')
            ->join('lib_office_head AS head','head.headID = sec.headID','left')
            ->join('lib_office_designation AS des','des.desID = sec.desID','left');
            //if naa parameter
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->orderBy('div.dateAdded','DESC');
        return $query;//->get()->getResultArray();
    }
}
