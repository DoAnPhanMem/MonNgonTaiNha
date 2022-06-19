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

    function getPostByStatus($status){
        echo $status;
        
        if($status == "y"){
            $status = "Đã duyệt";
        }
        else{
            $status = "Chưa duyệt";
        }
        $query = "select * from baidang, nguoidung where baidang.TrangThai = '$status'  
        and nguoidung.MaND = baidang.MaND
        ORDER BY MaBaiDang DESC;";

        require("result.php");

        return $data;
    }


}