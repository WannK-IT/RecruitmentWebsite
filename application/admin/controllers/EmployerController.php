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
	}

	public function accountAction()
	{
		$this->_view->setTitle('Quản lý tài khoản');
		$this->_view->employer = $this->_model->singleEmployer();
		$this->_view->render('employer/account', true);
	}

	public function companyAction()
	{
		$this->_view->setTitle('Quản lý công ty');
		$this->_view->company = $this->_model->singleCompany();
		$this->_view->render('employer/company', true);
	}

	public function loginAction()
	{
		$this->_templateObj->setFolderTemplate('admin/');
		$this->_templateObj->setFileTemplate('login.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_view->setTitle('Đăng nhập');
		$this->_view->render('employer/login', true);
	}

	public function loginAccountAction()
	{
		$result =  $this->_model->login($this->_arrParam);
		echo $result;
	}

	public function logoutAccountAction(){
		Session::delete('loginSuccess');
		URL::direct('admin', 'employer', 'login');
	}

	// public function changeStatusAction()
	// {
	// 	$result = $this->_model->changeStatus($this->_arrParam);
	// 	echo json_encode($result);
	// 	// $this->redirect('admin', 'post', 'index');
	// }

	// public function ajaxDeleteAction()
	// {
	// 	$result  = $this->_model->deletePost($this->_arrParam);
	// 	echo json_encode($result);
	// 	// $this->redirect('admin', 'post', 'index');
	// }

	// public function formPostAction()
	// {
	// 	$this->_view->setTitle('Tạo tin đăng tuyển');
	// 	if ($this->_arrParam['task'] == 'edit'){
	// 		$this->_view->dataPost = $this->_model->fetchSingle($this->_arrParam);
	// 		$this->_view->setTitle('Chỉnh sửa tin đăng tuyển');
	// 	}

	// 	if (isset($this->_arrParam['submit_post'])) {
	// 		if ($this->_arrParam['task'] == 'add') {
	// 			$this->_model->savePost($this->_arrParam, $option = 'add');
	// 			$_SESSION['add_success'] = true;
	// 		}elseif($this->_arrParam['task'] == 'edit'){
	// 			$this->_model->savePost($this->_arrParam, $option = 'edit');
	// 			$_SESSION['edit_success'] = true;
	// 		}
	// 		$this->redirect("admin", "post", "index");
	// 		ob_end_flush(); // fix Cannot modify header information 
	// 	}
	// 	$this->_view->render('post/form', true);
	// }

	// public function previewPostAction(){
	// 	$this->_view->setTitle('Quản lý đăng tuyển');
	// 	$this->_view->previewPost = $this->_model->fetchSingle($this->_arrParam);
	// 	$this->_view->render('post/preview', true);
	// }
}
