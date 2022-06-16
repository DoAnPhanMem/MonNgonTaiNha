<?php
require_once("connection.php");
class model
{
    var $conn;
    var $table;
    var $id;
    function __construct()
    {
        $conn_obj = new connection();
        $this->conn = $conn_obj->conn;
    }
    function limit($a, $b)
    {
        $query =  "SELECT * from sanpham WHERE TrangThai = 1  ORDER BY ThoiGian DESC limit $a,$b";

        require("result.php");

        return $data;
    }
    function theme()
    {
        $query =  "SELECT * from chude ";

        require("result.php");
        
        return $data;
    }
    
    function loaisanpham($id)
    {
        $query =  "SELECT d.TenDM as Ten, l.* FROM theme as d, loaisanpham as l WHERE d.MaDM = l.MaDM and d.MaDM = $id";

        require("result.php");
        
        return $data;
    }

    function random($id)
    {
        $query = "SELECT * FROM SanPham WHERE TrangThai = 1 ORDER BY RAND () LIMIT $id";
        require("result.php");
        
        return $data;
    }
    function banner($a,$b)
    {
        $query =  "SELECT * from Banner  limit $a,$b";

        require("result.php");
        
        return $data;
    }
    function sanpham_theme($a, $b, $theme)
    {
        $query =   "SELECT * from sanpham WHERE TrangThai = 1  and MaDM = $theme ORDER BY ThoiGian DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }
    function create($data)
    {
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO $this->table($f) VALUES ($v);";

        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 2);
           
        } else {
            setcookie('msg', 'Thêm vào không thành công', time() + 2);
           
        }
    }

}
