<?php
class AccountModel extends Model
{
    private $columnsUser = ['user_email', 'user_username', 'user_password', 'user_fullname', 'user_phone'];

    public function __construct()
    {
        parent::__construct();
        $this->setTable(DB_TBL_USER);
    }

    public function register($params)
    {
        // insert into table user first
        $data = array_intersect_key($params, array_flip($this->columnsUser));
        $data['user_password'] = md5($data['user_password']);
        $this->insert($data);

        // get last id inserted
        $lastID =  $this->lastID();
        $query = "INSERT INTO `cv`(`user_id`) VALUES ('" . $lastID . "')";
        $this->query($query);

        // create a folder storage images and cv
        mkdir(UPLOAD_PATH_DEFAULT . 'img' . DS . $lastID);
        mkdir(UPLOAD_PATH_DEFAULT . 'cv' . DS . $lastID);

        $_SESSION['registerUserSuccess'] = true;
    }

    public function checkExistUsername($arrParams)
    {
        $query[]    = "SELECT `user_username`";
        $query[]    = "FROM `{$this->table}`";
        $query[]    = "WHERE `user_username` = '{$arrParams['user_username']}'";
        $query        = implode(" ", $query);

        // Query to load information of employer
        $result = 'not exist username';
        if ($this->isExist($query) == true) {
            $result = 'exist username';
        }
        return $result;
    }

    public function checkExistEmail($arrParams)
    {
        $query[]    = "SELECT `user_email`";
        $query[]    = "FROM `{$this->table}`";
        $query[]    = "WHERE `user_email` = '{$arrParams['user_email']}'";
        $query        = implode(" ", $query);

        // Query to load information of employer
        $result = 'not exist email';
        if ($this->isExist($query) == true) {
            $result = 'exist email';
        }
        return $result;
    }

    public function login($params)
    {
        $query[]    = "SELECT `user_id`, `user_username`, `user_password`, `user_fullname`";
        $query[]    = "FROM `{$this->table}`";
        $query[]    = "WHERE `user_username` = '{$params['user_username']}' AND `user_password` = '".md5($params['user_password'])."'";
        $query        = implode(" ", $query);

        // Query to load information of employer
        $loadInfo    = $this->singleRecord($query);

        // Check username & password exist
        if ($this->isExist($query) == true) {
            $result = 'success';
            $_SESSION['loginDefault']['loginSuccess'] = true;
            $_SESSION['loginDefault']['idUser'] = $loadInfo['user_id'];
        } else {
            $result = 'failed';
        }
        return $result;
    }
}
