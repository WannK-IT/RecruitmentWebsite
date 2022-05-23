<?php
class AccountModel extends Model
{

    private $columnsEmployer = ['emp_email', 'emp_fullname', 'emp_user', 'emp_password', 'emp_phone', 'emp_address', 'comp_id'];
    private $columnsCompany = ['comp_name', 'comp_location', 'comp_address', 'comp_tax_id', 'comp_size', 'comp_field'];

    public function __construct()
    {
        parent::__construct();
        $this->setTable('employer');
    }


    public function login($params)
    {
        $query[]    = "SELECT `emp_id`, `emp_user`, `emp_password`, `emp_fullname`, `comp_id`";
        $query[]    = "FROM `{$this->table}`";
        $query[]    = "WHERE `emp_user` = '{$params['emp_user']}' AND `emp_password` = '".md5($params['emp_password'])."'";
        $query        = implode(" ", $query);

        // Query to load information of employer
        $loadInfo    = $this->singleRecord($query);

        // Check username & password exist
        if ($this->isExist($query) == true) {
            $result = 'success';
            $_SESSION['login']['loginSuccess'] = true;
            $_SESSION['login']['loginFullname'] = $loadInfo['emp_fullname'];
            $_SESSION['login']['idUser'] = $loadInfo['emp_id'];
            $_SESSION['login']['idCompany'] = $loadInfo['comp_id'];
        } else {
            $result = 'failed';
        }
        return $result;
    }

    public function register($params)
    {

        // insert info company first
        $dataCompany = array_intersect_key($params, array_flip($this->columnsCompany));
        $this->insertOtherTable($dataCompany, 'company');
        $lastID =  $this->lastID();

        // then insert employer account
        $dataEmployer = array_intersect_key($params, array_flip($this->columnsEmployer));
        $dataEmployer['comp_id'] = $lastID;
        $dataEmployer['emp_password'] = md5($dataEmployer['emp_password']);
        $this->insert($dataEmployer);

        $query = "SELECT `emp_id` FROM `{$this->table}` WHERE `emp_user` = '".$dataEmployer['emp_user']."' AND `emp_password` = '".$dataEmployer['emp_password']."'";
        $getID  = $this->singleRecord($query);
        // create a folder storage
        mkdir(UPLOAD_PATH_ADMIN . 'img' . DS . $getID['emp_id']);
    }

    public function checkExistAccount($arrParams)
    {
        $query[]    = "SELECT `emp_user`";
        $query[]    = "FROM `{$this->table}`";
        $query[]    = "WHERE `emp_user` = '{$arrParams['emp_user']}'";
        $query        = implode(" ", $query);

        // Query to load information of employer
        $result = 'not exist';
        if ($this->isExist($query) == true) {
            $result = 'exist';
        }
        return $result;
    }
}
