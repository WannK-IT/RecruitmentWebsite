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
