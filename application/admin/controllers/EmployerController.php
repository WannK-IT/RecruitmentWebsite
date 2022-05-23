<?php
class EmployerController extends Controller
{
	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		Session::init();
		Authentication::checkLogin();
	}

	public function accountAction()
	{
		$this->_view->setTitle('Quản lý thông tin tài khoản');
		if(!empty($_FILES)) $this->_arrParam['comp_logo'] = $_FILES['comp_logo'];
		// echo '<pre style="color: blue;">';
		// print_r($this->_arrParam);
		// echo '</pre>';
		// echo '<pre style="color: blue;">';
		// print_r($_SESSION);
		// echo '</pre>';
		$this->_view->employer = $this->_model->singleEmployer($this->_arrParam);
		
		$this->_view->render('employer/account', true);
	}

	public function updateAccountAction(){
        $this->_model->updateAccount($this->_arrParam);
	}

	public function updateCompanyAction(){
        $this->_model->updateCompany($this->_arrParam);
	}

	public function changePasswordAction(){
		$this->_model->changePassword($this->_arrParam);
	}


	// COMPANY
	public function companyAction()
	{
		$this->_view->setTitle('Quản lý thông tin công ty');
		$this->_view->company 		= $this->_model->singleCompany();
		$this->_view->listLocation 	= ['TP Hồ Chí Minh', 'Hà Nội', 'Đà Nẵng', 'Cần thơ', 'Hải Phòng'];
		$this->_view->listSize		= ['Dưới 10 người', '10 - 50 người', '50 - 200 người', '200 - 500 người', '500 - 1000 người', '1000 - 3000 người', 'Trên 3000 người'];
		$this->_view->listField		= ['IT', 'Marketing', 'Logistics', 'Business Management', 'Education', 'Personal Trainer'];
		$this->_view->render('employer/company', true);
	}
}
