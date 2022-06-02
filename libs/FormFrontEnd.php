<?php
class FormFrontEnd
{
    public static function labelRow($forName, $title, $required = false)
    {
        $required = ($required == true) ? ' <span class="text-danger">*</span>' : '';
        return sprintf('<label class="mb-1 fw-bold" for="%s">%s%s</label>', $forName, $title, $required);
    }

    public static function inputRow($type, $name, $value, $required = false, $disable = false)
    {
        $disable = ($disable == true) ? 'disabled' : '';
        $required = ($required == true) ? 'required' : '';
        return sprintf('<input type="%s" class="form-control" style="font-size: 1rem;" id="%s" name="%s" autocomplete="off" value="%s" %s %s>', $type, $name, $name, $value, $required, $disable);
    }

    public static function selectBoxRow($name, $arrValue, $selected, $required = false)
    {
        $required = ($required == true) ? 'required' : '';
        $xhtml = '<select id="' . $name . '" name="' . $name . '" class="form-control fs-input" ' . $required . '>';
        if (!empty($arrValue)) {
            foreach ($arrValue as $key => $value) {
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
        $xhtml .= '</select>';
        return $xhtml;
    }

    public static function textareaRow($name, $value, $required = false)
    {
        $required = ($required == true) ? 'required' : '';
        $xhtml = '<textarea id="' . $name . '" name="' . $name . '" style="font-size: 1rem" class="form-control" autocomplete="off" '.$required.'>' . $value . '</textarea>
                <script type="text/javascript">
                    CKEDITOR.replace("' . $name . '");
                </script>';
        return $xhtml;
    }

    public static function formRow($arrElement)
    {
        return sprintf('<div class="form-group mb-4 mx-3">
                            <div class="error-element">
                                %s
                                %s
                            </div>
                        </div>', $arrElement['label'], $arrElement['input']);
    }

    public static function showForm($arrRow, $numberRow)
    {
        $xhtml = '<div class="row">';
        $numbRow = 12 / $numberRow;
        foreach ($arrRow as $value) {
            $xhtml .= '<div class="col-md-' . $numbRow . '">';
            $xhtml .= self::formRow($value);
            $xhtml .= '</div>';
        }
        $xhtml .= '</div>';
        return $xhtml;
    }
}
