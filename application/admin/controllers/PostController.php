<?php
class PostController extends Controller
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

		// AVATAR 
		$avatar = $this->_model->getAvatar();
		if(empty($avatar['comp_logo'])){
			$avatar['comp_logo'] = $this->_view->_dirImg . 'logoAdmin.png';
		}else{
			$avatar['comp_logo'] = UPLOAD_URL_ADMIN . 'img' . DS . $_SESSION['login']['idUser'] . DS . $avatar['comp_logo'];
		}
		$this->_view->avatarLogo = $avatar['comp_logo'];

		$this->_view->fullNameEmployer = $this->_model->getFullName();
	}

	public function indexAction()
	{
		$this->_view->setTitle('Quản lý đăng tuyển');
		$this->_view->listPost = $this->_model->listPosts();
		$this->_view->render('post/index', true);
	}

	public function changeStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam);
		echo json_encode($result);
	}

	public function ajaxDeleteAction()
	{
		$result  = $this->_model->deletePost($this->_arrParam);
		echo json_encode($result);
	}

	public function formPostAction()
	{
		$this->_view->setTitle('Tạo tin đăng tuyển');
		$this->_view->dataEmp = $this->_model->getInfoEmp();
		if ($this->_arrParam['task'] == 'edit'){
			$this->_view->dataPost = $this->_model->fetchSingle($this->_arrParam);
			$this->_view->setTitle('Chỉnh sửa tin đăng tuyển');
		}
		
		if (isset($this->_arrParam['submit_post'])) {
			if ($this->_arrParam['task'] == 'add') {
				$this->_model->savePost($this->_arrParam, $option = 'add');
				$_SESSION['add_success'] = true;
			}elseif($this->_arrParam['task'] == 'edit'){
				$this->_model->savePost($this->_arrParam, $option = 'edit');
				$_SESSION['edit_success'] = true;
			}
			$this->redirect("admin", "post", "index");
			ob_end_flush(); // fix Cannot modify header information 
		}
		$this->_view->render('post/form', true);
	}

	public function previewPostAction(){
		$this->_view->setTitle('Quản lý đăng tuyển');
		$this->_view->previewPost = $this->_model->fetchSingle($this->_arrParam);
		$this->_view->render('post/preview', true);
	}

	public function totalPostAction(){
		$result = $this->_model->totalPost();
		echo json_encode($result);
	}
}
