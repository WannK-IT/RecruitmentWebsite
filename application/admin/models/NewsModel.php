<?php

// use LDAP\Result;

class NewsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable(DB_TBL_NEWS);
    }

    // get Avatar
    public function getAvatar()
    {
        $query[]    = "SELECT `comp_logo`";
        $query[]    = "FROM `company`";
        $query[]    = "WHERE `comp_id` = '{$_SESSION['login']['idCompany']}'";
        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);

        return $result;
    }

    public function getEmployer(){
        $query = "SELECT * FROM `employer` WHERE `emp_id` = '".$_SESSION['login']['idUser']."'";
        $query = $this->singleRecord($query);
        return $query;
    }

    // get Full name employer
    public function getFullName()
    {
        $query[]    = "SELECT `emp_fullname`";
        $query[]    = "FROM `employer`";
        $query[]    = "WHERE `emp_id` = '{$_SESSION['login']['idUser']}'";
        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);

        return $result;
    }

    public function listNews()
    {
        $query[]    = "SELECT `news_id`, `news_title`, `news_description`, `news_thumbnail`, `news_status`, `emp_id`, `news_createdtime`, `news_updatetime`";
        $query[]    = "FROM `{$this->table}` WHERE `emp_id` = '" . $_SESSION['login']['idUser'] . "'";

        $query      = implode(" ", $query);
        $result        = $this->listRecord($query);
        return $result;
    }

    public function singleNews($arrParams)
    {
        $query[]    = "SELECT `news_id`, `news_title`, `news_description`, `news_thumbnail`, `emp_id`, `news_createdtime`, `news_updatetime`";
        $query[]    = "FROM `{$this->table}` WHERE `emp_id` = '" . $_SESSION['login']['idUser'] . "'";
        $query[]    = "AND `news_id` = '" . $arrParams['nid'] . "'";

        $query      = implode(" ", $query);
        $result        = $this->singleRecord($query);
        return $result;
    }

    public function deleteNews($params)
    {
        $id     = ($params['nid']) ?? 0;
        $queryThumb = "SELECT `news_id`, `news_thumbnail` FROM `" . DB_TBL_NEWS . "` WHERE `news_id` = '" . $id . "' AND `emp_id` = '" . $_SESSION['login']['idUser'] . "'";
        $resultThumb = $this->singleRecord($queryThumb);
        $linkDeleteThumbnail = THUMB_PATH_ADMIN . $_SESSION['login']['idUser'];

        $query  = "DELETE FROM `{$this->table}` WHERE `news_id` = '" . $id . "'";
        $this->query($query);

        require_once LIBRARY_EXT_PATH . 'Upload.php';
        $fileUpload = new Upload();
        $fileUpload->deleteFile($linkDeleteThumbnail, $resultThumb['news_thumbnail']);
        return $id;
    }

    public function changeStatus($params)
    {
        $id     = $params['nid'];
        $status = ($params['status'] == 'inactive') ? 'active' : 'inactive';
        $query     = "UPDATE `{$this->table}` SET `news_status` = '{$status}' WHERE `news_id` = '{$id}'";
        $this->query($query);

        return [$id, $status, URL::addLink('admin', 'news', 'changeStatus', ['status' => $status, 'nid' => $id])];
    }

    public function saveNews($arrParams, $option = null)
    {
        $id = $_SESSION['login']['idUser'];
        if ($option == 'add') {
            if (!empty($arrParams['news_thumbnail']['name']) && $arrParams['news_thumbnail']['error'] == 0) {
                // Có upload thumbnail
                require_once LIBRARY_EXT_PATH . 'Upload.php';
                $fileUpload = new Upload();
                $thumbnail = $fileUpload->uploadFile(@$arrParams['news_thumbnail'], $id, 'thumbnail');
                $query[]    = "INSERT INTO `" . DB_TBL_NEWS . "` (`news_title`, `news_description`, `news_thumbnail`, `news_status`, `emp_id`, `news_createdtime`)";
                $query[]    = "VALUES ('" . $arrParams['news_title'] . "', '" . $arrParams['news_description'] . "', '" . $thumbnail . "', 'active', $id, '" . date('Y/m/d H:i:s') . "')";
            } else {
                // Không upload thumbnail
                $query[]    = "INSERT INTO `" . DB_TBL_NEWS . "` (`news_title`, `news_description`, `news_status`, `emp_id`, `news_createdtime`)";
                $query[]    = "VALUES ('" . $arrParams['news_title'] . "', '" . $arrParams['news_description'] . "', 'active', $id, '" . date('Y/m/d H:i:s') . "')";
            }

            $query = implode(" ", $query);
            $this->query($query);
            $_SESSION['addNews'] = true;
        } elseif ($option == 'edit') {
            if (!empty($arrParams['news_thumbnail']['name']) && $arrParams['news_thumbnail']['error'] == 0) {
                // Có upload thumbnail
                $queryThumb = "SELECT `news_thumbnail` FROM `" . DB_TBL_NEWS . "` WHERE `news_id` = '" . $arrParams['nid'] . "' AND `emp_id` = '" . $id . "'";
                $resultThumb = $this->singleRecord($queryThumb);
                $linkDeleteThumbnail = THUMB_PATH_ADMIN . $id;

                require_once LIBRARY_EXT_PATH . 'Upload.php';
                $fileUpload = new Upload();
                if (!empty($resultThumb['news_thumbnail'])) {
                    $fileUpload->deleteFile($linkDeleteThumbnail, $resultThumb['news_thumbnail']);

                    $thumbnail = $fileUpload->uploadFile(@$arrParams['news_thumbnail'], $id, 'thumbnail');
                    $query[]    = "UPDATE `" . DB_TBL_NEWS . "` SET `news_title` = '" . $arrParams['news_title'] . "', `news_thumbnail` = '" . $thumbnail . "', `news_description` = '" . $arrParams['news_description'] . "', `news_updatetime` = '" . date('Y-m-d H:i:s') . "'";
                } else {
                    $thumbnail = $fileUpload->uploadFile(@$arrParams['news_thumbnail'], $id, 'thumbnail');
                    $query[]    = "UPDATE `" . DB_TBL_NEWS . "` SET `news_title` = '" . $arrParams['news_title'] . "', `news_thumbnail` = '" . $thumbnail . "', `news_description` = '" . $arrParams['news_description'] . "', `news_updatetime` = '" . date('Y-m-d H:i:s') . "'";
                }
            } else {
                $query[]    = "UPDATE `" . DB_TBL_NEWS . "` SET `news_title` = '" . $arrParams['news_title'] . "', `news_description` = '" . $arrParams['news_description'] . "', `news_updatetime` = '" . date('Y-m-d H:i:s') . "'";
            }

            $query[]    = "WHERE `news_id` = '" . $arrParams['nid'] . "' AND `emp_id` = '" . $id . "'";
            $query = implode(" ", $query);
            $this->query($query);
            $_SESSION['updateNews'] = true;
        }
    }

    public function totalNews(){
        $query = "SELECT COUNT(`news_id`) AS 'total' FROM `".DB_TBL_NEWS."` WHERE `emp_id` = '".$_SESSION['login']['idUser']."' ORDER BY `news_id`";
        $result = $this->singleRecord($query);
        return $result;
    }
}
