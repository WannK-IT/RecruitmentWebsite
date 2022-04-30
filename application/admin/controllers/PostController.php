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
	}

	public function indexAction()
	{
		$this->_view->setTitle('Quản lý đăng tuyển');
		$this->_view->listPost = $this->_model->listPosts();
		$this->_view->totalPost = $this->_model->totalPost();
		$this->_view->render('post/index', true);
	}

	public function changeStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam);
		echo json_encode($result);
		// $this->redirect('admin', 'post', 'index');
	}

	public function ajaxDeleteAction()
	{
		$result  = $this->_model->deletePost($this->_arrParam);
		echo json_encode($result);
		// $this->redirect('admin', 'post', 'index');
	}

	public function formPostAction()
	{
		$this->_view->render('post/form', true);
		if (isset($_POST['submit_post'])) {
			if ($_GET['task'] == 'add') {
				$this->_model->savePost($this->_arrParam, $option = 'add');
				$this->redirect("admin", "post", "index");
				ob_end_flush(); // fix Cannot modify header information 
			} elseif ($_GET['task'] == 'edit') {
				$this->_model->savePost($this->_arrParam, $option = 'edit');
				$this->redirect("admin", "post", "index");
				ob_end_flush(); // fix Cannot modify header information 
			}
		}
	}
}
