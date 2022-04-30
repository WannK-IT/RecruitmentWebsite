
<?php
// $totalPosts = ($this->totalPost['total']) ?? 0; //update by php
$totalPosts = '';   // update by ajax

// Create box statistic
$postBox = Helper::createStatisticBox('Tuyển dụng đã đăng', $totalPosts, 'ion-ios-compose', 'totalPostRow');
$cvBox = Helper::createStatisticBox('Hồ sơ ứng tuyển', 1, 'ion-ios-person');
$cvSavedBox = Helper::createStatisticBox('Hồ sơ đã lưu', 3, 'ion-document-text');
$viewBox = Helper::createStatisticBox('Lượt xem bài đăng', 15, 'ion-ios-eye');
?>

<!-- Statistical -->
<div class="row py-3">
    <?= $postBox . $cvBox . $cvSavedBox . $viewBox ?>
</div>
<!-- End Statistical -->