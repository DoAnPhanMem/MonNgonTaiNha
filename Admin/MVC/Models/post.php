<?php
require_once("model.php");
class post extends Model 
{
    function BaiDang() {
        $query = "select * from baidang and nguoidung";
        require("result.php");
        return $data;
    }
}