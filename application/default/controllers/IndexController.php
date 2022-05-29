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
	}

	public function indexAction()
	{
		$this->_view->jobs = $this->_model->listItems();
		$this->_view->render('index/index', true);
	}

	public function viewjobAction(){
		$this->_view->infoJob = $this->_model->infoItemView($this->_arrParam);
		$this->_view->render('index/viewjob', true);
	}

	
}
