<?php
require_once("model.php");
class Home extends Model
{
    function newestItem() {
        $query = "SELECT DATE_FORMAT(baidang.NgayCapNhat, '%d-%m-%Y') as Ngay, baidang.*, hinhanh.*, countTime.ThoiGian as ThoiGian
        from baidang, hinhanh, (SELECT baidang.MaBaiDang, SEC_TO_TIME(SUM( TIME_TO_SEC( `buoclam`.`ThoiGian` ) 										) )  as ThoiGian 
                                                     from baidang, buoclam
                                                       WHERE baidang.MaBaiDang = buoclam.MaBaiDang 
                                                      GROUP by baidang.MaBaiDang
                                      ) as countTime
        where baidang.MaBaiDang = hinhanh.MaBaiDang 
        and countTime.MabaiDang = baidang.MaBaiDang
        GROUP by baidang.MaBaiDang
        ORDER BY NgayCapNhat DESC limit 8";

        require("result.php");
        
        return $data;
    }

    function getChuDe() {
        $query = "SELECT * FROM ChuDe";

        require("result.php");
        return $data;
    }

    function getNoiBat() {
        $query = "SELECT * FROM ChuDe";

        require("result.php");
        
        return $data;
    }
}
?>