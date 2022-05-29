<?php
class IndexModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TABLE);
	}

	public function listItems(){ 
		
		$query[] 	= "SELECT `p`.`post_id`, `p`.`post_position`, `p`.`post_address_work`, `p`.`post_salary`, `p`.`post_expired`, `p`.`post_createdDate`, `c`.`comp_name`, `e`.`comp_id`, `p`.`emp_id`, `c`.`comp_logo`";
		$query[] 	= "FROM `post` AS `p`, `employer` AS `e`, `company` AS `c`";
		$query[] 	= "WHERE `e`.`emp_id` = `p`.`emp_id` AND `e`.`comp_id` = `c`.`comp_id`";
		$query[] 	= "AND `p`.`post_isActive` = 'active'";
		$query[] 	= "ORDER BY RAND()";
		$query[] 	= "LIMIT 7";

		$query 		= implode(" ", $query);
		$result 	= $this->listRecord($query);
		return $result;
	}

	public function infoItemView($arrParams){
		$query[] 	= "SELECT `p`.*, `c`.*";
		$query[] 	= "FROM `post` AS `p`, `company` AS `c`, `employer` AS `e`";
		$query[] 	= "WHERE `e`.`emp_id` = `p`.`emp_id` AND `e`.`comp_id` = `c`.`comp_id`";
		$query[] 	= "AND `p`.`post_id` = '{$arrParams['idPost']}'";

		$query 		= implode(" ", $query);
		$result 	= $this->singleRecord($query);

		// list job tương tự
		$queryRelated[] = "SELECT `p`.`post_id`, `p`.`post_position`, `e`.`emp_id`, `c`.`comp_id`, `c`.`comp_name`, `c`.`comp_logo`";
		$queryRelated[] = "FROM `post` AS `p`, `company` AS `c`, `employer` AS `e`";
		$queryRelated[] = "WHERE `e`.`emp_id` = `p`.`emp_id` AND `e`.`comp_id` = `c`.`comp_id` AND NOT `p`.`post_id` = '{$arrParams['idPost']}'";
		$queryRelated[] = "AND `p`.`post_career` = '{$result['post_career']}'";
		$queryRelated[] = "ORDER BY RAND()";
		$queryRelated[] = 'LIMIT 5';
		$queryRelated = implode(" ", $queryRelated);
		$result['relatedJob'] = $this->listRecord($queryRelated);

		return $result;
	}

	// // Avatar
	// public function getAvatar()
	// {
	// 	$query[] = "SELECT `comp_logo`";
	// 	$query[] = "FROM `company`";
	// 	$query[] = "WHERE `comp_id` = '{$_SESSION['login']['idCompany']}'";
	// 	$query		= implode(" ", $query);
	// 	$result		= $this->singleRecord($query);

	// 	return $result;
	// }

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
