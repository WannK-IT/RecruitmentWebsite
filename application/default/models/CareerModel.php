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

	public function checkBookmark(){
		$query = "SELECT `post_id`, `user_id`, `comp_id` FROM `jobsaved` WHERE `user_id` = '".$_SESSION['loginDefault']['idUser']."'";
		return $this->listRecord($query);
	}

	public function listCareers($arrParams)
	{
		$query[] 	= "SELECT `p`.`post_id`, `p`.`post_position`, `p`.`post_address_work`, `p`.`post_salary`, `p`.`post_expired`, `c`.`comp_name`, `e`.`comp_id`, `p`.`emp_id`, `c`.`comp_logo`";
		$query[] 	= "FROM `post` AS `p`, `employer` AS `e`, `company` AS `c`";
		$query[] 	= "WHERE `e`.`emp_id` = `p`.`emp_id` AND `e`.`comp_id` = `c`.`comp_id`";
		$query[] 	= "AND `p`.`post_isActive` = 'active'";
		$query[] 	= "AND `p`.`post_expired` > CURRENT_DATE()";


		// search career
		$query[] 	= (!empty(trim(@$arrParams['position_search']))) ? "AND `p`.`post_position` LIKE '%" . trim(@$arrParams['position_search']) . "%'" : '';


		// filter career
		$query[] 	= (@$arrParams['career_search'] != trim('Tất cả ngành nghề')) ? "AND `p`.`post_career` LIKE '%" . trim(@$arrParams['career_search']) . "%'" : '';

		// filter city
		$query[] 	= (@$arrParams['city_search'] != trim('Tất cả tỉnh thành')) ? "AND `p`.`post_address_work` LIKE '%" . trim(@$arrParams['city_search']) . "%'" : '';

		// filter type work
		$query[] 	= (@$arrParams['type_work_search'] != trim('Loại công việc')) ? "AND `p`.`post_type_work` LIKE '%" . trim(@$arrParams['type_work_search']) . "%'" : '';


		$query[] 	= "ORDER BY `p`.`post_expired` ASC";
		$query 		= implode(" ", $query);
		$result 	= $this->listRecord($query);
		return $result;
	}

	public function infoItemCareer($arrParams)
	{
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

	public function totalCareer($arrParams)
	{
		$query[]	= "SELECT COUNT(`post_id`) AS 'total'";
		$query[]	= "FROM {$this->table}";
		$query[]	= "WHERE `post_id` > 0";
		$query[] 	= "AND `post_isActive` = 'active'";
		$query[] 	= "AND `post_expired` > CURRENT_DATE()";

		// search
		$query[] 	= (!empty(trim(@$arrParams['position_search']))) ? "AND `post_position` LIKE '%" . trim(@$arrParams['position_search']) . "%'" : '';

		// filter career
		$query[] 	= (@$arrParams['career_search'] != trim('Tất cả ngành nghề')) ? "AND `post_career` LIKE '%" . trim(@$arrParams['career_search']) . "%'" : '';

		// filter city
		$query[] 	= (@$arrParams['city_search'] != trim('Tất cả tỉnh thành')) ? "AND `post_address_work` LIKE '%" . trim(@$arrParams['city_search']) . "%'" : '';

		// filter type work
		$query[] 	= (@$arrParams['type_work_search'] != 'Loại công việc') ? "AND `post_type_work` LIKE '%" . trim(@$arrParams['type_work_search']) . "%'" : '';

		$query 		= implode(" ", $query);
		$result 	= $this->singleRecord($query);
		return $result;
	}

	public function infoApply($arrParams)
	{
		$queryPost = "SELECT `post_position` FROM `post` WHERE `post_id` = '" . $arrParams['idPost'] . "'";
		$getPost = $this->singleRecord($queryPost);

		$queryCompany = "SELECT `comp_name` FROM `company` WHERE `comp_id` = '" . $arrParams['idComp'] . "'";
		$getCompany = $this->singleRecord($queryCompany);

		$result = $getCompany + $getPost;
		return $result;
	}

	public function infoCandidate()
	{
		$query[] = "SELECT `user_fullname`, `user_email`, `user_phone`";
		$query[] = "FROM `user`";
		$query[] = "WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
		$query = implode(" ", $query);

		$result = $this->singleRecord($query);
		return $result;
	}

	public function getFullName()
	{
		$query[]    = "SELECT `user_fullname`";
		$query[]    = "FROM `user`";
		$query[]    = "WHERE `user_id` = '{$_SESSION['loginDefault']['idUser']}'";
		$query      = implode(" ", $query);
		$result     = $this->singleRecord($query);

		return $result;
	}

	public function infoCV()
	{
		$query	= "SELECT `id`, `user_id`, `fileCV`, `position` FROM `cv` WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
		$result = $this->singleRecord($query);
		return $result;
	}

	public function applyJob($arrParams)
	{
		$this->insertOtherTable($arrParams, 'apply_job');
	}

	public function checkApply($arrParams)
	{
		$query[] 	= "SELECT `user_id`, `comp_id`, `post_id` FROM `apply_job`";
		$query[] 	= "WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "' AND `post_id` = '" . $arrParams['idPost'] . "' AND `action` = 'Chờ duyệt'";

		$query      = implode(" ", $query);

		$result = 'not applied';
		if ($this->isExist($query) == true) {
			$result = 'applied';
		}
		return $result;
	}

	public function checkExistProfile($arrParams)
	{
		$query[]	= "SELECT `position`, `fileCV`";
		$query[]	= "FROM `cv`";
		$query[]	= "WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
		$query      = implode(" ", $query);
		$result     = $this->singleRecord($query);
		return $result;
	}

	public function checkFollow($arrParams)
	{
		$query[] = "SELECT *";
		$query[] = "FROM `jobsaved`";
		$query[] = "WHERE `post_id` = '" . $arrParams['idPost'] . "' AND `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "' AND `comp_id` = '" . $arrParams['idComp'] . "'";
		$query = implode(' ', $query);

		$result = 'not';
		if ($this->isExist($query) == true) {
			$result = 'saved';
		}
		return $result;
	}

	public function followJob($arrParams)
	{
		$check = 'not';
		if ($this->checkFollow($arrParams) == 'saved') {
			$check = 'saved';
		}

		if ($check == 'not') {
			$query[] = "INSERT INTO `jobsaved` (`post_id`, `user_id`, `comp_id`, `saved_time`)";
			$query[] = "VALUES ('" . $arrParams['idPost'] . "', '" . $_SESSION['loginDefault']['idUser'] . "', '" . $arrParams['idComp'] . "', '" . date('Y-m-d H:i:s') . "')";
			$newResult = 'saved';
		} elseif ($check == 'saved') {
			$query[] = "DELETE FROM `jobsaved`";
			$query[] = "WHERE `post_id` = '" . $arrParams['idPost'] . "' AND `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "' AND `comp_id` = '" . $arrParams['idComp'] . "'";
			$newResult = 'not';
		}
		
		$query = implode(' ', $query);
		$this->query($query);
		return $newResult;
		// return $result;
		// 	$query[] = "INSERT INTO `jobsaved` (`post_id`, `user_id`, `comp_id`, `saved_time`)";
		// 	$query[] = "VALUES ('" . $arrParams['idPost'] . "', '" . $_SESSION['loginDefault']['idUser'] . "', '" . $arrParams['idComp'] . "', '" . date('Y-m-d H:i:s') . "')";
		// 	$query = implode(' ', $query);
		// 	$this->query($query);

		// return ['javascript:' . URL::addLink($arrParams['module'], $arrParams['controller'], 'unfollowJob', ['idPost' => $arrParams['idPost'], 'idComp' => $arrParams['idComp']])];
	}

	// public function unfollowJob($arrParams)
	// {
	// 		$query[] = "DELETE FROM `jobsaved`";
	// 		$query[] = "WHERE `post_id` = '" . $arrParams['idPost'] . "' AND `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "' AND `comp_id` = '" . $arrParams['idComp'] . "'";

	// 		$query = implode(' ', $query);
	// 		$this->query($query);

	// 	return ['javascript:' . URL::addLink($arrParams['module'], $arrParams['controller'], 'followJob', ['idPost' => $arrParams['idPost'], 'idComp' => $arrParams['idComp']])];
	// }
}
