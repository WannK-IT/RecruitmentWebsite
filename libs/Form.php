<?php
class Form
{
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


    // ------------------- Form inline row -------------------
    public static function labelRow($forName, $title, $col, $required = false)
    {
        $required = ($required == true) ? ' <span class="text-danger">*</span>' : '';
        return sprintf('<label for="%s" class="col-sm-%s col-form-label">%s %s</label>', $forName, $col, $title, $required);
    }

    public static function inputRow($type, $name, $col, $value, $required = false, $disable = false, $placeHolder = null)
    {
        $required = ($required == true) ? 'required' : '';
        $disable = ($disable == true)  ? 'disabled' : '';
        return sprintf('<div class="col-sm-%s">
                            <div class="error-element">
                                <input style="font-size: 1rem" type="%s" class="form-control" id="%s" name="%s" value="%s" placeholder="%s" autocomplete="off" %s %s>
                            </div>
                        </div>', $col, $type, $name, $name, $value, $placeHolder, $disable, $required);
    }

    public static function selectBox($name, $arrOptions, $col, $selected, $disable = false)
    {
        $disable = ($disable == true) ? 'disabled' : '';
        $xhtml = '<div class="col-sm-' . $col . '">';
        $xhtml .= '<div class="error-element">';
        $xhtml .= '<select id="' . $name . '" name="' . $name . '" class="form-control" ' . $disable . '>';
        foreach ($arrOptions as $value) {
            $keySelected = ($value == $selected) ? 'selected' : '';
            $xhtml .= '<option ' . $keySelected . '>' . $value . '</option>';
        }
        $xhtml .= '</select></div></div>';
        return $xhtml;
    }

    public static function textArea($name, $col, $value, $rows)
    {
        $xhtml = '';
        $xhtml .= '<div class="col-sm-' . $col . '">';
        $xhtml .= '  <div class="error-element">
                        <textarea id="' . $name . '" name="' . $name . '" rows="'.$rows.'" class="form-control" style="font-size: 1rem" autocomplete="off">' . $value . '</textarea>
                    </div></div>';
        return $xhtml;
    }

    public static function formRow($element)
    {
        $xhtml = sprintf('<div class="form-group row">
                            %s
                            %s
                        </div>', $element['label'], $element['input']);
        return $xhtml;
    }

    public static function showForm($arrElement)
    {
        $xhtml = '';
        if (!empty($arrElement)) {
            foreach ($arrElement as $element) {
                $xhtml .= self::formRow($element);
            }
        }
        return $xhtml;
    }

    // Form account
    public static function labelAccount($forName, $title, $required = false)
    {
        $required = ($required == true) ? ' <span class="text-danger">*</span>' : '';
        return sprintf('<label class="form-label" for="%s">%s %s</label>', $forName, $title, $required);
    }

    public static function inputAccount($type, $name, $placeHolder, $value, $required = false)
    {
        $required = ($required == true) ? 'required' : '';
        return sprintf('<input type="%s" id="%s" name="%s" class="form-control form-control" placeholder="%s" autocomplete="off" style="font-size:1rem" value="%s" %s/>', $type, $name, $name, $placeHolder, $value, $required);
    }

    public static function selectBoxAccount($name, $arrOptions, $selected, $required = false)
    {
        $xhtml = '';
        $required = ($required == true) ? 'required' : '';
        $xhtml .= '<select name="' . $name . '" id="' . $name . '" class="form-control" ' . $required . '>';
        if (!empty($arrOptions)) {
            foreach ($arrOptions as $key => $value) {
                if ($key == 'default') {
                    $keySelected = 'selected disabled';
                } elseif ($selected == $value) {
                    $keySelected = 'selected';
                } else {
                    $keySelected = '';
                }
                $xhtml .= '<option ' . $keySelected . '>' . $value . '</option>';
            }
        }
        $xhtml .=  '</select>';
        return $xhtml;
    }

    public static function formRowAccount($element)
    {
        return sprintf('
            <div class="form-outline mb-4">
                <div class="error-element">
                    %s
                    %s
                </div>
            </div>
        ', $element['label'], $element['input']);
    }

    public static function showFormAccount($arrElement)
    {
        $xhtml = '';
        if (!empty($arrElement)) {
            foreach ($arrElement as $element) {
                $xhtml .= self::formRowAccount($element);
            }
        }
        return $xhtml;
    }
}
