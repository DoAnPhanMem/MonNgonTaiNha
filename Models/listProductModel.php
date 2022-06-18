<?php
require_once("model.php");
class ListProductModel extends Model
{
    function listProduct()
    {
        $query =  "SELECT * FROM baidang, HinhAnh, nguoidung WHERE nguoidung.maND = baidang.MaND and HinhAnh.MaBaiDang = baidang.MaBaiDang GROUP BY baidang.MaBaiDang ORDER BY NgayCapNhat; ";
        require("result.php");
        return $data;
    }
}
?>
