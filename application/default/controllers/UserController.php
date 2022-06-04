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
		$this->_view->level 	= ['default' => 'Chọn trình độ học vấn', 'Trên đại học', 'Đại học', 'Cao đẳng', 'Trung cấp', 'Trung học', 'Chứng chỉ', 'Khác'];
		$this->_view->gender 	= ['default' => 'Chọn giới tính', 'Nam', 'Nữ'];
		$this->_view->exp 		= ['Chưa có kinh nghiệm', 'Dưới 1 năm', '1 năm', '2 năm', '3 năm', '4 năm', '5 năm', 'Hơn 5 năm', 'Hơn 10 năm'];
		$this->_view->marriage 	= ['Độc thân', 'Đã kết hôn'];
		$this->_view->city 		= ['default' => 'Chọn tỉnh thành', 'An Giang', 'Kon Tum', 'Bà Rịa - Vũng Tàu', 'Lai Châu', 'Bắc Giang', 'Lâm Đồng', 'Bắc Kạn', 'Lạng Sơn', 'Bạc Liêu', 'Lào Cai', 'Bắc Ninh', 'Long An', 'Bến Tre', 'Nam Định', 'Bình Định', 'Nghệ An', 'Bình Dương', 'Ninh Bình', 'Bình Phước', 'Ninh Thuận', 'Bình Thuận', 'Phú Thọ', 'Cà Mau', 'Phú Yên', 'Cần Thơ', 'Quảng Bình', 'Cao Bằng', 'Quảng Nam', 'Đà Nẵng', 'Quảng Ngãi', 'Đắk Lắk', 'Quảng Ninh', 'Đắk Nông', 'Quảng Trị', 'Điện Biên', 'Sóc Trăng', 'Đồng Nai', 'Sơn La', 'Đồng Tháp', 'Tây Ninh', 'Gia Lai', 'Thái Bình', 'Hà Giang', 'Thái Nguyên', 'Hà Nam', 'Thanh Hóa', 'Hà Nội', 'Thừa Thiên Huế', 'Hà Tĩnh', 'Tiền Giang', 'Hải Dương', 'TP Hồ Chí Minh', 'Hải Phòng', 'Trà Vinh', 'Hậu Giang', 'Tuyên Quang', 'Hòa Bình', 'Vĩnh Long', 'Hưng Yên', 'Vĩnh Phúc', 'Khánh Hòa', 'Yên Bái', 'Kiên Giang'];
		$this->_view->career 	= ['default' => 'Chọn ngành nghề', 'Công nghệ thực phẩm', 'Công nghệ chế biến thủy sản', 'Kỹ thuật dệt', 'Kiến trúc', 'Kinh tế và quản lý đô thị', 'Kỹ thuật công trình biển', 'Kỹ thuật xây dựng', 'Kinh tế xây dựng', 'Quản lý xây dựng', 'Kỹ thuật xây dựng công trình giao thông', 'Công nghệ kỹ thuật công trình xây dựng', 'Nhân sự', 'Thủy lợi ', 'Quản trị kinh doanh', 'Quản trị dịch vụ du lịch và lữ hành', 'Quản trị khách sạn', 'Marketing', 'Bất động sản', 'Kinh doanh quốc tế', 'Kế toán', 'Kiểm toán', 'Quản trị nhân lực', 'Hệ thống thông tin quản lý', 'Quản trị văn phòng', 'Khoa học máy tính', 'Truyền thông đa phương tiện', 'Công nghệ thông tin', 'Nhóm ngành luật', 'Việt nam học', 'Ngôn ngữ Anh', 'Ngôn ngữ Pháp', 'Ngôn ngữ Trung', 'Ngôn ngữ Quốc Tế Học', 'Đông Phương Học', 'Triết học', 'Văn học', 'Văn hóa học', 'Quản lý văn hóa', 'Quản lý thể dục thể thao', 'Hội họa', 'Thiết kế công nghiệp', 'Thiết kế đồ họa', 'Thiết kế thời trang', 'Thiết kế nội thất', 'Kinh tế học', 'Chính trị học', 'Tâm lý học', 'Báo chí', 'Truyền thông đa phương tiện', 'Công nghệ truyền thông', 'Quan hệ công chúng', 'Công nghệ sinh học', 'Khoa học vật liệu', 'địa chất học', 'Quản lý giáo dục', 'Giáo dục thể chất', 'Huấn luyện thể thao', 'Giáo dục quốc phòng – an ninh', 'Nhóm ngành sư phạm', 'Nông nghiệp', 'Kinh tế nông nghiệp'];
		$this->_view->rank 		= ['default' => 'Chọn cấp bậc', 'Trưởng nhóm', 'Phó giám đốc', 'Trưởng phòng', 'Phó phòng', 'Trưởng chi nhánh', 'Nhân viên', 'Thực tập sinh', 'Quản lý', 'Cộng tác viên', 'Trưởng dự án'];
		$this->_view->salary 	= ['Thỏa thuận', '1 - 3 triệu', '3 - 5 triệu', '5 - 7 triệu', '7 - 10 triệu', '10 - 12 triệu', '12 - 15 triệu', '15 - 20 triệu', '20 - 25 triệu', '25 - 30 triệu', '30 - 40 triệu', 'Trên 40 triệu'];
		$this->_view->typeWork 	= ['default' => 'Chọn hình thức làm việc', 'Toàn thời gian tạm thời', 'Toàn thời gian cố định', 'Bán thời gian tạm thời', 'Bán thời gian cố định', 'Theo thỏa thuận hợp đồng', 'Khác'];

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
