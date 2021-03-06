<?php
class CareerController extends Controller
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
				$avatar['user_avatar'] 		= $this->_view->_dirImg . 'logo_default_male.png';
			} else {
				$avatar['user_avatar'] 		= UPLOAD_URL_DEFAULT . 'img' . DS . $_SESSION['loginDefault']['idUser'] . DS . $avatar['user_avatar'];
			}
			$this->_view->avatarLogo 		= $avatar['user_avatar'];
			$this->_view->fullNameDefault 	= $this->_model->getFullName();
		}
	}

	public function indexAction()
	{
		$this->_view->careers 		= ['Tất cả ngành nghề', 'Công nghệ thực phẩm', 'Công nghệ chế biến thủy sản', 'Kỹ thuật dệt', 'Kiến trúc', 'Kinh tế và quản lý đô thị', 'Kỹ thuật công trình biển', 'Kỹ thuật xây dựng', 'Kinh tế xây dựng', 'Quản lý xây dựng', 'Kỹ thuật xây dựng công trình giao thông', 'Công nghệ kỹ thuật công trình xây dựng', 'Nhân sự', 'Thủy lợi ', 'Quản trị kinh doanh', 'Quản trị dịch vụ du lịch và lữ hành', 'Quản trị khách sạn', 'Marketing', 'Bất động sản', 'Kinh doanh quốc tế', 'Kế toán', 'Kiểm toán', 'Quản trị nhân lực', 'Hệ thống thông tin quản lý', 'Quản trị văn phòng', 'Khoa học máy tính', 'Truyền thông đa phương tiện', 'Công nghệ thông tin', 'Nhóm ngành luật', 'Việt nam học', 'Ngôn ngữ Anh', 'Ngôn ngữ Pháp', 'Ngôn ngữ Trung', 'Ngôn ngữ Quốc Tế Học', 'Đông Phương Học', 'Triết học', 'Văn học', 'Văn hóa học', 'Quản lý văn hóa', 'Quản lý thể dục thể thao', 'Hội họa', 'Thiết kế công nghiệp', 'Thiết kế đồ họa', 'Thiết kế thời trang', 'Thiết kế nội thất', 'Kinh tế học', 'Chính trị học', 'Tâm lý học', 'Báo chí', 'Truyền thông đa phương tiện', 'Công nghệ truyền thông', 'Quan hệ công chúng', 'Công nghệ sinh học', 'Khoa học vật liệu', 'địa chất học', 'Quản lý giáo dục', 'Giáo dục thể chất', 'Huấn luyện thể thao', 'Giáo dục quốc phòng - an ninh', 'Nhóm ngành sư phạm', 'Nông nghiệp', 'Kinh tế nông nghiệp'];

		$this->_view->cities 		= ['Tất cả tỉnh thành', 'An Giang', 'Kon Tum', 'Bà Rịa - Vũng Tàu', 'Lai Châu', 'Bắc Giang', 'Lâm Đồng', 'Bắc Kạn', 'Lạng Sơn', 'Bạc Liêu', 'Lào Cai', 'Bắc Ninh', 'Long An', 'Bến Tre', 'Nam Định', 'Bình Định', 'Nghệ An', 'Bình Dương', 'Ninh Bình', 'Bình Phước', 'Ninh Thuận', 'Bình Thuận', 'Phú Thọ', 'Cà Mau', 'Phú Yên', 'Cần Thơ', 'Quảng Bình', 'Cao Bằng', 'Quảng Nam', 'Đà Nẵng', 'Quảng Ngãi', 'Đắk Lắk', 'Quảng Ninh', 'Đắk Nông', 'Quảng Trị', 'Điện Biên', 'Sóc Trăng', 'Đồng Nai', 'Sơn La', 'Đồng Tháp', 'Tây Ninh', 'Gia Lai', 'Thái Bình', 'Hà Giang', 'Thái Nguyên', 'Hà Nam', 'Thanh Hóa', 'Hà Nội', 'Thừa Thiên Huế', 'Hà Tĩnh', 'Tiền Giang', 'Hải Dương', 'TP Hồ Chí Minh', 'Hải Phòng', 'Trà Vinh', 'Hậu Giang', 'Tuyên Quang', 'Hòa Bình', 'Vĩnh Long', 'Hưng Yên', 'Vĩnh Phúc', 'Khánh Hòa', 'Yên Bái', 'Kiên Giang'];

		$this->_view->type_work 	= ['Loại công việc', 'Toàn thời gian tạm thời', 'Toàn thời gian cố định', 'Bán thời gian tạm thời', 'Bán thời gian cố định', 'Theo thỏa thuận hợp đồng', 'Khác'];
		$this->_view->listCareers 	= $this->_model->listCareers($this->_arrParam);
		$this->_view->totalCareer 	= $this->_model->totalCareer($this->_arrParam);
		$this->_view->render('career/index', true);
	}

	public function viewCareerAction()
	{
		$this->_view->infoJob = $this->_model->infoItemCareer($this->_arrParam);
		if (Authentication::checkLoginDefault() == true) {
			$this->_view->infoCandidate 	= $this->_model->infoCandidate();
			$this->_view->infoCV			= $this->_model->infoCV();
			$this->_view->checkApply		= $this->_model->checkApply($this->_arrParam);
			$this->_view->checkFollow		= $this->_model->checkFollow($this->_arrParam);
			$check = $this->_view->checkApply;

			if (isset($this->_arrParam['applyJob'])) {
				$result = $this->_model->checkExistProfile($this->_arrParam);
				if ($check == 'not applied') {
					$dataApply['user_id'] 		= $_SESSION['loginDefault']['idUser'];
					$dataApply['comp_id'] 		= $this->_arrParam['comp_id'];
					$dataApply['cv_id'] 		= $this->_arrParam['cv_id'];
					$dataApply['post_id'] 		= $this->_arrParam['idPost'];
					$dataApply['introduction'] 	= $this->_arrParam['introduction'];
					$dataApply['action'] 		= 'Chờ duyệt';

					switch ($this->_arrParam['profileApply']) {
						case 'profile':
							if (empty($result['position'])) {
								$_SESSION['default']['checkExistProfile'] = true;
								URL::direct('default', 'career', 'viewcareer', ['idPost' => $this->_arrParam['idPost']]);
							} else {
								$dataApply['type_apply'] = $this->_arrParam['profileApply'];
							}
							break;

						case 'cv':
							if (empty($result['fileCV'])) {
								$_SESSION['default']['checkExistCV'] = true;
								URL::direct('default', 'career', 'viewcareer', ['idPost' => $this->_arrParam['idPost']]);
							} else {
								$dataApply['type_apply'] = $this->_arrParam['profileApply'];
							}
							break;
					}

					$dataApply['date_apply'] 	= date('Y/m/d H:i:s');
					$this->_model->applyJob($dataApply);
					$_SESSION['default']['applyJobSuccess'] = true;
					URL::direct('default', 'career', 'success_apply', ['idPost' => $this->_arrParam['idPost'], 'idComp' => $this->_arrParam['comp_id']]);
				}
			}
		}

		$this->_view->render('career/viewcareer', true);
	}

	public function success_applyAction()
	{
		$this->_view->infoApply = $this->_model->infoApply($this->_arrParam);
		$this->_view->render('career/success_apply', true);
	}

	public function followJobAction(){
		$result = $this->_model->followJob($this->_arrParam);
		echo json_encode($result);
	}

}
