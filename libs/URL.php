<?php 
class URL{
    public static function addLink($module, $controller, $action, $params = null){
        $linkParams = '';
        if(!empty($params)){
            foreach ($params as $key => $value) {
                $linkParams .= "&{$key}={$value}";
            }
        }
        return sprintf('index.php?module=%s&controller=%s&action=%s%s', $module, $controller, $action, $linkParams);
    }
}