<?php

namespace App\Models\Authentications;

use CodeIgniter\Model;

class AuthModel extends Model{

    protected $table; // Store the dynamically set table name
    // protected $DBGroup          = 'default';
    // protected $table            = 'auth_user';
    // protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields = [
        'id',
        'employee_id',
        'username',
        'firstname',
        'middlename',
        'lastname',
        'extensionname',
        'email',
        'password_hash',
        'date_register',
        'is_active',
        'user_id',
        'ip_address',
        'hostname',
        'date',
        'activity'
    ];
    // protected $allowedFieldsMap = [
    //     'auth_user' => ['id', 'username'],
    //     'tbl_user_session' => ['id', 'user_id']
    // ];
    public function setTable($tableName)
    {
        $this->table = $tableName;
        return $this;
    }
    protected function getAllowedFields($table)
    {
        return $this->allowedFieldsMap[$table] ?? [];
    }

    public function getLogin($conditions = []){
        $this->table = $this->table ?: 'auth_user';
        $query = $this->builder();
        if (!empty($conditions)) {
            $query->where($conditions);
        }
        // return $query->get()->getResult();  #stdclass
        return $query->get()->getResultArray();
    }
    public function insertSession($data){
        $this->table = $this->table ?: 'tbl_user_session';//'tbl_user_session'; // Set a default table if not set
        //return $this->insert($data);
        // $allowedFields = $this->getAllowedFields($this->table);
        // $filteredData = array_intersect_key($data, array_flip($allowedFields));
        return $this->insert($data);
    }
    public function insertNewAccount($data){
        $this->table = $this->table ?: 'auth_user';
        return $this->insert($data);
    }
    public function LogIn($username){
        $query = $this->db->table('auth_user')->where('username',$username);
        return $query->get()->getResultArray();
    }
   
    // public function UserSessionHistory($data){
    //     $this->db->trans_start();
    //     $this->db->insert('tbl_user_session', $data);
    //     if ($this->db->trans_status() === FALSE) {
    //         $this->db->trans_rollback();
    //         return false;
    //     } else {
    //         $this->db->trans_commit();
    //         return true;
    //     }
    // }
}
