<?php
require_once("model.php");
class post extends model 
{
    var $table = "baidang";
    var $contens = "MaBaiDang";

    function BaiDang() {
        $query = "SELECT * FROM nguoidung, baidang WHERE baidang.maND = nguoidung.maND;";
        require("result.php");
        return $data;
    }
}