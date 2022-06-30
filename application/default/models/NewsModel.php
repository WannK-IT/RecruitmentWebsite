<?php
class NewsModel extends Model
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


	public function getFullName()
	{
		$query[]    = "SELECT `user_fullname`";
		$query[]    = "FROM `user`";
		$query[]    = "WHERE `user_id` = '{$_SESSION['loginDefault']['idUser']}'";
		$query      = implode(" ", $query);
		$result     = $this->singleRecord($query);

		return $result;
	}

	public function listNews($arrParams, $option = null)
	{
		if ($option == 'list') {
			$query[] = "SELECT `n`.*, `c`.`comp_logo`, `e`.`emp_fullname` FROM `news` AS `n`, `employer` AS `e`, `company` AS `c`";
			$query[] = "WHERE `n`.`emp_id` = `e`.`emp_id` AND `c`.`comp_id` = `e`.`comp_id`";
			$query[] = "AND `n`.`news_status` = 'active'";
			$query = implode(' ', $query);
			$result = $this->listRecord($query);
		} elseif ($option == 'post') {
			$query[] = "SELECT `n`.*, `c`.`comp_logo`, `e`.`emp_fullname` FROM `news` AS `n`, `employer` AS `e`, `company` AS `c`";
			$query[] = "WHERE `n`.`emp_id` = `e`.`emp_id` AND `c`.`comp_id` = `e`.`comp_id`";
			$query[] = "AND `news_id` = '" . $arrParams['idNews'] . "'";
			$query[] = "AND `n`.`news_status` = 'active'";
			$query = implode(' ', $query);
			$result = $this->singleRecord($query);
		}elseif($option == 'relate'){
			$query = "SELECT `news_id`, `news_title` FROM `news` WHERE `news_status` = 'active' ORDER BY RAND()";
			$result = $this->listRecord($query);
		}
		return $result;
	}
}
