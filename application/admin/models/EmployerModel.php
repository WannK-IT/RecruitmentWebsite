<?php
class EmployerModel extends Model
{

	public function __construct()
	{
		parent::__construct();
		$this->setTable('employer');
	}

	// Show list Employer
	public function singleEmployer()
	{
		$query[]	= "SELECT `emp_id`, `emp_email`, `emp_fullname`, `emp_user`, `emp_password`, `emp_phone`, `emp_address`, `comp_id`";
		$query[]	= "FROM `{$this->table}`";
		$query[]	= "WHERE `emp_id` = 1";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);
		return $result;
	}

	// Show list Company
	public function singleCompany()
	{
		$query[]	= "SELECT `c`.`comp_name`, `c`.`comp_location`, `c`.`comp_address`, `c`.`comp_description`, `c`.`comp_logo`, `c`.`comp_tax_id`, `c`.`comp_size`, `c`.`comp_field`, `c`.`comp_id`";
		$query[]	= "FROM `{$this->table}` AS `e`, `company` AS `c`";
		$query[]	= "WHERE `e`.`comp_id` = `c`.`comp_id` AND `emp_id` = 1";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);
		return $result;
	}

	public function login($params){
		$query[]	= "SELECT `emp_user`, `emp_password`, `emp_fullname`";
		$query[]	= "FROM `{$this->table}`";
		$query[]	= "WHERE `emp_user` = '{$params['emp_user']}' AND `emp_password` = '{$params['emp_password']}'";
		$query		= implode(" ", $query);

		// Query to load information of employer
		$loadInfo	= $this->singleRecord($query);

		// Check username & password exist
		if($this->isExist($query) == true){
			$result = 'success';
			Session::set('loginSuccess', true);
			Session::set('loginFullname', $loadInfo['emp_fullname']);
		}else{
			$result = 'failed';
		}
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
		$query[] = "SELECT COUNT(`post_id`) AS 'total'";
		$query[] = "FROM `{$this->table}`";
		$query		= implode(" ", $query);

		$result		= $this->singleRecord($query);
		return $result;
	}

	public function changeStatus($params)
	{
		$id = $params['pid'];
		$status = ($params['status'] == 'inactive') ? 'active' : 'inactive';
		$query = "UPDATE `{$this->table}` SET `post_isActive` = '{$status}' WHERE `post_id` = '{$id}'";
		$this->query($query);

		return [$id, $status, URL::addLink('admin', 'post', 'changeStatus', ['status' => $status, 'pid' => $id])];
	}

	public function deletePost($params)
	{
		$id = ($params['pid']) ?? 0;
		$query = "DELETE FROM `{$this->table}` WHERE `post_id` IN ('" . $id . "')";
		$this->query($query);
		return $id;
	}

	public function savePost($params, $option)
	{
		$data = array_intersect_key($params, array_flip($this->columns));
		if (!empty($data)) {
			if ($option == 'add') {
				$this->insert($data);
			} elseif ($option == 'edit') {
				$this->update($data, [['post_id', $params['pid'], '']]);
			}
		}
	}
}
