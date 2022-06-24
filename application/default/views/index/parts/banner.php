<?php
$selectBoxPosition      = FormFrontEnd::selectBoxRow('career_search', $this->careers, '', false);
$selectBoxCity          = FormFrontEnd::selectBoxRow('city_search', $this->cities, '', false);
$selectBoxTypeWork      = FormFrontEnd::selectBoxRow('type_work_search', $this->type_work, '', false);
?>

<section class="banner">
    <div class="shadow mt-5 p-5 text-dark text-center bg-hero-banner">
        <div id="search-form" style="width: 90%">
            <h1 class="pb-2 custom-title fw-bold">Cơ hội mới! Tương lai mới!</h1>
            <h6 class="custom-title">Tìm việc làm và cơ hội nghề nghiệp của bạn ngay bây giờ !</h6>
            <form action="<?= URL::addLink('default', 'career', 'index')?>" method="GET" class="row p-3" id="formSearchJob">
                <input type="hidden" name="module" value="default">
                <input type="hidden" name="controller" value="career">
                <input type="hidden" name="action" value="index">
                <div class="shadow-lg row p-3">
                    <div class="col-md-3">
                        <input class="form-control" type="text" name="position_search" autocomplete="off" placeholder="Vị trí bạn muốn ứng tuyển">
                    </div>
                    <div class="col-md-3">
                        <?= $selectBoxPosition ?>
                    </div>
                    <div class="col-md-2">
                        <?= $selectBoxCity ?>
                    </div>
                    <div class="col-md-3">
                        <?= $selectBoxTypeWork ?>
                    </div>
                    <div class="col-md-1">
                        <input class="form-control text-white bg-primary bg-gradient" type="submit" name="search" value="Tìm">
                    </div>
                </div>
            </form>

            <!-- Keyword search -->
            <div class="pt-3">
                <ul class="list-inline fw-bold fs-6">
                    <li class="list-inline-item">Java</li>
                    <li class="list-inline-item">PHP</li>
                    <li class="list-inline-item">C#</li>
                    <li class="list-inline-item">Javascript</li>
                    <li class="list-inline-item">NodeJS</li>
                    <li class="list-inline-item">React</li>
                    <li class="list-inline-item">Python</li>
                    <li class="list-inline-item">Golang</li>
                    <li class="list-inline-item">Tester</li>
                    <li class="list-inline-item">BA</li>
                </ul>
            </div>
        </div>
    </div>
</section>