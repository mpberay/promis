<?php

namespace App\Models\Libraries\Office;

use CodeIgniter\Model;

class PositionModel extends Model
{
    protected $table;
    protected $allowedFields = [
        'posID',
        'posName',
        'posAcronym',
        'dateAdded',
        'isActive',
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
    public function getPositionDatatable($conditions = []){
        $this->table = $this->table ?: 'lib_office_position';
        $query = $this->builder();
        if (!empty($conditions)) {
            $query->where($conditions);
        }
        $query->orderBy('dateAdded','DESC');
        return $query;
    }
    public function insertPosition($data){
        $this->table = $this->table ?: 'lib_office_position';//'tbl_user_session'; // Set a default table if not set
        //return $this->insert($data);
        // $allowedFields = $this->getAllowedFields($this->table);
        // $filteredData = array_intersect_key($data, array_flip($allowedFields));
        return $this->insert($data);
    }
    public function statusPosition($data,$posID){
        $query = $this->db
            ->table('lib_office_position')
            ->where('posID',$posID)
            ->update($data);
        return $query;
    }
    public function getPositionSelect($conditions = []){
        $this->table = $this->table ?: 'lib_office_position';
        $query = $this->builder();
        if (!empty($conditions)) {
            $query->where($conditions);
        }
        $query->orderBy('posName','ASC');
        return $query;
    }
}
