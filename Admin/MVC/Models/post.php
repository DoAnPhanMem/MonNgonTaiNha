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
    function updateStatus($id, $status, $reason){
        if($reason != 'NULL'){
            $reason = "'".$reason."'";
        }
        $query = "UPDATE `baidang` SET `TrangThai` = '$status', `LyDo` =  $reason  WHERE `baidang`.`MaBaiDang` = '$id' ;";
        $result = $this->conn->query($query);

        if($status == "Đã duyệt"){
            setcookie('approval-susses',"kkk", time() + 2);
        }
        if($status == "Từ chối"){
            setcookie('eject-susses',"kkk", time() + 2);
        }
    }

}