<?php
class UserModel extends Model
{
    private $columnsUser = ['user_email', 'user_username', 'user_password', 'user_fullname', 'user_phone'];

    public function __construct()
    {
        parent::__construct();
        $this->setTable(DB_TBL_USER);
    }


    public function checkExistEmail($arrParams)
    {
        $query[]    = "SELECT `user_email`";
        $query[]    = "FROM `{$this->table}`";
        $query[]    = "WHERE `user_email` = '{$arrParams['user_email']}'";
        $query        = implode(" ", $query);

        // Query to load information of employer
        $result = 'not exist email';
        if ($this->isExist($query) == true) {
            $result = 'exist email';
        }
        return $result;
    }

    public function infoBasic()
    {
        $query[] = "SELECT `user_username`, `user_password`, `user_fullname`, `user_email`, `user_phone`, `user_avatar`";
        $query[] = "FROM `{$this->table}`";
        $query[] = "WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
        $query = implode(" ", $query);

        $result = $this->singleRecord($query);
        return $result;
    }

    public function updateBasicInfo($arrParams)
    {
        $data = array_intersect_key($arrParams, array_flip($this->columnsUser));
        $this->update($data, [['user_id', $_SESSION['loginDefault']['idUser']]]);
    }

    // Avatar
    public function getAvatar()
    {
        $query[] = "SELECT `user_avatar`";
        $query[] = "FROM `{$this->table}`";
        $query[] = "WHERE `user_id` = '{$_SESSION['loginDefault']['idUser']}'";
        $query        = implode(" ", $query);
        $result        = $this->singleRecord($query);

        return $result;
    }

    public function changePicture($arrParams)
    {
        $oldImg = self::getAvatar();
        $linkDeleteOldImg = UPLOAD_PATH_DEFAULT . 'img' . DS . $_SESSION['loginDefault']['idUser'];

        // upload to folder
        require_once LIBRARY_EXT_PATH . 'Upload.php';
        $fileUpload = new Upload();
        $fileUpload->deleteFile($linkDeleteOldImg, $oldImg['user_avatar']);
        $newImg = $fileUpload->uploadFileDefault(@$arrParams['user_avatar'], $_SESSION['loginDefault']['idUser']);
        $query = "UPDATE `{$this->table}` SET `user_avatar` = '" . $newImg . "' WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
        $this->query($query);
    }
}
