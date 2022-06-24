<?php
class NewsController extends Controller
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
		if (empty($avatar['comp_logo'])) {
			$avatar['comp_logo'] = $this->_view->_dirImg . 'logoAdmin.png';
		} else {
			$avatar['comp_logo'] = UPLOAD_URL_ADMIN . 'img' . DS . $_SESSION['login']['idUser'] . DS . $avatar['comp_logo'];
		}
		$this->_view->avatarLogo = $avatar['comp_logo'];

		$this->_view->fullNameEmployer = $this->_model->getFullName();
	}

	public function formNewsAction()
	{
		$this->_view->setTitle('Thêm tin tức');
		if ($this->_arrParam['taskNews'] == 'edit') {
			$this->_view->setTitle('Cập nhật tin tức');
			$this->_view->infoNews = $this->_model->singleNews($this->_arrParam);
		}

		if (isset($this->_arrParam['submit_news'])) {
			if (!empty($_FILES['news_thumbnail'])) $this->_arrParam['news_thumbnail'] = $_FILES['news_thumbnail'];
			if ($this->_arrParam['taskNews'] == 'add') {
				$this->_model->saveNews($this->_arrParam, 'add');
			} elseif ($this->_arrParam['taskNews'] == 'edit') {
				$this->_model->saveNews($this->_arrParam, 'edit');
			}
			$this->redirect('admin', 'news', 'listNews');
		}

		$this->_view->render('news/form', true);
	}

	public function listNewsAction()
	{
		$this->_view->setTitle('Quản lý tin tức');
		$this->_view->listNews 	= $this->_model->listNews();
		$this->_view->total		= $this->_model->totalNews();
		$this->_view->render('news/list', true);
	}

	public function ajaxDeleteAction()
	{
		$result  = $this->_model->deleteNews($this->_arrParam);
		echo json_encode($result);
	}

	public function changeStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam);
		echo json_encode($result);
	}

	public function previewNewsAction(){
		$this->_view->setTitle('Quản lý tin tức');
		$this->_view->infoNews = $this->_model->singleNews($this->_arrParam);
		$this->_view->employer = $this->_model->getEmployer();
		$this->_view->render('news/preview', true);
	}
}
