<?php 
class HelperFrontEnd{
    
    public static function labelSideBar($nameLabel, $idCollapse){
        return sprintf('<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#'.$idCollapse.'" aria-expanded="false"> '.$nameLabel.' </button>');
    }

    public static function linkSideBar($arrLink){
        $xhtml = '';
        if(!empty($arrLink)){
            foreach($arrLink as $key => $value){
                $xhtml .= '<li><a href="'.$value.'" class="link-dark rounded">'.$key.'</a></li>';
            }
        }
        return $xhtml;
    }

    public static function sideBarUser($arrSideBar){
        $xhtml = '<li class="mb-1">
                        '.$arrSideBar['label'].'
                        <div class="collapse" id="'.$arrSideBar['idCollapse'].'">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                '.$arrSideBar['link'].'
                            </ul>
                        </div>
                    </li>';
    return $xhtml;
    }

    public static function formSideBarUser($arrElement){
        $xhtml = '<ul class="list-unstyled ps-0">';
        if (!empty($arrElement)) {
            foreach ($arrElement as $element) {
                $xhtml .= self::sideBarUser($element);
            }
        }
        $xhtml .= '</ul>';
        return $xhtml;
    }
    
}
