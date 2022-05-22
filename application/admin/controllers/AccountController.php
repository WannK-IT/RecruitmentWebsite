<?php
class AccountController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('admin/');
        $this->_templateObj->setFileTemplate('account.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
        Session::init();
    }

    public function loginAction()
    {
        $this->_view->setTitle('Đăng nhập');
        $this->_view->render('account/login', true);
    }

    public function loginAccountAction()
    {
        $result =  $this->_model->login($this->_arrParam);
        echo $result;
    }

    public function registerAction(){
        $this->_view->listLocation 	= ['default' => 'Chọn địa điểm', 'TP Hồ Chí Minh', 'Hà Nội', 'Đà Nẵng', 'Cần thơ', 'Hải Phòng'];
		$this->_view->listSize		= ['default' => 'Chọn quy mô nhân sự', 'Dưới 10 người', '10 - 50 người', '50 - 200 người', '200 - 500 người', '500 - 1000 người', '1000 - 3000 người', 'Trên 3000 người'];
		$this->_view->listField		= ['default' => 'Chọn lĩnh vực', 'IT', 'Marketing', 'Logistics', 'Business Management', 'Education', 'Personal Trainer'];

        $this->_view->setTitle('Đăng ký');
        if(isset($this->_arrParam['btn_register'])){
            $this->_model->register($this->_arrParam);
            $this->redirect('admin', 'account', 'login');
        }
        $this->_view->render('account/register', true);
    }

    public function checkExistAccountAction(){
        $result = $this->_model->checkExistAccount($this->_arrParam);
        echo $result;
    }

    public function logoutAccountAction()
    {
        Session::delete('login');
        URL::direct('admin', 'account', 'login');
    }



}
