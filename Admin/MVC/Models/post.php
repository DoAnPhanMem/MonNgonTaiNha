<?php
require_once("model.php");
class post extends model 
{
    var $table = "baidang";
    var $contens = "MaBaiDang";

    function BaiDang() {
        $query = "SELECT * FROM baidang.NgayCapNhat, '%d-%m-%Y') as NgayCapNhat ,nguoidung, baidang WHERE baidang.maND = nguoidung.maND;";
        require("result.php");
        return $data;
    }

    function getPostByStatus($status){

        $query = "select * from baidang, nguoidung where baidang.TrangThai = '$status'  
        and nguoidung.MaND = baidang.MaND
        ORDER BY MaBaiDang DESC;";

        require("result.php");
        return $data;
    }
    function updateStatus($id, $status){
        $query = "UPDATE `baidang` SET `TrangThai` = '$status' WHERE `baidang`.`MaBaiDang` = '$id';";
        $status = $this->conn->query($query);
        if($status == true){
            setcookie('del',"kkk", time() + 2);
        }
    }

}