<?php

// Create box statistic
$postBox = HelperBackEnd::createStatisticBox('Tuyển dụng đã đăng', 'ion-ios-compose', 'totalPostRow');
$cvBox = HelperBackEnd::createStatisticBox('Hồ sơ ứng tuyển', 'ion-ios-person');
$cvSavedBox = HelperBackEnd::createStatisticBox('Hồ sơ đã lưu', 'ion-document-text');
$viewBox = HelperBackEnd::createStatisticBox('Lượt xem bài đăng', 'ion-ios-eye');
?>

<!-- Statistical -->
<div class="row py-3">
    <?= $postBox . $cvBox . $cvSavedBox . $viewBox ?>
</div>
<!-- End Statistical -->