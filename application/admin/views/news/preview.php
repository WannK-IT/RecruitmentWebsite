<?php 
    if(!empty($this->infoNews)){
        $data = $this->infoNews;
    }
?>
<div class="row d-flex justify-content-center pt-2">

    <!-- Main content news -->
    <div class="col-md-8">
        <div class="card mb-2 p-4 mb-4">
            <div class="d-flex justify-content-between mb-3">
                <p style="font-size: 12px;" class="font-weight-bold"><a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'listNews')?>"><span class="text-muted"><i class="font-weight-bold far fa-arrow-alt-circle-left pr-1"></i>Quay lại</span></a></p>
                <p style="font-size: 12px"><span class="text-muted"><?= date('d/m/Y H:i:s', strtotime($data['news_createdtime']))?> (GMT+07:00)</span></p>
            </div>
            
            <img src="<?= THUMB_URL_ADMIN . $_SESSION['login']['idUser'] . DS . $data['news_thumbnail']?>" class="img-fluid mx-auto pb-4" style="max-height: 500px" alt="logo_news">
            <div>
                <p class="font-weight-bold h3 py-2"><?= $data['news_title']?></p>
                <div class="pb-3"></div>
                <div>
                    <?= $data['news_description']?>
                </div>
            </div>

            <div><span class="text-muted py-3" style="font-size: 14px;"><?= $this->employer['emp_fullname']?></span></div>
        </div>
    </div>
</div>