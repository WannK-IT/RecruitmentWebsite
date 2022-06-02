<?php
class CandidateModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable(DB_TBL_EMPLOYER);
    }

    // Avatar
    public function getAvatar()
    {
        $query[] = "SELECT `comp_logo`";
        $query[] = "FROM `company`";
        $query[] = "WHERE `comp_id` = '{$_SESSION['login']['idCompany']}'";
        $query        = implode(" ", $query);
        $result        = $this->singleRecord($query);

        return $result;
    }

    // Full name employer
    public function getFullName()
    {
        $query[] = "SELECT `emp_fullname`";
        $query[] = "FROM `{$this->table}`";
        $query[] = "WHERE `emp_id` = '{$_SESSION['login']['idUser']}'";
        $query        = implode(" ", $query);
        $result        = $this->singleRecord($query);

        return $result;
    }
}
