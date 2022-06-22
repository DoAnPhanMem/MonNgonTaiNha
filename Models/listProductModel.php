<?php
require_once("model.php");
class ListProductModel extends Model
{
    function listProduct()
    {
        $query =  "SELECT * FROM baidang, HinhAnh, nguoidung WHERE nguoidung.maND = baidang.MaND and HinhAnh.MaBaiDang = baidang.MaBaiDang and baidang.TrangThai like 'Đã Duyệt' GROUP BY baidang.MaBaiDang ORDER BY NgayCapNhat; ";
        require("result.php");
        return $data;
    }
    function search($keySearch)
    {
        $keySearch = "%". $keySearch ."%";
        $query =  "SELECT * FROM baidang, HinhAnh, nguoidung WHERE nguoidung.maND = baidang.MaND and HinhAnh.MaBaiDang = baidang.MaBaiDang and baidang.TieuDe like '$keySearch' GROUP BY baidang.MaBaiDang ORDER BY NgayCapNhat; ";
        require("result.php");

        return $data;
    }
    function getByCategory($categoryId)
    {
        $query =  "SELECT * 
        FROM baidang, HinhAnh, nguoidung , chitietchude,chude
        WHERE nguoidung.maND = baidang.MaND and HinhAnh.MaBaiDang = baidang.MaBaiDang and baidang.MaBaiDang = chitietchude.MaBaiDang and chude.MaChuDe = chitietchude.MaChuDe and chude.MaChuDe =$categoryId
        GROUP BY baidang.MaBaiDang 
        ORDER BY NgayCapNhat;";

        require("result.php");
        return $data;
    }
}
?>
