<?php

namespace App\Models\Libraries\Office;

use CodeIgniter\Model;

class HeadModel extends Model
{
    protected $table;
    protected $allowedFields = [
        "headID",
        "firstname",
        "middlename",
        "lastname",
        "extensionname",
        "sex",
        "posID",
        "dateAdded",
        "isActive"
    ];
    public function setTable($tableName)
    {
        $this->table = $tableName;
        return $this;
    }
    protected function getAllowedFields($table)
    {
        return $this->allowedFieldsMap[$table] ?? [];
    }
    public function headInsert($data,$headId){
        // $this->table = $this->table ?: 'lib_office_head';//'tbl_user_session'; // Set a default table if not set
        // //return $this->insert($data);
        // // $allowedFields = $this->getAllowedFields($this->table);
        // // $filteredData = array_intersect_key($data, array_flip($allowedFields));
        // return $this->insert($data);
        $query = $this->db
            ->table('lib_office_head')
            ->set('headID',$headId)
            ->set($data)
            ->set("dateAdded", date('Y-m-d H:i:s'))
            ->insert();
        return $query;
    }
    public function headUpdate($data,$headID){
        $query = $this->db
            ->table('lib_office_head')
            ->where('headID',$headID)
            ->update($data);
        return $query;
    }
    public function getHeadDatatable($conditions = []){
        $query = $this->db
            ->table('lib_office_head AS head')
            ->select('  head.headID, 
                        head.firstname, 
                        head.middlename,  
                        head.lastname, 
                        head.extensionname, 
                        head.sex, 
                        head.posID, 
                        head.dateAdded, 
                        head.isActive, 
                        position.posName, 
                        position.posAcronym, 
                    ') 
            ->join('lib_office_position AS position', 'position.posID = head.posID','left');
            //if naa parameter
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            $query->orderBy(' head.dateAdded','DESC');
        return $query;//->get()->getResultArray();
    }
    public function headStatus($data,$headID){
        $query = $this->db
            ->table('lib_office_head')
            ->where('headID',$headID)
            ->update($data);
        return $query;
    }
    public function getAllHead($conditions = []){
        $query = $this->db
            ->table('lib_office_head');
            if (!empty($conditions)) {
                $query->where($conditions);
            }
            // foreach ($conditions as $field => $value) {
            //     $query->where($field . ' !=', $value);
            // }
            $query->where('isActive',1);
            $query->orderBy('firstname','ASC');
        return $query;
    }
}
