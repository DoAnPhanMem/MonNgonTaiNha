<?php
require_once("model.php");
class post extends Model 
{
    var $table = "baidang";
    var $contens = "MaBaiDang";

    function BaiDang() {
        $query = "select * from baidang and nguoidung";
        require("result.php");
        return $data;
    }
}