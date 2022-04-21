<?php
class PostController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	
	public function indexAction(){
		$this->_view->setTitle('Post');
		$this->_view->listPost = $this->_model->listPosts();
		$this->_view->totalPost = $this->_model->totalPost();
		$this->_view->render('post/index', true);
	}

	public function changeStatusAction(){
		$this->_model->changeStatus($this->_arrParam);
		$this->redirect('admin', 'post', 'index');
	}

	public function deleteAction(){
		$this->_model->deletePost($this->_arrParam);
		$this->redirect('admin', 'post', 'index');
	}
	
}