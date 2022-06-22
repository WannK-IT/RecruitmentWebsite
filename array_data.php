<?php
$arrCity        = ['default' => 'Chọn nơi làm việc', 'An Giang', 'Kon Tum', 'Bà Rịa - Vũng Tàu', 'Lai Châu', 'Bắc Giang', 'Lâm Đồng', 'Bắc Kạn', 'Lạng Sơn', 'Bạc Liêu', 'Lào Cai', 'Bắc Ninh', 'Long An', 'Bến Tre', 'Nam Định', 'Bình Định', 'Nghệ An', 'Bình Dương', 'Ninh Bình', 'Bình Phước', 'Ninh Thuận', 'Bình Thuận', 'Phú Thọ', 'Cà Mau', 'Phú Yên', 'Cần Thơ', 'Quảng Bình', 'Cao Bằng', 'Quảng Nam', 'Đà Nẵng', 'Quảng Ngãi', 'Đắk Lắk', 'Quảng Ninh', 'Đắk Nông', 'Quảng Trị', 'Điện Biên', 'Sóc Trăng', 'Đồng Nai', 'Sơn La', 'Đồng Tháp', 'Tây Ninh', 'Gia Lai', 'Thái Bình', 'Hà Giang', 'Thái Nguyên', 'Hà Nam', 'Thanh Hóa', 'Hà Nội', 'Thừa Thiên Huế', 'Hà Tĩnh', 'Tiền Giang', 'Hải Dương', 'TP Hồ Chí Minh', 'Hải Phòng', 'Trà Vinh', 'Hậu Giang', 'Tuyên Quang', 'Hòa Bình', 'Vĩnh Long', 'Hưng Yên', 'Vĩnh Phúc', 'Khánh Hòa', 'Yên Bái', 'Kiên Giang'];

$arrType_work   = ['default' => 'Chọn hình thức làm việc', 'Toàn thời gian tạm thời', 'Toàn thời gian cố định', 'Bán thời gian tạm thời', 'Bán thời gian cố định', 'Theo thỏa thuận hợp đồng', 'Khác'];

$arrDegree      = ['Không yêu cầu', 'Trên đại học', 'Đại học', 'Cao đẳng', 'Trung cấp', 'Trung học', 'Chứng chỉ', 'Khác'];

$arrSalary      = ['Thỏa thuận', '1 - 3 triệu', '3 - 5 triệu', '5 - 7 triệu', '7 - 10 triệu', '10 - 12 triệu', '12 - 15 triệu', '15 - 20 triệu', '20 - 25 triệu', '25 - 30 triệu', '30 - 40 triệu', 'Trên 40 triệu'];

$arrExp         = ['Chưa có kinh nghiệm', 'Dưới 1 năm', '1 năm', '2 năm', '3 năm', '4 năm', '5 năm', 'Hơn 5 năm', 'Hơn 10 năm'];

$arrCareer      = ['default' => 'Chọn ngành nghề', 'Công nghệ thực phẩm', 'Công nghệ chế biến thủy sản', 'Kỹ thuật dệt', 'Kiến trúc', 'Kinh tế và quản lý đô thị', 'Kỹ thuật công trình biển', 'Kỹ thuật xây dựng', 'Kinh tế xây dựng', 'Quản lý xây dựng', 'Kỹ thuật xây dựng công trình giao thông', 'Công nghệ kỹ thuật công trình xây dựng', 'Nhân sự', 'Thủy lợi ', 'Quản trị kinh doanh', 'Quản trị dịch vụ du lịch và lữ hành', 'Quản trị khách sạn', 'Marketing', 'Bất động sản', 'Kinh doanh quốc tế', 'Kế toán', 'Kiểm toán', 'Quản trị nhân lực', 'Hệ thống thông tin quản lý', 'Quản trị văn phòng', 'Khoa học máy tính', 'Truyền thông đa phương tiện', 'Công nghệ thông tin', 'Nhóm ngành luật', 'Việt nam học', 'Ngôn ngữ Anh', 'Ngôn ngữ Pháp', 'Ngôn ngữ Trung', 'Ngôn ngữ Quốc Tế Học', 'Đông Phương Học', 'Triết học', 'Văn học', 'Văn hóa học', 'Quản lý văn hóa', 'Quản lý thể dục thể thao', 'Hội họa', 'Thiết kế công nghiệp', 'Thiết kế đồ họa', 'Thiết kế thời trang', 'Thiết kế nội thất', 'Kinh tế học', 'Chính trị học', 'Tâm lý học', 'Báo chí', 'Truyền thông đa phương tiện', 'Công nghệ truyền thông', 'Quan hệ công chúng', 'Công nghệ sinh học', 'Khoa học vật liệu', 'địa chất học', 'Quản lý giáo dục', 'Giáo dục thể chất', 'Huấn luyện thể thao', 'Giáo dục quốc phòng – an ninh', 'Nhóm ngành sư phạm', 'Nông nghiệp', 'Kinh tế nông nghiệp'];

$arrRank = ['default' => 'Chọn cấp bậc', 'Trưởng nhóm', 'Phó giám đốc', 'Trưởng phòng', 'Phó phòng', 'Trưởng chi nhánh', 'Nhân viên', 'Thực tập sinh', 'Quản lý', 'Cộng tác viên', 'Trưởng dự án'];

$arrSize = ['Dưới 10 người', '10 - 50 người', '50 - 200 người', '200 - 500 người', '500 - 1000 người', '1000 - 3000 người', 'Trên 3000 người'];

$now = new Datetime();
echo $now;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div style="font-size:14px;line-height:1.4;margin:0px;background:rgb(238,238,238);color:rgb(54,54,54);padding-top:20px">
        <div style="max-width:580px;width:100%;padding:0px;margin-right:auto;margin-left:auto;background:rgb(238,238,238); padding-bottom: 5px">
            <div style="font-weight:500">
                <div style="background-color:#17a2b8;border-radius:0px;float:left;width:100%;margin-bottom:20px;border:0px solid transparent;margin:0;padding-bottom:17px">
                    <div style="margin-top:15px;padding-left:20px;padding-right:20px">
                        <div style="float:left">
                            <div style="margin-top:5px"><a href=""><img style="filter: invert(100%) brightness(100%);" src="https://lh3.googleusercontent.com/UwM7F8yEsXXHjq59nUtuR8knsl71dT1y0mTNkDaswpfFcJmHMQ_UZNlfIrONDyXmyE6dhatyJPdgRcPScJc4KlmLsWYcZrNbZKehRQ783URvAXDK5VfmEN0ZeWUNAUmwh5YPkGSY6LRZmpqYCJWHI8XJeOTq5ZtvdBovd82qTpdHjsiaXJs8GHtzZa5mP1n3jzBcN_A-JlII4gyPq0TLMPJEr0LyixT26MzF_wfKx61BlcGREiphRaKX0v1mU6bC72kZJGe_9X_0mD8_1V748Eo36LCfFvL4OvOqBW-_Xx3AOADmFss6AoR7AeMW_D-V-muyzyBz0oPV_2UcgM9g-EH2uuBRr8apu9FVdq_lojgvCZ6UYO7biGG5dUGX1r7gin6sugHxP5bQhz8rjDVHLWZI1Gw99dUSqgVj-KF3W2Jwl9n7hZw_GhVqCbjMZFb0R_6pcrJ5cfmwiQguMMIBIsBxZMTxTMXZWqsUNY67S4CWBqPH0VGXX2qIuUKbVKXMbMbkWy7TfkItTaxbw6LxqhGMWcJBJy-NaVAIC9xlo00Ebusgrce7pJ3MvhmARj2cUkj6z2H-agzQWCw4JQ5SYyGS7g9tHg6EpYN3wy2Cv3F23AzoFghbm20AnaYAsQAtm7k6MfPX_evbSznThMUI7NRCUV2SLAa2wRGSoWzQFuEp53bzmQa164HZbGFOEsL4jmUm-j967a9I9KXXXOt3qhmsezPVvH93p21g9S-iqmUBRtMjDub1QEl8_rsXsmZDVQZiah5_Yg8tQrSrKJC5gytiCP9w3rPdmAny=w685-h200-no?authuser=0" width="120" height="30" alt="logo_website_recruitment_jobht"></a></div>
                        </div>
                        <div style="color:white;margin-top:8px;float:right;font-size:17px!important;font-weight:600">Việc làm cho mọi ngành nghề !</div>
                    </div>
                </div>
                <div style="clear:both;max-height:0px">&nbsp;</div>
            </div>
            <div style="padding:20px 20px;background-color:#fff;font-size:14px!important; margin-bottom: 20px">

            </div>
        </div>
    </div>
</body>

</html>
<!-- <!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
            cursor: pointer;
        }

        #text {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 50px;
            color: white;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>

    <div id="overlay" onclick="off()">
        <div id="text">Overlay Text</div>
    </div>

    <div style="padding:20px">
        <h2>Overlay with Text</h2>
        <button onclick="on()">Turn on overlay effect</button>
    </div>

    <script>
        function on() {
            document.getElementById("overlay").style.display = "block";
        }

        function off() {
            document.getElementById("overlay").style.display = "none";
        }
    </script>

</body>

</html> -->