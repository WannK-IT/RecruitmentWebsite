<?php
class HelperBackEnd
{
    // --------  Sidebar -------- 
    public static function createItemSide($title, $class, $module, $controller, $action)
    {
        $xhtml = '<li class="nav-item pl-2">
                    <a href="index.php?module=' . $module . '&controller=' . $controller . '&action=' . $action . '" class="nav-link">
                        <i class="nav-icon ' . $class . '"></i>
                        <p>' . $title . '</p>
                    </a>
                </li>';
        return $xhtml;
    }

    public static function createGroupSide($title, $class, $arrItemSide, $controllerActive, $active)
    {
        $active = ($active == $controllerActive) ? 'active' : '';
        $xhtml = '<li class="nav-item">
                    <a href="" class="nav-link '.$active.'" data-id=' . $controllerActive . ' style="width: 250px!important;">
                        <i class="' . $class . ' nav-icon"></i>
                        <p>
                            ' . $title . '
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">';
        foreach ($arrItemSide as $value) {
            $xhtml .= $value;
        }
        $xhtml .=   '</ul>
                </li>';
        return $xhtml;
    }
    // -------- End Sidebar --------


    public static function createStatisticBox($title, $icon, $id = '', $value = 0)
    {
        $xhtml = '<div class="col-md-3 col-3">
                    <div class="small-box bg-gradient-info ml-2" id="' . $id . '">
                        <div class="inner">
                            <h3>' . $value . '</h3>
                            <p>' . $title . '</p>
                        </div>
                        <div class="icon">
                            <i class="ion ' . $icon . '" style="color: white"></i>
                        </div>
                    </div>
                </div>';
        return $xhtml;
    }

    public static function showEmptyRow($colspan = 6, $message = 'Dữ liệu đang được cập nhật!')
    {
        return sprintf('<tr>
                            <td colspan="%s" style="text-align: center">%s<br>
                                <a href=%s class="my-2 px-4 btn bg-gradient-info btn-sm">Tạo tin ngay</a>
                            </td>
                        </tr>', $colspan, $message, URL::addLink('admin', 'post', 'formPost', ['task' => 'add']));
    }

    public static function calculateDate($date, $type = 'y')
    {
        $date   = new DateTime(date("Y-m-d", strtotime($date)));
        $now    = new DateTime(date("Y-m-d"));

        $result = $now->diff($date);
        return $result->$type;

        /**
         * $type = 
         *      y: year
         *      m: month
         *      d: day
         *      h: hour
         *      i: minute
         *      s: second
         *      days: days
         */
    }
}
