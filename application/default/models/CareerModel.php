<?php
class CareerModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TABLE);
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

	public function listCareers($arrParams){ 
		$query[] 	= "SELECT `p`.`post_id`, `p`.`post_position`, `p`.`post_address_work`, `p`.`post_salary`, `p`.`post_expired`, `c`.`comp_name`, `e`.`comp_id`, `p`.`emp_id`, `c`.`comp_logo`";
		$query[] 	= "FROM `post` AS `p`, `employer` AS `e`, `company` AS `c`";
		$query[] 	= "WHERE `e`.`emp_id` = `p`.`emp_id` AND `e`.`comp_id` = `c`.`comp_id`";
		$query[] 	= "AND `p`.`post_isActive` = 'active'";

		// search career
		$query[] 	= (!empty(trim(@$arrParams['position_search']))) ? "AND `p`.`post_position` LIKE '%" . trim(@$arrParams['position_search']) . "%'" : '';
		
		
		// filter career
		$query[] 	= (@$arrParams['career_search'] != 'Tất cả ngành nghề') ? "AND `p`.`post_career` LIKE '%" . trim(@$arrParams['career_search']) . "%'" : '';

		// filter city
		$query[] 	= (@$arrParams['city_search'] != 'Tất cả tỉnh thành') ? "AND `p`.`post_address_work` LIKE '%" . trim(@$arrParams['city_search']) . "%'" : '';


		$query[] 	= "ORDER BY `p`.`post_expired` ASC";
		$query 		= implode(" ", $query);
		$result 	= $this->listRecord($query);
		return $result;
	}

	public function infoItemCareer($arrParams){
		// Info job
		$query[] 	= "SELECT `p`.*, `c`.*";
		$query[] 	= "FROM `post` AS `p`, `company` AS `c`, `employer` AS `e`";
		$query[] 	= "WHERE `e`.`emp_id` = `p`.`emp_id` AND `e`.`comp_id` = `c`.`comp_id`";
		$query[] 	= "AND `p`.`post_id` = '{$arrParams['idPost']}'";

		$query 		= implode(" ", $query);
		$result 	= $this->singleRecord($query);

		// List jobs tương tự
		$queryRelated[] = "SELECT `p`.`post_id`, `p`.`post_position`, `e`.`emp_id`, `c`.`comp_id`, `c`.`comp_name`, `c`.`comp_logo`";
		$queryRelated[] = "FROM `post` AS `p`, `company` AS `c`, `employer` AS `e`";
		$queryRelated[] = "WHERE `e`.`emp_id` = `p`.`emp_id` AND `e`.`comp_id` = `c`.`comp_id` AND NOT `p`.`post_id` = '{$arrParams['idPost']}'";
		$queryRelated[] = "AND `p`.`post_career` = '{$result['post_career']}'";
		$queryRelated[] = "ORDER BY RAND()";
		$queryRelated[] = 'LIMIT 5';
		$queryRelated 	= implode(" ", $queryRelated);
		$result['relatedJob'] = $this->listRecord($queryRelated);

		return $result;
	}

	public function totalCareer($arrParams){
		$query[]	= "SELECT COUNT(`post_id`) AS 'total'";
		$query[]	= "FROM {$this->table}";
		$query[]	= "WHERE `post_id` > 0";

		// search
		$query[] 	= (!empty(trim(@$arrParams['position_search']))) ? "AND `post_position` LIKE '%" . trim(@$arrParams['position_search']) . "%'" : '';
		
		// filter career
		$query[] 	= (@$arrParams['career_search'] != 'Tất cả ngành nghề') ? "AND `post_career` LIKE '%" . trim(@$arrParams['career_search']) . "%'" : '';

		// filter city
		$query[] 	= (@$arrParams['city_search'] != 'Tất cả tỉnh thành') ? "AND `post_address_work` LIKE '%" . trim(@$arrParams['city_search']) . "%'" : '';

		$query 		= implode(" ", $query);
		$result 	= $this->singleRecord($query);
		return $result;

	}


	// // Full name employer
	// public function getFullName()
	// {
	// 	$query[] = "SELECT `emp_fullname`";
	// 	$query[] = "FROM `{$this->table}`";
	// 	$query[] = "WHERE `emp_id` = '{$_SESSION['login']['idUser']}'";
	// 	$query		= implode(" ", $query);
	// 	$result		= $this->singleRecord($query);

	// 	return $result;
	// }
}
