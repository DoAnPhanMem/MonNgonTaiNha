<?php
require_once("model.php");
class Home extends Model
{
    function newestItem() {
        $query = "SELECT * FROM baidang, HinhAnh WHERE HinhAnh.MaBaiDang = baidang.MaBaiDang GROUP BY baidang.MaBaiDang ORDER BY NgayCapNhat LIMIT 8;";

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