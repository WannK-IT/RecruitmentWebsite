<?php
class Helper
{
    // --------  Sidebar -------- 
    public static function createItemSide($title, $class, $module, $controller, $action)
    {
        $xhtml = '<li class="nav-item">
                    <a href="index.php?module=' . $module . '&controller=' . $controller . '&action=' . $action . '" class="nav-link">
                        <i class="nav-icon ' . $class . '"></i>
                        <p>' . $title . '</p>
                    </a>
                </li>';
        return $xhtml;
    }

    public static function createGroupSide($title, $class, $arrItemSide)
    {
        $xhtml = '<li class="nav-item">
                    <a href="" class="nav-link">
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


    public static function createStatisticBox($title, $value, $icon, $id = '')
    {
        $xhtml = '<div class="col-md-3 col-3">
                    <div class="small-box bg-info" id="' . $id . '">
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


    // --------  Element Form -------- 
    public static function createInputField($title, $type, $id, $name, $value, $placeHolder = null, $important = false)
    {
        $xhtml = '';
        $important = ($important == true) ? ' <span class="text-danger">*</span>' : '';
        $required = ($important == true) ? 'required' : '';
        $xhtml .= '<div class="error-element">
                        <label for="' . $id . '">' . $title . $important . '</label>
                        <input type="' . $type . '" class="form-control fs-input" id="' . $id . '" name="' . $name . '" autocomplete="off" placeholder="' . $placeHolder . '" value="' . $value . '" ' . $required . ' >
                    </div>';
        return $xhtml;
    }

    public static function createSelectBox($title, $id, $name, $arrValue, $keySelected, $important = false)
    {
        $xhtml = '';
        $important = ($important == true) ? ' <span class="text-danger">*</span>' : '';
        $required = ($important == true) ? 'required' : '';
        $xhtml .= '<div class="error-element">
                        <label for="' . $id . '">' . $title . $important . '</label>
                        <select id="' . $id . '" name="' . $name . '" class="form-control" ' . $required . '>';
        foreach ($arrValue as $key => $value) {
            // $default = ($key == 'default') ? 'selected disabled' : '';
            // $selected = ($value == $keySelected) ? 'selected' : '';
            if ($key == 'default') {
                $selected = 'selected disabled';
            } elseif ($keySelected == $value) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $xhtml .= '<option ' . $selected . '>' . $value . '</option>';
        }
        $xhtml .= '</select></div>';
        return $xhtml;
    }

    public static function createTextArea($title, $description, $id, $name, $minlength, $value, $important = false)
    {
        $xhtml = '';
        $important = ($important == true) ? ' <span class="text-danger">*</span>' : '';
        $xhtml = '  <div class="error-element">
                        <label>' . $title . $important . '</label>
                        <p class="text-muted"><span>' . $description . '</span></p>
                        <textarea id="' . $id . '" name="' . $name . '" class="form-control fs-input" autocomplete="off" minlength="' . $minlength . '">' . $value . '</textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("' . $id . '");
                        </script>
                    </div>';
        return $xhtml;
    }

    public static function formGroupElements($arrElement, $numRow = 1)
    {
        $xhtml = '';
        if ($numRow == 1) {
            $xhtml .= '<div class="row"><div class="col-md-12">' . $arrElement . '</div></div>';
        } else {
            $numberElement = 12 / $numRow;
            $xhtml .= '<div class="row">';
            foreach ($arrElement as $element) {
                $xhtml .= sprintf('<div class="col-md-%s mb-2\">%s</div>', $numberElement, $element);
            }
            $xhtml .= '</div>';
        }
        return $xhtml;
    }
}
