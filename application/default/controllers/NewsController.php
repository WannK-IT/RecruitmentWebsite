<?php
class NewsController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle('JobHT - Việc làm cho mọi ngành nghề !');
		Session::init();

		// AVATAR 
		if (Authentication::checkLoginDefault() == true) {
			$avatar = $this->_model->getAvatar();
			if (empty($avatar['user_avatar'])) {
				$avatar['user_avatar'] = $this->_view->_dirImg . 'logo_default_male.png';
			} else {
				$avatar['user_avatar'] = UPLOAD_URL_DEFAULT . 'img' . DS . $_SESSION['loginDefault']['idUser'] . DS . $avatar['user_avatar'];
			}
			$this->_view->avatarLogo = $avatar['user_avatar'];
			$this->_view->fullNameDefault = $this->_model->getFullName();
		}

		$this->_view->relatedNews = $this->_model->listNews($this->_arrParam, 'relate');
	}

	public function indexAction()
	{
		$this->_view->news = $this->_model->listNews($this->_arrParam, 'list');
		$this->_view->render('news/index', true);
	}

	public function postAction()
	{
		$this->_view->post = $this->_model->listNews($this->_arrParam,'post');
		$this->_view->render('news/post', true);
	}
}
