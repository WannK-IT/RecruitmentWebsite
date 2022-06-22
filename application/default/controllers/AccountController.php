<?php
class AccountController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/');
		$this->_templateObj->setFileTemplate('account.php');
        $this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle('JobHT - Việc làm cho mọi ngành nghề !');
		Session::init();
	}

	public function loginAction()
	{
		$this->_view->render('account/login', true);
	}

	public function registerAction()
	{
		if(@$this->_arrParam['token'] > 0){
			$this->_model->register($this->_arrParam);
			$this->redirect('default', 'account', 'login');
		}
		$this->_view->render('account/register', true);
	}

	public function checkExistUsernameAction()
    {
        $result = $this->_model->checkExistUsername($this->_arrParam);
        echo json_encode($result);
    }

	public function checkExistEmailAction()
    {
        $result = $this->_model->checkExistEmail($this->_arrParam);
        echo json_encode($result);
    }

	public function loginUserAction()
    {
        $result =  $this->_model->login($this->_arrParam);
		$_SESSION['default']['userLoginSuccess'] = true;
        echo json_encode($result);
    }

	public function logoutAction(){
		unset($_SESSION['loginDefault']);
		$this->redirect('default', 'index', 'index');
	}


	
}
