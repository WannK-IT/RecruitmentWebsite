<?php 
$info = $this->info;
    $row_1 = [
        [
            'label' => FormFrontEnd::labelRow('position', 'Vị trí cần ứng tuyển', true),
            'input' => FormFrontEnd::inputRow('text', 'position', @$info['position'], true)
        ]
    ];
    $row_2 = [
        [
            'label' => FormFrontEnd::labelRow('level', 'Trình độ học vấn', true),
            'input' => FormFrontEnd::selectBoxRow('level',  $this->level, @$info['level'], true)
        ],
        [
            'label' => FormFrontEnd::labelRow('gender', 'Giới tính', true),
            'input' => FormFrontEnd::selectBoxRow('gender', $this->gender, @$info['gender'], true)
        ],
        [
            'label' => FormFrontEnd::labelRow('exp', 'Kinh nghiệm làm việc', false),
            'input' => FormFrontEnd::selectBoxRow('exp', $this->exp, @$info['exp'], false)
        ],
    ];
    $row_3 = [
        [
            'label' => FormFrontEnd::labelRow('marriage', 'Tình trạng hôn nhân', false),
            'input' => FormFrontEnd::selectBoxRow('marriage', $this->marriage, @$info['marriage'], false)
        ],
        [
            'label' => FormFrontEnd::labelRow('city', 'Tỉnh/Thành phố', true),
            'input' => FormFrontEnd::selectBoxRow('city', $this->city, @$info['city'], true)
        ],
    ];
    $row_4 = [
        [
            'label' => FormFrontEnd::labelRow('career', 'Ngành nghề', true),
            'input' => FormFrontEnd::selectBoxRow('career', $this->career, @$info['career'], true)
        ],
        [
            'label' => FormFrontEnd::labelRow('workplace', 'Nơi làm việc mong muốn', true),
            'input' => FormFrontEnd::selectBoxRow('workplace', $this->city, @$info['workplace'], true)
        ],
    ];
    $row_5 = [
        [
            'label' => FormFrontEnd::labelRow('birthday', 'Ngày sinh', true),
            'input' => FormFrontEnd::inputRow('date', 'birthday', @$info['birthday'], true)
        ],
        [
            'label' => FormFrontEnd::labelRow('address', 'Địa chỉ', true),
            'input' => FormFrontEnd::inputRow('text', 'address', @$info['address'], true)
        ],
    ];
    $row_6 = [
        [
            'label' => FormFrontEnd::labelRow('hard_skl', 'Kỹ năng chuyên môn (Kỹ năng cứng)', true),
            'input' => FormFrontEnd::textareaRow('hard_skl', @$info['hard_skl'], true)
        ]
    ];
    $row_7 = [
        [
            'label' => FormFrontEnd::labelRow('soft_skl', 'Kỹ năng xã hội (Kỹ năng mềm)'),
            'input' => FormFrontEnd::textareaRow('soft_skl', @$info['soft_skl'])
        ]
    ];
    $row_8 = [
        [
            'label' => FormFrontEnd::labelRow('rank', 'Cấp bậc', true),
            'input' => FormFrontEnd::selectBoxRow('rank', $this->rank, @$info['rank'], true)
        ],
        [
            'label' => FormFrontEnd::labelRow('salary', 'Mức lương'),
            'input' => FormFrontEnd::selectBoxRow('salary', $this->salary, @$info['salary'])
        ],
        [
            'label' => FormFrontEnd::labelRow('type_work', 'Loại hình làm việc', true),
            'input' => FormFrontEnd::selectBoxRow('type_work', $this->typeWork, @$info['type_work'], true)
        ],
    ];
    $row_9 = [
        [
            'label' => FormFrontEnd::labelRow('career_goals', 'Mục tiêu nghề nghiệp', true),
            'input' => FormFrontEnd::textareaRow('career_goals', @$info['career_goals'], true)
        ]
    ];
    $row_10 = [
        [
            'label' => FormFrontEnd::labelRow('exp_work', 'Kinh nghiệm làm việc', true),
            'input' => FormFrontEnd::textareaRow('exp_work', @$info['exp_work'], true)
        ]
    ];
    $row_11 = [
        [
            'label' => FormFrontEnd::labelRow('degree', 'Học vấn bằng cấp'),
            'input' => FormFrontEnd::textareaRow('degree', @$info['degree'])
        ]
    ];
    
    $position               = FormFrontEnd::showForm($row_1, 1);
    $level_gender_exp       = FormFrontEnd::showForm($row_2, 3);
    $marriage_city          = FormFrontEnd::showForm($row_3, 2);
    $career_workplace       = FormFrontEnd::showForm($row_4, 2);
    $birthday_address       = FormFrontEnd::showForm($row_5, 2);
    $hardSkill              = FormFrontEnd::showForm($row_6, 1);
    $softSkill              = FormFrontEnd::showForm($row_7, 1);
    $rank_salary_typeWork   = FormFrontEnd::showForm($row_8, 3);
    $career                 = FormFrontEnd::showForm($row_9, 1);
    $expwork                = FormFrontEnd::showForm($row_10, 1);
    $degree                 = FormFrontEnd::showForm($row_11, 1);

?>
<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<div class="container">
    <div style="margin-top: 6rem;">
        <div class="row">
            <?php require_once "sidebar.php" ?>
            <div class="col-md-9 mt-3" style="min-height: 700px;">
                <div class="col-12">
                    <form method="post" action="" id="update-profile-form">
                    <p class="fw-bold h5 mb-3 ms-3">Thông tin cơ bản</p>
                        <?= $position?>
                        <?= $level_gender_exp?>
                    
                    <p class="fw-bold h5 mb-3 mt-2 ms-3">Thông tin cá nhân</p>
                        <?= $marriage_city?>
                        <?= $career_workplace?>
                        <?= $birthday_address?>
                        <?= $hardSkill?>
                        <?= $softSkill?>
                        <?= $rank_salary_typeWork?>
                        <?= $career?>
                        <?= $expwork?>
                        <?= $degree?>

                        <div class="form-group mx-3 mb-4">
                            <input type="hidden" name="token" value="1697523">
                            <input type="submit" name="update_profile_user" id="update_profile_user" class="btn bg-purple mt-4 text-white" value="Cập nhật hồ sơ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>