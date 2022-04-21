<?php
class Helper
{
    public static function createItemSide($title, $class, $module, $controller, $action){
        $xhtml = '<li class="nav-item">
                    <a href="index.php?module=' . $module . '&controller=' . $controller . '&action=' . $action . '" class="nav-link">
                        <i class="nav-icon ' . $class . '"></i>
                        <p>' . $title . '</p>
                    </a>
                </li>';
        return $xhtml;
    }

    public static function createGroupSide($title, $class, $arrItemSide){
        $xhtml = '<li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="'.$class.' nav-icon"></i>
                        <p>
                            '.$title.'
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">';
                    foreach($arrItemSide as $value){
                        $xhtml .= $value;
                    } 
        $xhtml .=   '</ul>
                </li>';
        return $xhtml;
    }

    public static function createStatisticBox($title, $value, $icon){
        $xhtml = '<div class="col-md-3 col-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$value.'</h3>
                            <p>'.$title.'</p>
                        </div>
                        <div class="icon">
                            <i class="ion '.$icon.'" style="color: white"></i>
                        </div>
                    </div>
                </div>';
        return $xhtml;
    }

    public static function showEmptyRow($colspan = 6, $message = 'Dữ liệu đang được cập nhật!'){
        return sprintf('<tr><td colspan="%s" style="text-align: center">%s</td></tr>', $colspan, $message);
    }
}
?>
