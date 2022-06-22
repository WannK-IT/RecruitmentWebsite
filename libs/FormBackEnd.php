<?php
class FormBackEnd
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
                        <textarea id="' . $name . '" name="' . $name . '" rows="' . $rows . '" class="form-control" style="font-size: 1rem" autocomplete="off">' . $value . '</textarea>
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
        return sprintf('<input type="%s" id="%s" name="%s" class="form-control" placeholder="%s" autocomplete="off" style="font-size:1rem" value="%s" %s/>', $type, $name, $name, $placeHolder, $value, $required);
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

    public static function formEmail($content)
    {
        $xhtml = '<div style="font-size:14px;line-height:1.4;margin:0px;background:rgb(238,238,238);color:rgb(54,54,54);padding-top:20px">
        <div style="max-width:580px;width:100%;padding:0px;margin-right:auto;margin-left:auto;background:rgb(238,238,238); padding-bottom: 5px">
            <div style="font-weight:500">
                <div style="background-color:#17a2b8;border-radius:0px;float:left;width:100%;margin-bottom:20px;border:0px solid transparent;margin:0;padding-bottom:17px">
                    <div style="margin-top:15px;padding-left:20px;padding-right:20px">
                        <div style="float:left">
                            <div style="margin-top:5px"><a href=""><img style="filter: invert(100%) brightness(100%);" src="https://lh3.googleusercontent.com/UwM7F8yEsXXHjq59nUtuR8knsl71dT1y0mTNkDaswpfFcJmHMQ_UZNlfIrONDyXmyE6dhatyJPdgRcPScJc4KlmLsWYcZrNbZKehRQ783URvAXDK5VfmEN0ZeWUNAUmwh5YPkGSY6LRZmpqYCJWHI8XJeOTq5ZtvdBovd82qTpdHjsiaXJs8GHtzZa5mP1n3jzBcN_A-JlII4gyPq0TLMPJEr0LyixT26MzF_wfKx61BlcGREiphRaKX0v1mU6bC72kZJGe_9X_0mD8_1V748Eo36LCfFvL4OvOqBW-_Xx3AOADmFss6AoR7AeMW_D-V-muyzyBz0oPV_2UcgM9g-EH2uuBRr8apu9FVdq_lojgvCZ6UYO7biGG5dUGX1r7gin6sugHxP5bQhz8rjDVHLWZI1Gw99dUSqgVj-KF3W2Jwl9n7hZw_GhVqCbjMZFb0R_6pcrJ5cfmwiQguMMIBIsBxZMTxTMXZWqsUNY67S4CWBqPH0VGXX2qIuUKbVKXMbMbkWy7TfkItTaxbw6LxqhGMWcJBJy-NaVAIC9xlo00Ebusgrce7pJ3MvhmARj2cUkj6z2H-agzQWCw4JQ5SYyGS7g9tHg6EpYN3wy2Cv3F23AzoFghbm20AnaYAsQAtm7k6MfPX_evbSznThMUI7NRCUV2SLAa2wRGSoWzQFuEp53bzmQa164HZbGFOEsL4jmUm-j967a9I9KXXXOt3qhmsezPVvH93p21g9S-iqmUBRtMjDub1QEl8_rsXsmZDVQZiah5_Yg8tQrSrKJC5gytiCP9w3rPdmAny=w685-h200-no?authuser=0" width="120" height="30"></a></div>
                        </div>
                        <div style="color:white;margin-top:8px;float:right;font-size:17px!important;font-weight:600">Việc làm cho mọi ngành nghề !</div>
                    </div>
                </div>
                <div style="clear:both;max-height:0px">&nbsp;</div>
            </div>
            <div style="padding:20px 20px;background-color:#fff;font-size:14px!important; margin-bottom: 20px">
                '.$content.'
            </div>
        </div>
    </div>';

        return $xhtml;
    }
}
