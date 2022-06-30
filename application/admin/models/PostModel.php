<?php
class PostModel extends Model
{
	private $columns = ['post_id', 'post_position', 'post_career', 'post_type_work', 'post_address_work', 'post_rank', 'post_amount', 'post_expired', 'post_exp', 'post_gender', 'post_degree', 'post_salary', 'post_test_work', 'post_work_description', 'post_work_required', 'post_work_benefit', 'post_work_apply', 'emp_id', 'emp_fullname', 'emp_email', 'emp_phone', 'emp_address', 'post_createdDate', 'post_isActive',];

	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TABLE);
	}

	// Show list post
	public function listPosts()
	{
		$query[]	= "SELECT  `p`.`post_id`,  `p`.`post_position`,  `p`.`post_createdDate`,  `p`.`post_expired`,  `p`.`post_amount`,  `p`.`post_isActive`, COUNT(`j`.`apply_id`) AS 'total'";
		$query[]	= "FROM `{$this->table}` AS `p`";
		$query[]	= "LEFT JOIN `apply_job` AS `j`";
		$query[]	= "ON `p`.`post_id` = `j`.`post_id`";
		$query[]	= "WHERE `emp_id` = '" . $_SESSION['login']['idUser'] . "'";
		$query[]	= "GROUP BY `p`.`post_id`";
		$query[]	= "ORDER BY `p`.`post_expired`";
		$query		= implode(" ", $query);
		$result		= $this->listRecord($query);
		return $result;
	}

	// Fetch single data table Post
	public function fetchSingle($params)
	{
		$query[]	= "SELECT *";
		$query[]	= "FROM `{$this->table}`";
		$query[]	= "WHERE `post_id` = '{$params['pid']}'";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);
		return $result;
	}

	// Count total post
	public function totalPost()
	{
		$query[] 	= "SELECT COUNT(`post_id`) AS 'totalPost'";
		$query[] 	= "FROM `{$this->table}`";
		$query[] 	= "WHERE `emp_id` = '" . $_SESSION['login']['idUser'] . "'";
		$query		= implode(" ", $query);

		$result		= $this->singleRecord($query);
		$result		= (empty($result)) ? 0 : $result['totalPost'];
		return $result;
	}

	public function countApplyProfile(){
		$query = "SELECT COUNT(`apply_id`) AS 'totalProfileApply' FROM `apply_job` WHERE `comp_id` = '".$_SESSION['login']['idCompany']."' GROUP BY 'totalProfileApply'";
		return $this->singleRecord($query);
	}

	public function countSaveProfile(){
		$query = "SELECT COUNT(`cv_id`) AS 'totalProfileSave' FROM `profilesaved` WHERE `emp_id` = '".$_SESSION['login']['idUser']."' GROUP BY 'totalProfileSave'";
		return $this->singleRecord($query);
	} 

	public function countNews(){
		$query = "SELECT COUNT(`news_id`) AS 'totalNews' FROM `news` WHERE `emp_id` = '".$_SESSION['login']['idUser']."' GROUP BY 'totalNews'";
		return $this->singleRecord($query);
	}

	public function changeStatus($params)
	{
		$id 	= $params['pid'];
		$status = ($params['status'] == 'inactive') ? 'active' : 'inactive';
		$query 	= "UPDATE `{$this->table}` SET `post_isActive` = '{$status}' WHERE `post_id` = '{$id}'";
		$this->query($query);

		return [$id, $status, URL::addLink('admin', 'post', 'changeStatus', ['status' => $status, 'pid' => $id])];
	}

	public function deletePost($params)
	{
		$id 	= ($params['pid']) ?? 0;
		$query 	= "DELETE FROM `{$this->table}` WHERE `post_id` = '".$id."'";
		$this->query($query);
		return $id;
	}

	public function getInfoEmp()
	{
		$query[] 	= "SELECT `emp_fullname`, `emp_email`, `emp_phone`, `emp_address`";
		$query[] 	= "FROM `employer`";
		$query[] 	= "WHERE `emp_id` = '" . $_SESSION['login']['idUser'] . "'";

		$query 		= implode(" ", $query);
		$result		= $this->singleRecord($query);
		return $result;
	}

	public function savePost($params, $option)
	{
		$params['emp_id'] = $_SESSION['login']['idUser'];
		$data = array_intersect_key($params, array_flip($this->columns));
		if (!empty($data)) {
			if ($option == 'add') {
				$this->insert($data);
			} elseif ($option == 'edit') {
				$this->update($data, [['post_id', $params['pid'], '']]);
			}
		}
	}

	// Avatar
	public function getAvatar()
	{
		$query[] 	= "SELECT `comp_logo`";
		$query[] 	= "FROM `company`";
		$query[] 	= "WHERE `comp_id` = '{$_SESSION['login']['idCompany']}'";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);

		return $result;
	}

	// Full name employer
	public function getFullName()
	{
		$query[] 	= "SELECT `emp_fullname`";
		$query[] 	= "FROM `employer`";
		$query[] 	= "WHERE `emp_id` = '{$_SESSION['login']['idUser']}'";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);

		return $result;
	}
}
