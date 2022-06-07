<?php
class HelperFrontEnd
{

    public static function labelSideBar($nameLabel, $idCollapse)
    {
        return sprintf('<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#' . $idCollapse . '" aria-expanded="false"> ' . $nameLabel . ' </button>');
    }

    public static function linkSideBar($arrLink)
    {
        $xhtml = '';
        if (!empty($arrLink)) {
            foreach ($arrLink as $key => $value) {
                $xhtml .= '<li><a href="' . $value . '" class="link-dark rounded">' . $key . '</a></li>';
            }
        }
        return $xhtml;
    }

    public static function sideBarUser($arrSideBar)
    {
        $xhtml = '<li class="mb-1">
                        ' . $arrSideBar['label'] . '
                        <div class="collapse" id="' . $arrSideBar['idCollapse'] . '">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                ' . $arrSideBar['link'] . '
                            </ul>
                        </div>
                    </li>';
        return $xhtml;
    }

    public static function formSideBarUser($arrElement)
    {
        $xhtml = '<ul class="list-unstyled ps-0">';
        if (!empty($arrElement)) {
            foreach ($arrElement as $element) {
                $xhtml .= self::sideBarUser($element);
            }
        }
        $xhtml .= '</ul>';
        return $xhtml;
    }

    public static function itemNavBar($title, $icon, $link, $id, $activeNavbar)
    {
        $active = ($activeNavbar == $id) ? 'style="color: #2bb5cf"' : '';
        $xhtml = '<li class="nav-item ms-2">
                    <a class="nav-link" data-id="' . $id . '" ' . $active . ' href="' . $link . '"><i class="' . $icon . '"></i>&nbsp;' . $title . '</a>
                </li>';
        return $xhtml;
    }

    public static function formNavbar($arrNav)
    {
        $xhtml = '';
        if (!empty($arrNav)) {
            foreach ($arrNav as $nav) {
                $xhtml .= $nav;
            }
        }
        return $xhtml;
    }

    public static function calculateDate($date, $type = 'y')
    {
        $date   = new DateTime($date);
        $now    = new DateTime();

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
