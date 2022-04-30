<?php
class PostModel extends Model
{
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
		$data = $params;
		unset($data['pid']);
		unset($data['module']);
		unset($data['controller']);
		unset($data['action']);
		unset($data['submit_post']);
		unset($data['task']);

		
		$cols = $vals = "";
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$cols .= ",`{$key}`";
				$vals .= ",'$value'";
			}
			$cols = substr($cols, 1);
			$vals = substr($vals, 1);
			if($option == 'add'){
				$query = "INSERT INTO `{$this->table}` ({$cols}) VALUES ({$vals})";
			}elseif($option == 'edit'){
				$query = "UPDATE `{$this->table}` SET ({$cols}) = ({$vals}) WHERE `post_id` = '{$params['pid']}'";
			}
			$this->query($query);
			
		}
		
	}
}
