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
		$query[] 	= "AND `p`.`post_expired` > CURRENT_DATE()";
		$query[] 	= "ORDER BY RAND()";
		$query[] 	= "LIMIT 7";

		$query 		= implode(" ", $query);
		$result 	= $this->listRecord($query);
		return $result;
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

	public function listEmp(){
		$query = "SELECT `c`.`comp_id`, `c`.`comp_name`, `c`.`comp_logo`, `e`.`emp_id` FROM `company` AS `c`, `employer` AS `e` WHERE `c`.`comp_id` = `e`.`comp_id` ORDER BY RAND() LIMIT 20";
		return $this->listRecord($query);
	}

	public function listNews(){
		$query = "SELECT `n`.`news_id`, `n`.`news_title`, `n`.`news_description`, `n`.`news_thumbnail`, `e`.`emp_id` FROM `news` AS `n`, `employer` AS `e` WHERE `n`.`emp_id` = `e`.`emp_id` AND `n`.`news_status` = 'active' ORDER BY RAND() LIMIT 4";
		return $this->listRecord($query);
	}

	public function recruitPlace(){
		$query = "SELECT `post_address_work`, COUNT(`post_address_work`) AS 'total' FROM `post` WHERE `post_isActive` = 'active' GROUP BY `post_address_work` ORDER BY 'total' DESC LIMIT 5";
		return $this->listRecord($query);
	}
	
	public function hotCareer(){
		$query = "SELECT COUNT(`post_career`) AS 'career', `post_career`  FROM `post` WHERE `post_isActive` = 'active' GROUP BY `post_career` ORDER BY 'career' DESC LIMIT 6";
		return $this->listRecord($query);
	}
}
