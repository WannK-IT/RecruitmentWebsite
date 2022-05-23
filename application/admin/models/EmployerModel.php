<?php
class EmployerModel extends Model
{
	private $columnsAccount = ['emp_fullname', 'emp_phone', 'emp_email', 'emp_address'];
	private $columnsCompany = ['comp_location', 'comp_address', 'comp_field', 'comp_description'];

	public function __construct()
	{
		parent::__construct();
		$this->setTable('employer');
	}

	// Show list Employer
	public function singleEmployer($arrParams)
	{
		// require_once LIBRARY_EXT_PATH . 'Upload.php';
		// $fileUpload = new Upload();
		// $fileUpload->uploadFile(@$arrParams['comp_logo'], $_SESSION['login']['idUser']);
		$query[]	= "SELECT `emp_id`, `emp_email`, `emp_fullname`, `emp_user`, `emp_password`, `emp_phone`, `emp_address`, `comp_id`";
		$query[]	= "FROM `{$this->table}`";
		$query[]	= "WHERE `emp_id` = {$_SESSION['login']['idUser']}";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);
		return $result;
	}

	// Show list Company
	public function singleCompany()
	{
		$query[]	= "SELECT `c`.`comp_name`, `c`.`comp_location`, `c`.`comp_address`, `c`.`comp_description`, `c`.`comp_logo`, `c`.`comp_tax_id`, `c`.`comp_size`, `c`.`comp_field`, `c`.`comp_id`";
		$query[]	= "FROM `{$this->table}` AS `e`, `company` AS `c`";
		$query[]	= "WHERE `e`.`comp_id` = `c`.`comp_id`";
		$query[]	= "AND `c`.`comp_id` = {$_SESSION['login']['idCompany']}";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);
		return $result;
	}

	// Update info account
	public function updateAccount($arrParams){
		$dataAccount = array_intersect_key($arrParams, array_flip($this->columnsAccount));
		$this->update($dataAccount, [['emp_id', $_SESSION['login']['idUser']]]);
	}


	// Update info company
	public function updateCompany($arrParams){
		$dataCompany = array_intersect_key($arrParams, array_flip($this->columnsCompany));
		$this->updateOtherTable($dataCompany, 'company',[['comp_id', $_SESSION['login']['idCompany']]]);
	}


	// Change password account
	public function changePassword($arrParams){
		$query = "UPDATE `{$this->table}` SET `emp_password` = '".md5($arrParams['new_password'])."' WHERE `emp_id` = {$_SESSION['login']['idUser']}";
		$this->query($query);
	}
}
