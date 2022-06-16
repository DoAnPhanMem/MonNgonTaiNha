<?php
require_once("model.php");
class MyRecipe extends Model
{
    var $conn;
    var $table = "baidang";
    var $id = "MaBaiDang";
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function getIdRecent(){
      
        $query =   "SELECT $this->id from $this->table ORDER BY $this->id DESC limit 1";

        $result = $this->conn->query($query);
        if($row = $result->fetch_assoc()){
            $MaBaiDang =  $row[$this->id];
        }
        else{
            $MaBaiDang =  '0';
        }
        $id = str_replace( 'BD', '', $MaBaiDang);
        
        return  $id ;
       
    }

    function create_themeDetail($data,$MaBaiDang){
        $f = "MaBaiDang,MaChuDe";
        $v = "";
        foreach ($data as $key => $value) {
          
            $v .= "('$MaBaiDang','$value[0]'),";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO chitietchude ($f) VALUES $v;";
        //echo $query;
        $status = $this->conn->query($query);
    }

    function create_img($data,$MaBaiDang){
        $f = "MaHinhAnh,MaBaiDang,HinhAnh";
        $v = "";
        foreach ($data as $key => $value) {
          
            $v .= "('null','$MaBaiDang','$value'),";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO hinhanh ($f) VALUES $v;";
        $status = $this->conn->query($query);
     
    }
    function create_stock($data,$MaBaiDang){
        
        $f = "MaNguyenLieu,MaBaiDang,TenNguyenLieu,SoLuong,DonVi";
        $v = "";
        foreach ($data as $key => $value) {
            print_r($value);
            $v .= "('null','$MaBaiDang','$value[name]','$value[quantity]','$value[unit]'),";
            
           
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO nguyenlieu ($f) VALUES $v;";
        echo $query;
        $status = $this->conn->query($query);
     
    }
    function create_step($data,$MaBaiDang){
        
        $f = "MaBuocLam,NoiDung,ThoiGian,MaBaiDang";
        $v = "";
        foreach ($data as $key => $value) {
            $time = $value['hour'] . ":" . $value['minute'] .":".$value['second'] ; 
            print_r($value);
            $v .= "('null','$value[content]','$time','$MaBaiDang'),";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO buoclam ($f) VALUES $v;";
        echo $query;
        $status = $this->conn->query($query);
     
    }
}