<?php

// Create box statistic
$postBox = HelperBackEnd::createStatisticBox('Tuyển dụng đã đăng', 'ion-ios-compose', 'totalPostRow');
$cvBox = HelperBackEnd::createStatisticBox('Hồ sơ ứng tuyển', 'ion-ios-person', 'totalProfileApply', (@$this->countApplyProfile['totalProfileApply']) ?? 0);
$cvSavedBox = HelperBackEnd::createStatisticBox('Hồ sơ đã lưu', 'ion-document-text', 'totalSaveProfile', (@$this->countSaveProfile['totalProfileSave']) ?? 0);
$viewNews = HelperBackEnd::createStatisticBox('Tin tức đã đăng', 'ion-ios-eye', 'totalNews', (@$this->countNews['totalNews']) ?? 0);

?>

<!-- Statistical -->
<div class="row py-3">
    <?= $postBox . $cvBox . $cvSavedBox .$viewNews ?>
</div>
<!-- End Statistical -->