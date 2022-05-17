<?php
class PostModel extends Model
{
	private $columns = ['post_id', 'post_position', 'post_career', 'post_type_work', 'post_address_work', 'post_rank', 'post_amount', 'post_expired', 'post_exp', 'post_gender', 'post_degree', 'post_salary', 'post_test_work', 'post_work_description', 'post_work_required', 'post_work_benefit', 'post_work_apply', 'emp_id', 'emp_fullname', 'emp_email', 'emp_phone', 'emp_address', 'post_createdDate', 'post_isActive',];

	public function __construct()
	{
		parent::__construct();
		$this->setTable('post');
	}

	// Show list post
	public function listPosts()
	{
		$query[]	= "SELECT `post_id`, `post_position`, `post_createdDate`, `post_expired`, `post_amount`, `post_isActive`";
		$query[]	= "FROM `{$this->table}`";
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
