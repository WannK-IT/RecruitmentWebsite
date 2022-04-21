<?php
class PostModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable('post');
	}

	// Show list post
	public function listPosts(){
		$query[]	= "SELECT `post_id`, `post_title`, `post_created_date`, `post_expired_date`, `applyAmount`, `post_isActive`";
		$query[]	= "FROM `post`";
		$query		= implode(" ", $query);
		$result		= $this->listRecord($query);
		return $result;
	}

	// Count total post
	public function totalPost(){
		$query[] = "SELECT COUNT(`post_id`) AS 'total'";
		$query[] = "FROM `post`";
		$query		= implode(" ", $query);

		$result		= $this->singleRecord($query);
		return $result;
	}

	public function changeStatus($params){
		$id = $params['pid'];
		$status = ($params['status'] == 'inactive') ? 'active' : 'inactive';
		$query = "UPDATE `post` SET `post_isActive` = '$status' WHERE `post_id` = '$id'";
		$this->query($query);
	}

	public function deletePost($params){
		$id = ($params['pid']) ?? 0;
		$query = "DELETE FROM `post` WHERE `post_id` IN ('".$id."')";
		$this->query($query);
	}


}
