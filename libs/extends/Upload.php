<?php 
class Upload{
    public function uploadFile($file, $folderUpload, $option = null){
        if($option == null){
            if(@$file['tmp_name'] != null){
                $uploadDir = UPLOAD_PATH_ADMIN . 'img' . DS . $folderUpload . DS;
                $exts = '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
                $newFileName = pathinfo($file['name'], PATHINFO_FILENAME) . $this->randomString();
                copy($file['tmp_name'], $uploadDir . $newFileName . $exts);
            }
            return $newFileName . $exts;
        }
    }

    public function deleteFile($path, $fileName){
        unlink($path . '/' . $fileName);
    }

    private function randomString($length = 8){
        $arrChar = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        $arrChar = implode('', $arrChar);
        $arrChar = str_shuffle($arrChar);

        $result = substr($arrChar, 0, $length);
        return $result;
    }
}
?>