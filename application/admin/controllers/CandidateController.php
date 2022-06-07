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
        $this->_view->career = ['Tất cả ngành nghề', 'Công nghệ thực phẩm', 'Công nghệ chế biến thủy sản', 'Kỹ thuật dệt', 'Kiến trúc', 'Kinh tế và quản lý đô thị', 'Kỹ thuật công trình biển', 'Kỹ thuật xây dựng', 'Kinh tế xây dựng', 'Quản lý xây dựng', 'Kỹ thuật xây dựng công trình giao thông', 'Công nghệ kỹ thuật công trình xây dựng', 'Nhân sự', 'Thủy lợi ', 'Quản trị kinh doanh', 'Quản trị dịch vụ du lịch và lữ hành', 'Quản trị khách sạn', 'Marketing', 'Bất động sản', 'Kinh doanh quốc tế', 'Kế toán', 'Kiểm toán', 'Quản trị nhân lực', 'Hệ thống thông tin quản lý', 'Quản trị văn phòng', 'Khoa học máy tính', 'Truyền thông đa phương tiện', 'Công nghệ thông tin', 'Nhóm ngành luật', 'Việt nam học', 'Ngôn ngữ Anh', 'Ngôn ngữ Pháp', 'Ngôn ngữ Trung', 'Ngôn ngữ Quốc Tế Học', 'Đông Phương Học', 'Triết học', 'Văn học', 'Văn hóa học', 'Quản lý văn hóa', 'Quản lý thể dục thể thao', 'Hội họa', 'Thiết kế công nghiệp', 'Thiết kế đồ họa', 'Thiết kế thời trang', 'Thiết kế nội thất', 'Kinh tế học', 'Chính trị học', 'Tâm lý học', 'Báo chí', 'Truyền thông đa phương tiện', 'Công nghệ truyền thông', 'Quan hệ công chúng', 'Công nghệ sinh học', 'Khoa học vật liệu', 'địa chất học', 'Quản lý giáo dục', 'Giáo dục thể chất', 'Huấn luyện thể thao', 'Giáo dục quốc phòng - an ninh', 'Nhóm ngành sư phạm', 'Nông nghiệp', 'Kinh tế nông nghiệp'];

		$this->_view->city = ['Tất cả tỉnh thành' ,'An Giang', 'Kon Tum', 'Bà Rịa - Vũng Tàu', 'Lai Châu', 'Bắc Giang', 'Lâm Đồng', 'Bắc Kạn', 'Lạng Sơn', 'Bạc Liêu', 'Lào Cai', 'Bắc Ninh', 'Long An', 'Bến Tre', 'Nam Định', 'Bình Định', 'Nghệ An', 'Bình Dương', 'Ninh Bình', 'Bình Phước', 'Ninh Thuận', 'Bình Thuận', 'Phú Thọ', 'Cà Mau', 'Phú Yên', 'Cần Thơ', 'Quảng Bình', 'Cao Bằng', 'Quảng Nam', 'Đà Nẵng', 'Quảng Ngãi', 'Đắk Lắk', 'Quảng Ninh', 'Đắk Nông', 'Quảng Trị', 'Điện Biên', 'Sóc Trăng', 'Đồng Nai', 'Sơn La', 'Đồng Tháp', 'Tây Ninh', 'Gia Lai', 'Thái Bình', 'Hà Giang', 'Thái Nguyên', 'Hà Nam', 'Thanh Hóa', 'Hà Nội', 'Thừa Thiên Huế', 'Hà Tĩnh', 'Tiền Giang', 'Hải Dương', 'TP Hồ Chí Minh', 'Hải Phòng', 'Trà Vinh', 'Hậu Giang', 'Tuyên Quang', 'Hòa Bình', 'Vĩnh Long', 'Hưng Yên', 'Vĩnh Phúc', 'Khánh Hòa', 'Yên Bái', 'Kiên Giang'];

		// $this->_view->type_work = ['Loại công việc', 'Toàn thời gian tạm thời', 'Toàn thời gian cố định', 'Bán thời gian tạm thời', 'Bán thời gian cố định', 'Theo thỏa thuận hợp đồng', 'Khác'];
        $this->_view->degree = ['Tất cả bằng cấp', 'Trên đại học', 'Đại học', 'Cao đẳng', 'Trung cấp', 'Trung học', 'Chứng chỉ', 'Khác'];
        $this->_view->gender = ['Tất cả giới tính', 'Nam', 'Nữ'];
        $this->_view->exp = ['Tất cả kinh nghiệm', 'Dưới 1 năm', '1 năm', '2 năm', '3 năm', '4 năm', '5 năm', 'Hơn 5 năm', 'Hơn 10 năm'];
        
        $this->_view->candidates = $this->_model->listCandidates($this->_arrParam);
        $this->_view->render('candidate/index', true);
    }

    public function profileAction()
    {
        $this->_view->setTitle('Tìm ứng viên');
        $this->_view->infoProfile = $this->_model->infoItem($this->_arrParam);
        $this->_view->render('candidate/profile', true);
    }

}
