<?php
$info = $this->infoApply;
?>

<div style="padding-top: 100px; background-color: #f1f1f1; min-height:720px">
    <div class="container">
        <div class="py-3">
            <div class="card border-0">
                <div class="row g-0 my-5">
                    <div class="text-center">
                        <i class="fa-solid fa-circle-check fa-5x text-purple"></i>
                        <p class="mt-4 m-0 text-purple fw-bold">Bạn đã ứng tuyển thành công vào vị trí</p>
                        <p class="m-0 my-1 h4 text-warning fw-bold"><?= $info['post_position'] ?></p>
                        <p class="fw-bold text-muted" style="font-size: 13px"><?= $info['comp_name'] ?></p>
                        <p class="mt-4 fw-bold">Nhà tuyển dụng sẽ liên hệ với bạn qua email hoặc số điện thoại nếu hồ sơ của bạn phù hợp.</p>
                        <p class="fw-bold">Hãy thường xuyên kiểm tra email và điện thoại của bạn nhé !</p>

                        <a href="<?= URL::addLink($this->arrParam['module'], 'career', 'viewcareer', ['idPost' => $this->arrParam['idPost']]) ?>" class="btn bg-purple text-white mt-5" style="width: 300px;">Xác nhận</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
