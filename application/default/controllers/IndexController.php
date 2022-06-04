<?php
class IndexController extends Controller
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
				$avatar['user_avatar'] = $this->_view->_dirImg . 'logo_default.png';
			} else {
				$avatar['user_avatar'] = UPLOAD_URL_DEFAULT . 'img' . DS . $_SESSION['loginDefault']['idUser'] . DS . $avatar['user_avatar'];
			}
			$this->_view->avatarLogo = $avatar['user_avatar'];
		}
	}

	public function indexAction()
	{
		$this->_view->jobs = $this->_model->listItems();
		$this->_view->render('index/index', true);
	}

}
