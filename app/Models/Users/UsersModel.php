<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table;
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
    public function setTable($tableName)
    {
        $this->table = $tableName;
        return $this;
    }
    protected function getAllowedFields($table)
    {
        return $this->allowedFieldsMap[$table] ?? [];
    }

    public function getUsers(){
        $query = $this->db
                ->table('auth_user');
                //->select('id,employee_id,firstname,lastname,');
                // /->where('username',$username);
        // return $query->get()->getResultArray();
        return $query;
    }
    public function getUserLogs(){
        $query = $this->db
            ->table('tbl_user_session AS tus')
            ->select('tus.id AS sessionID, tus.hostname, tus.date, tus.activity') // tbl_user_session table
            ->select('au.id AS userID, au.username,CONCAT(au.firstname," ",au.lastname) AS fullName') // auth_user table
            //->select("CONCAT(au.firstname, ' ', au.lastname) AS fullName")
            //->select('(tus.id) as sessionID')
            ->join('auth_user AS au', 'au.id = tus.user_id','left')
            ->orderBy('tus.date','DESC');
        return $query;//->get()->getResultArray();
    }
}
