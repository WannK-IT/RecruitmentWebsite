<?php

// use LDAP\Result;

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

    public function listCandidates($arrParams, $option)
    {
        if ($option == 'actionFind') {
            $query[]    = "SELECT `cv`.`id`, `cv`.`user_id`, `u`.`user_fullname`, `cv`.`position`, `cv`.`level`, `cv`.`exp`, `cv`.`gender`, `cv`.`birthday`, `cv`.`workplace`, `cv`.`career`, `cv`.`salary`, `cv`.`type_work`, `cv`.`update_time`";
            $query[]    = "FROM `{$this->table}` AS `cv`, `user` AS `u`";
            $query[]    = "WHERE `cv`.`user_id` = `u`.`user_id` AND `cv`.`position` IS NOT NULL";

            // search position
            $query[]     = (!empty(trim(@$arrParams['position_search']))) ? "AND `cv`.`position` LIKE '%" . trim(@$arrParams['position_search']) . "%'" : '';

            // filter career
            $query[]     = (@$arrParams['career_search'] != trim('Tất cả ngành nghề')) ? "AND `cv`.`career` LIKE '%" . trim(@$arrParams['career_search']) . "%'" : '';

            // filter type work
            $query[]     = (@$arrParams['typework_search'] != trim('Tất cả hình thức')) ? "AND `cv`.`type_work` LIKE '%" . trim(@$arrParams['typework_search']) . "%'" : '';

            // filter workplace
            $query[]     = (@$arrParams['workplace_search'] != trim('Tất cả tỉnh thành')) ? "AND `cv`.`workplace` LIKE '%" . trim(@$arrParams['workplace_search']) . "%'" : '';

            // filter degree
            $query[]     = (@$arrParams['degree_search'] != trim('Tất cả bằng cấp')) ? "AND `cv`.`level` LIKE '%" . trim(@$arrParams['degree_search']) . "%'" : '';

            // filter gender
            $query[]     = (@$arrParams['gender_search'] != trim('Tất cả giới tính')) ? "AND `cv`.`gender` LIKE '%" . trim(@$arrParams['gender_search']) . "%'" : '';

            // filter exp
            $query[]     = (@$arrParams['exp_search'] != trim('Tất cả kinh nghiệm')) ? "AND `cv`.`exp` LIKE '%" . trim(@$arrParams['exp_search']) . "%'" : '';
        } elseif ($option == 'actionList') {
            $query[] = "SELECT `j`.`apply_id`, `j`.`user_id`, `j`.`comp_id`, `j`.`cv_id`, `j`.`post_id`, `j`.`action`, `j`.`type_apply`, `j`.`date_apply`, `v`.`position`, `u`.`user_fullname`, `p`.`post_position`";
            $query[] = "FROM `cv` AS `v`, `apply_job` AS `j`, `user` AS `u`, `post` AS `p`";
            $query[] = "WHERE `j`.`user_id` = `v`.`user_id` AND `v`.`user_id` = `u`.`user_id` AND `j`.`post_id` = `p`.`post_id`";
            $query[] = "AND `j`.`comp_id` = '" . $_SESSION['login']['idCompany'] . "'";
            $query[] = "ORDER BY FIELD(`j`.`action`, 'Chờ duyệt', 'Đã duyệt', 'Đã phỏng vấn', 'Trúng tuyển', 'Không trúng tuyển')";
        }

        $query      = implode(" ", $query);
        $result     = $this->listRecord($query);

        return $result;
    }

    public function totalCandidates($arrParams)
    {
        $query[]    = "SELECT COUNT(`id`) AS 'total'";
        $query[]    = "FROM `{$this->table}`";
        $query[]    = "WHERE `position` IS NOT NULL";

        // search position
        $query[]     = (!empty(trim(@$arrParams['position_search']))) ? "AND `position` LIKE '%" . trim(@$arrParams['position_search']) . "%'" : '';

        // filter career
        $query[]     = (@$arrParams['career_search'] != trim('Tất cả ngành nghề')) ? "AND `career` LIKE '%" . trim(@$arrParams['career_search']) . "%'" : '';

        // filter type work
        $query[]     = (@$arrParams['typework_search'] != trim('Tất cả hình thức')) ? "AND `type_work` LIKE '%" . trim(@$arrParams['typework_search']) . "%'" : '';

        // filter workplace
        $query[]     = (@$arrParams['workplace_search'] != trim('Tất cả tỉnh thành')) ? "AND `workplace` LIKE '%" . trim(@$arrParams['workplace_search']) . "%'" : '';

        // filter degree
        $query[]     = (@$arrParams['degree_search'] != trim('Tất cả bằng cấp')) ? "AND `level` LIKE '%" . trim(@$arrParams['degree_search']) . "%'" : '';

        // filter gender
        $query[]     = (@$arrParams['gender_search'] != trim('Tất cả giới tính')) ? "AND `gender` LIKE '%" . trim(@$arrParams['gender_search']) . "%'" : '';

        // filter exp
        $query[]     = (@$arrParams['exp_search'] != trim('Tất cả kinh nghiệm')) ? "AND `exp` LIKE '%" . trim(@$arrParams['exp_search']) . "%'" : '';


        $query         = implode(" ", $query);
        $result     = $this->singleRecord($query);
        return $result['total'];
    }

    public function infoItem($arrParams)
    {
        $query[]    = "SELECT `v`.*, `u`.`user_email`, `u`.`user_fullname`, `u`.`user_phone`, `u`.`user_avatar`";
        $query[]    = "FROM `{$this->table}` AS `v`, `user` AS `u`";
        $query[]    = "WHERE `v`.`user_id` = `u`.`user_id`";
        $query[]    = "AND `v`.`id` = '{$arrParams['id']}'";

        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);
        return $result;
    }

    public function updateStatusApply($arrParams)
    {
        $query[]    = "UPDATE `apply_job` SET `action` = '" . $arrParams['statusApply'] . "', `introduction` = '" . $arrParams['introduction'] . "'";
        $query[]    = "WHERE `apply_id` = '" . $arrParams['apply_id'] . "'";
        $query      = implode(" ", $query);
        $this->query($query);
    }

    public function ajaxUpdateStatusApply($arrParams){
        $query[]    = "SELECT `apply_id`, `introduction`, `action`";
        $query[]    = "FROM `apply_job`";
        $query[]    = "WHERE `apply_id` = '".$arrParams['idApply']."'";
        
        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);
        return $result;
    }

    public function checkApplied($arrParams){
        $query[]    = "SELECT `apply_id`, `cv_id`, `comp_id`";
        $query[]    = "FROM `apply_job`";
        $query[]    = "WHERE `cv_id` = '".$arrParams['id']."' AND `comp_id` = '".$_SESSION['login']['idCompany']."'";

        $query      = implode(" ", $query);
        $result     = $this->listRecord($query);
        return $result;
    }
}
