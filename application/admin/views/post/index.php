<?php require_once "elements/statistic.php";?>
<?php 
    $xhtml = '';
    if(!empty($this->listPost)){
        foreach($this->listPost as $post){
            $id             = $post['post_id'];
            $title          = $post['post_title'];
            $created        = $post['post_created_date'];
            $expired        = $post['post_expired_date'];
            $applyAmount    = $post['applyAmount'];
            $status         = $post['post_isActive'];
            $classStatus    = ($status == 'active') ? 'fa-check text-success' : 'fa-minus text-danger';
            
            $linkChangeStatus   = URL::addLink('admin', 'post', 'changeStatus', ['status' => $status, 'pid' => $id]);
            $linkDeletePost     = URL::addLink('admin', 'post', 'delete', ['pid' => $id]);

            $xhtml .=    '<tr>
                            <td class="text-center">'.$title.'</td>
                            <td class="text-center">'.$created.'</td>
                            <td class="text-center">'.$expired.'</td>
                            <td class="text-center">'.$applyAmount.'</td>
                            <td class="text-center position-relative"><a href="'.$linkChangeStatus.'"><i class="fa-lg fas '.$classStatus.'"></i></a></td>
                            <td class="text-center">
                                <a href="#" class="px-1" title="Edit">
                                    <i class="fas fa-cog fa-lg text-info"></i>
                                </a>
                                <a href="'.$linkDeletePost.'" class="px-1" title="Delete">
                                    <i class="btn-delete fas fa-trash-alt fa-lg text-danger"></i>
                                </a>
                            </td>
                        </tr>';
        }
    }else{
        $xhtml = Helper::showEmptyRow('6', 'Dữ liệu đang được cập nhật');
    }
?>
<!-- List -->
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-info card-outline my-3">
            <div class="card-body">
                <!-- Post Content -->
                <form action="" method="post" class="table-responsive" id="form-table-post">
                    <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">Tên tin đăng</th>
                                <th class="text-center">Ngày đăng</th>
                                <th class="text-center">Thời hạn</th>
                                <th class="text-center">Lượt ứng tuyển</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $xhtml?>
                        </tbody>
                    </table>
                    <div>
                        <input type="hidden" name="sort_field" value="">
                        <input type="hidden" name="sort_order" value="">
                    </div>
                </form>
            </div>
            
            <!-- <?php require_once "elements/pagination.php"?> -->

        </div>
        <!-- /.card -->
    </div>
</div>
<!-- End List -->