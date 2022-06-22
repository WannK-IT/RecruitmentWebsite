<?php
class CompanyModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_COMPANY);
	}

	// Avatar
	public function getAvatar()
	{
		$query[] = "SELECT `user_avatar`";
		$query[] = "FROM `user`";
		$query[] = "WHERE `user_id` = '{$_SESSION['loginDefault']['idUser']}'";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);

		return $result;
	}

	public function getFullName(){
        $query[]    = "SELECT `user_fullname`";
        $query[]    = "FROM `user`";
        $query[]    = "WHERE `user_id` = '{$_SESSION['loginDefault']['idUser']}'";
        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);

        return $result;
    }

	public function listCompanies($arrParams)
	{
		$query[] 	= "SELECT  `c`.`comp_id`, `c`.`comp_name`, `e`.`emp_id`, `c`.`comp_logo`, `c`.`comp_address`, `c`.`comp_size`";
		$query[] 	= "FROM `employer` AS `e`, `company` AS `c`";
		$query[] 	= "WHERE `e`.`comp_id` = `c`.`comp_id`";

		// search company
		$query[] 	= (!empty(trim(@$arrParams['company_search']))) ? "AND `c`.`comp_name` LIKE '%" . trim(@$arrParams['company_search']) . "%'" : '';


		$query[] 	= "ORDER BY RAND()";

		$query 		= implode(" ", $query);
		$result 	= $this->listRecord($query);
		return $result;
	}

	public function infoItemCompany($arrParams){
		// Info company
		$query[] 	= "SELECT `c`.*, `e`.`emp_id`";
		$query[] 	= "FROM `post` AS `p`, `company` AS `c`, `employer` AS `e`";
		$query[] 	= "WHERE `e`.`emp_id` = `p`.`emp_id` AND `e`.`comp_id` = `c`.`comp_id`";
		$query[] 	= "AND `c`.`comp_id` = '{$arrParams['idCompany']}'";

		$query 		= implode(" ", $query);
		$result 	= $this->singleRecord($query);

		// List posts of company
		$queryPosts[] 	= "SELECT `p`.`post_id`, `p`.`post_position`, `p`.`post_salary`, `p`.`post_address_work`, `p`.`post_expired`, `c`.`comp_id`";
		$queryPosts[] 	= "FROM `post` AS `p`, `company` AS `c`, `employer` AS `e`";
		$queryPosts[] 	= "WHERE `e`.`emp_id` = `p`.`emp_id` AND `e`.`comp_id` = `c`.`comp_id`";
		$queryPosts[] 	= "AND `c`.`comp_id` = '{$arrParams['idCompany']}'";
		$queryPosts 	= implode(" ", $queryPosts);
		$result['listPosts'] = $this->listRecord($queryPosts);

		return $result;
	}

	public function totalCompany($arrParams){
		$query[]	= "SELECT COUNT(`comp_id`) AS 'total'";
		$query[]	= "FROM {$this->table}";
		$query[]	= "WHERE `comp_id` > 0";

		// search
		$query[] 	= (!empty(trim(@$arrParams['company_search']))) ? "AND `comp_name` LIKE '%" . trim(@$arrParams['company_search']) . "%'" : '';
		

		$query 		= implode(" ", $query);
		$result 	= $this->singleRecord($query);
		return $result;
	}
}
