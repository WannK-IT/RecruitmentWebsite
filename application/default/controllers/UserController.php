<?php
class UserController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle('Trang cá nhân - JobHT');
		Session::init();

		if (Authentication::checkLoginDefault() == false) {
			URL::direct('default', 'index', 'index');
		}

		// AVATAR 
		$avatar = $this->_model->getAvatar();
		if(empty($avatar['user_avatar'])){
			$avatar['user_avatar'] = $this->_view->_dirImg . 'logo_default.png';
		}else{
			$avatar['user_avatar'] = UPLOAD_URL_DEFAULT . 'img' . DS . $_SESSION['loginDefault']['idUser'] . DS . $avatar['user_avatar'];
		}
		$this->_view->avatarLogo = $avatar['user_avatar'];
	}

	public function indexAction()
	{
		// Xử lý phần logo nhà tuyển dụng
		if (!empty($_FILES)) $this->_arrParam['user_avatar'] = $_FILES['user_avatar'];
		if (isset($this->_arrParam['user_avatar']) && $this->_arrParam['user_avatar']['error'] == 0) {
			$this->_model->changePicture($this->_arrParam);
			$this->redirect($this->_arrParam['module'], $this->_arrParam['controller'], 'index');
		}
		$this->_view->info = $this->_model->infoBasic();
		$this->_view->render('user/index', true);
	}

	public function profileAction(){
		$this->_view->level 	= ['default' => 'Chọn', 'Lao động phổ thông', 'Trung học', 'Trung cấp', 'Cao đẳng', 'Đại học', 'Kỹ sư', 'Cử nhân', 'Thạc sĩ', 'Tiến sĩ', 'Khác'];
		$this->_view->gender 	= ['default' => 'Chọn', 'Nam', 'Nữ'];
		$this->_view->exp 		= ['Chưa có kinh nghiệm', '1 năm', '2 năm', '3 năm', '4 năm', '5 năm', 'Trên 5 năm'];
		$this->_view->marriage 	= ['Độc thân', 'Đã kết hôn'];
		$this->_view->city 		= ['default' => 'Chọn', 'TP Hồ Chí Minh', 'Đà Nẵng', 'Hải Phòng', 'Cần Thơ', 'Hà Tĩnh', 'Hà Nội', 'Đà Lạt', 'Vũng Tàu'];
		$this->_view->career 	= ['default' => 'Chọn', 'IT - Phần cứng', 'IT - Phần mềm', 'Quản trị kinh doanh', 'Bất động sản', 'Quản trị du lịch - nhà hàng - khách sạn', 'Giáo dục', 'Kiến trúc', 'Marketing', 'Truyền thông', 'Nhân sự', 'Tài chính/Đầu tư'];
		$this->_view->rank 		= ['default' => 'Chọn', 'Nhân viên', 'Trưởng nhóm', 'Phó phòng', 'Trưởng phòng', 'Phó giám đốc', 'Giám đốc', 'Trưởng chi nhánh', 'Thực tập sinh', 'Quản lý/Giám sát'];
		$this->_view->salary 	= ['Thỏa thuận', '1 - 3 triệu', '3 - 5 triệu', '5 - 7 triệu', '7 - 10 triệu', '10 - 12 triệu', '12 - 15 triệu', '15 - 20 triệu', '20 - 25 triệu', '25 - 30 triệu', '30 - 40 triệu', 'Trên 40 triệu'];
		$this->_view->typeWork 	= ['default' => 'Chọn', 'Toàn thời gian', 'Bán thời gian', 'Thực tập', 'Theo hợp đồng', 'Khác'];

		$this->_view->info = $this->_model->infoProfile($this->_arrParam);
		if(isset($this->_arrParam['token']) && $this->_arrParam['token'] > 0){
			$this->_model->updateProfile($this->_arrParam);
			$this->redirect('default', 'user', 'profile');
		}
		$this->_view->render('user/profile', true);
	}

	public function changePasswordAction(){
		$this->_view->render('user/changePassword', true);
	}

	public function checkExistEmailAction()
	{
		$result = $this->_model->checkExistEmail($this->_arrParam);
		echo json_encode($result);
	}

	public function checkExistPasswordAction(){
		$result = $this->_model->checkExistPassword($this->_arrParam);
		echo json_encode($result);
	}

	public function updateBasicInfoAction()
	{
		$this->_model->updateBasicInfo($this->_arrParam);
	}

	public function updatePasswordAction(){
		$this->_model->updatePassword($this->_arrParam);
	}
}
