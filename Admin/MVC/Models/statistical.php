<?php
require("model.php");
class statistical extends model
{
    var $table = "baidang";
    var $contens = "MaBaiDang";
    
    function loaisp(){
        $query = "select * from chude ";
        require("result.php");
        return $data;
    }
    function tk_top_chude($top){
        $query = "select ( count(baidang.MaBaiDang)) as Count, chude.* FROM baidang, chude, chitietchude WHERE chitietchude.MaBaiDang = baidang.MaBaiDang and chitietchude.MaChuDe = chude.MaChuDe
        GROUP by chude.MaChuDe LIMIT $top";
        require("result.php");
        return $data;
    }
    function tk_top_baidang($top){
        $query = "select  baidang.* FROM baidang ORDER by luotxem DESC LIMIT $top";
        require("result.php");
        return $data;
    }
    function sumView_topbaidang($top){
        $query = "select sum(LuotXem) as sum FROM (SELECT baidang.LuotXem FROM baidang ORDER by baidang.luotxem DESC LIMIT $top) as suil
        ";
        return $this->conn->query($query)->fetch_assoc();
    }
    function sumViewAll(){
        $query = "SELECT sum(baidang.LuotXem) as sumALl FROM baidang";
        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_sanpham($id){
        $query = "SELECT count(baidang.MaBaiDang) as Count FROM baidang, chude, chitietchude WHERE chude.MaChuDe = '$id' and chitietchude.MaBaiDang = baidang.MaBaiDang and chitietchude.MaChuDe = chude.MaChuDe";
        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_dsothang($m){
        $query = "SELECT Count(MaBaiDang) as Count FROM baidang WHERE MONTH(NgayCapNhat) = $m And TrangThai = 'Đã duyệt'";
        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_dsonam($y){
        $query = "SELECT  Count(MaBaiDang) as Count FROM baidang WHERE YEAR(NgayCapNhat) = $y And TrangThai = 'Đã duyệt'";
        return $this->conn->query($query)->fetch_assoc();
    }

    function tk_nguoidung($id){
        $query = "SELECT count(maND) as Count FROM NguoiDung WHERE MaQuyen = $id";
        
        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_thongbao(){
        $query = "SELECT count(baidang.MaBaiDang) as Count FROM baidang WHERE TrangThai = 'Chưa duyệt'";
        return $this->conn->query($query)->fetch_assoc();
    }
}
