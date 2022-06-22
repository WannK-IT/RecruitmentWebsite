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
        $_SESSION['loginAdminSuccess'] = true;
        echo $result;
    }

    public function registerAction()
    {
        $this->_view->listLocation     = ['default' => 'Chọn địa điểm', 'TP Hồ Chí Minh', 'Hà Nội', 'Đà Nẵng', 'Cần thơ', 'Hải Phòng'];
        $this->_view->listSize        = ['default' => 'Chọn quy mô nhân sự', 'Dưới 10 nhân viên', '10 - 50 nhân viên', '50 - 200 nhân viên', '200 - 500 nhân viên', '500 - 1000 nhân viên', '1000 - 3000 nhân viên', 'Trên 3000 nhân viên'];
        $this->_view->listField        = ['default' => 'Chọn lĩnh vực', 'IT', 'Marketing', 'Logistics', 'Business Management', 'Education', 'Personal Trainer'];

        $this->_view->setTitle('Đăng ký');
        if (@$this->_arrParam['token'] > 0) {
            $this->_model->register($this->_arrParam);
            $this->redirect('admin', 'account', 'login');
        }
        $this->_view->render('account/register', true);
    }

    public function checkExistAccountAction()
    {
        $result = $this->_model->checkExistAccount($this->_arrParam);
        echo $result;
    }

    public function logoutAccountAction()
    {
        Session::delete('login');
        URL::direct('admin', 'account', 'login');
    }
}
