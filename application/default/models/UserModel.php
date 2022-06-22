<?php
class UserModel extends Model
{
    private $columnsUser    = ['user_email', 'user_username', 'user_password', 'user_fullname', 'user_phone'];
    private $columnsCV       = ['position', 'level', 'exp', 'gender', 'birthday', 'marriage', 'city', 'address', 'hard_skl', 'soft_skl', 'career', 'workplace', 'rank', 'salary', 'type_work', 'career_goals', 'exp_work', 'degree'];

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

    public function checkExistPassword($arrParams)
    {
        $query[]    = "SELECT `user_password`";
        $query[]    = "FROM `{$this->table}`";
        $query[]    = "WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
        $query[]    = "AND `user_password` = '" . md5($arrParams['user_password']) . "'";
        $query      = implode(" ", $query);

        $result = 'not match';
        if ($this->isExist($query) == true) {
            $result = 'match';
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

    public function updateProfile($arrParams)
    {
        $data = array_intersect_key($arrParams, array_flip($this->columnsCV));
        $data['update_time'] = date('Y/m/d');
        $this->updateOtherTable($data, 'cv', [['user_id', $_SESSION['loginDefault']['idUser']]]);
        $_SESSION['default']['updateProfileSuccess'] = true;
    }

    public function updatePassword($arrParams)
    {
        $query = "UPDATE `{$this->table}` SET `user_password` = '" . md5($arrParams['newPass']) . "' WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
        $this->query($query);
    }

    public function infoProfile($arrParams)
    {
        $query = "SELECT * FROM `cv` WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
        $result = $this->singleRecord($query);
        return $result;
    }

    // Avatar
    public function getAvatar()
    {
        $query[] = "SELECT `user_avatar`";
        $query[] = "FROM `{$this->table}`";
        $query[] = "WHERE `user_id` = '".$_SESSION['loginDefault']['idUser']."'";
        $query        = implode(" ", $query);
        $result        = $this->singleRecord($query);

        return $result;
    }

    public function getFileCV()
    {
        $query[]    = "SELECT `id`,`fileCV`";
        $query[]    = "FROM `cv`";
        $query[]    = "WHERE `user_id` = '".$_SESSION['loginDefault']['idUser']."'";
        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);

        return $result;
    }

    public function changePicture($arrParams)
    {
        $oldImg = self::getAvatar();
        $linkDeleteOldImg = UPLOAD_PATH_DEFAULT . 'img' . DS . $_SESSION['loginDefault']['idUser'];

        // upload to folder Image
        require_once LIBRARY_EXT_PATH . 'Upload.php';
        $fileUpload = new Upload();
        $fileUpload->deleteFile($linkDeleteOldImg, $oldImg['user_avatar']);
        $newImg = $fileUpload->uploadFileDefault(@$arrParams['user_avatar'], $_SESSION['loginDefault']['idUser']);
        $query = "UPDATE `{$this->table}` SET `user_avatar` = '" . $newImg . "' WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
        $this->query($query);
    }

    public function infoCV()
    {
        $query[]    = "SELECT `v`.*, `u`.`user_email`, `u`.`user_fullname`, `u`.`user_phone`, `u`.`user_avatar`";
        $query[]    = "FROM `cv` AS `v`, `{$this->table}` AS `u`";
        $query[]    = "WHERE `v`.`user_id` = `u`.`user_id`";
        $query[]    = "AND `u`.`user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";

        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);
        return $result;
    }

    public function getFullName()
    {
        $query[]    = "SELECT `user_fullname`";
        $query[]    = "FROM `user`";
        $query[]    = "WHERE `user_id` = '".$_SESSION['loginDefault']['idUser']."'";
        $query      = implode(" ", $query);
        $result     = $this->singleRecord($query);

        return $result;
    }

    public function uploadCV($arrParams)
    {
        $oldCV = self::getFileCV();
        $linkDeleteOldCV = UPLOAD_PATH_DEFAULT . 'cv' . DS . $_SESSION['loginDefault']['idUser'];

        // upload to folder CV
        require_once LIBRARY_EXT_PATH . 'Upload.php';
        $fileUpload = new Upload();
        $fileUpload->deleteFile($linkDeleteOldCV, $oldCV['fileCV']);
        $newCV = $fileUpload->uploadCVDefault(@$arrParams['upload_cv'], $_SESSION['loginDefault']['idUser']);
        $query = "UPDATE `cv` SET `fileCV` = '" . $newCV . "', `update_time` = '" . date('Y/m/d') . "' WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
        $this->query($query);
    }

    public function deleteCV(){
        $oldCV = self::getFileCV();
        $linkDeleteOldCV = UPLOAD_PATH_DEFAULT . 'cv' . DS . $_SESSION['loginDefault']['idUser'];
        require_once LIBRARY_EXT_PATH . 'Upload.php';
        $fileUpload = new Upload();
        $fileUpload->deleteFile($linkDeleteOldCV, $oldCV['fileCV']);

        $query = "UPDATE `cv` SET `fileCV` = NULL WHERE `user_id` = '" . $_SESSION['loginDefault']['idUser'] . "'";
        $this->query($query);
    }
}
