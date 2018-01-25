<?php
class upload{
    public $str;
    public $file;
    function __construct($file)
    {
        $this->str = '';
        $this->file = $file;
    }
    function upfile(){
        if (is_uploaded_file($this->file['tmp_name'])) {
            if (!file_exists('../static/upload')) {
                mkdir('../static/upload');
            }
            $date = date('y-m-d');
            $path = '../static/upload/' . $date;
            if (!file_exists($path)) {
                mkdir($path);
            }
            $type = explode('.', $this->file['name'])[1];

            $path = $path . '/' . time() . '.' . $type;
            move_uploaded_file($this->file['tmp_name'], $path);
            $imgurl = '/milan/' . substr($path, 3);
        }
        return $this->str = $imgurl;
    }
    function upfiles(){

    }
}
