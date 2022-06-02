<?php
class CandidateController extends Controller
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

    public function indexAction()
    {
        $this->_view->setTitle('Tìm ứng viên');
        $this->_view->render('candidate/index', true);
    }

    public function profileAction()
    {
        $this->_view->setTitle('Tìm ứng viên');
        $this->_view->render('candidate/profile', true);
    }

}
