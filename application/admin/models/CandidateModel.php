<?php

use LDAP\Result;

class CandidateModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable(DB_TBL_CV);
    }

    // Avatar
    public function getAvatar()
    {
        $query[]    = "SELECT `comp_logo`";
        $query[]    = "FROM `company`";
        $query[]    = "WHERE `comp_id` = '{$_SESSION['login']['idCompany']}'";
        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);

        return $result;
    }

    // Full name employer
    public function getFullName()
    {
        $query[]    = "SELECT `emp_fullname`";
        $query[]    = "FROM `employer`";
        $query[]    = "WHERE `emp_id` = '{$_SESSION['login']['idUser']}'";
        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);

        return $result;
    }

    public function listCandidates($arrParams)
    {
        $query[]    = "SELECT `cv`.`id`, `cv`.`user_id`, `u`.`user_fullname`, `cv`.`position`, `cv`.`level`, `cv`.`exp`, `cv`.`gender`, `cv`.`birthday`, `cv`.`workplace`, `cv`.`career`, `cv`.`salary`, `cv`.`type_work`, `cv`.`update_time`";
        $query[]    = "FROM `{$this->table}` AS `cv`, `user` AS `u`";
        $query[]    = "WHERE `cv`.`user_id` = `u`.`user_id` AND `cv`.`position` IS NOT NULL";

        // search position
        $query[]     = (!empty(trim(@$arrParams['position_search']))) ? "AND `cv`.`position` LIKE '%" . trim(@$arrParams['position_search']) . "%'" : '';

        // filter career
        $query[]     = (@$arrParams['career_search'] != trim('Tất cả ngành nghề')) ? "AND `cv`.`career` LIKE '%" . trim(@$arrParams['career_search']) . "%'" : '';

        // filter workplace
        $query[]     = (@$arrParams['workplace_search'] != trim('Tất cả tỉnh thành')) ? "AND `cv`.`workplace` LIKE '%" . trim(@$arrParams['workplace_search']) . "%'" : '';

        // filter degree
        $query[]     = (@$arrParams['degree_search'] != trim('Tất cả bằng cấp')) ? "AND `cv`.`level` LIKE '%" . trim(@$arrParams['degree_search']) . "%'" : '';

        // filter gender
        $query[]     = (@$arrParams['gender_search'] != trim('Tất cả giới tính')) ? "AND `cv`.`gender` LIKE '%" . trim(@$arrParams['gender_search']) . "%'" : '';

        // filter exp
        $query[]     = (@$arrParams['exp_search'] != trim('Tất cả kinh nghiệm')) ? "AND `cv`.`exp` LIKE '%" . trim(@$arrParams['exp_search']) . "%'" : '';



        $query      = implode(" ", $query);
        $result     = $this->listRecord($query);

        return $result;
    }

    public function infoItem($arrParams){
        $query[]    = "SELECT `v`.*, `u`.`user_email`, `u`.`user_fullname`, `u`.`user_phone`, `u`.`user_avatar`";
        $query[]    = "FROM `{$this->table}` AS `v`, `user` AS `u`";
        $query[]    = "WHERE `v`.`user_id` = `u`.`user_id`";
        $query[]    = "AND `v`.`id` = '{$arrParams['id']}'";

        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);
        return $result;
    }
}
