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

    function fitterRecipe($nameRecipe, $dateUpdate,$timeCooking,$statusRecipe,$maND){
        if($statusRecipe != 'TrangThai'){
            $statusRecipe = "'$statusRecipe'";
        }
        else {
            $statusRecipe = "baidang.".$statusRecipe;
        }
        if($timeCooking != 'ThoiGian')
        {
            $timeCooking =  "TIME_TO_SEC(countTime.ThoiGian) < TIME_TO_SEC('$timeCooking')";
        }
        else{
            $timeCooking =  'countTime.ThoiGian = countTime.ThoiGian';
        }

        $query ="SELECT DATE_FORMAT(baidang.NgayCapNhat, '%d-%m-%Y') as Ngay,
        baidang.*, hinhanh.*, countTime.ThoiGian as ThoiGian from  nguoidung, baidang, buoclam, hinhanh,
        (SELECT baidang.MaBaiDang, SEC_TO_TIME(SUM( TIME_TO_SEC( `buoclam`.`ThoiGian` ) 										) )  as ThoiGian 
                                      from baidang, buoclam
                                      WHERE baidang.MaBaiDang = buoclam.MaBaiDang 
                                      GROUP by baidang.MaBaiDang
                                      ) as countTime
        WHERE baidang.MaBaiDang = hinhanh.MaBaiDang 
        and baidang.MaND = nguoidung.MaND
        and nguoidung.maND = $maND
        and countTime.MabaiDang = baidang.MaBaiDang 
        and $timeCooking and
        baidang.TieuDe like '%$nameRecipe%' 
        and baidang.TrangThai = $statusRecipe
        GROUP by baidang.MaBaiDang
        ORDER by NgayCapNhat $dateUpdate";
        require("result.php");
        return $data;
    }
    function delete_recipe($id){
        $query = "DELETE FROM baidang WHERE `baidang`.`MaBaiDang` = '$id'";
        $status = $this->conn->query($query);
        if($status == true){
            setcookie('del',"kkk", time() + 2);
            (header('Location:?act=personal&handle=recipe')); 
            // 
        }
    }

    
    function getRecipe($id){
        $query = "select DATE_FORMAT(baidang.NgayCapNhat, '%d-%m-%Y') as Ngay, SEC_TO_TIME(SUM( TIME_TO_SEC( `buoclam`.`ThoiGian` ) )) as ThoiGian ,baidang.* 
        from baidang, buoclam WHERE baidang.MaBaiDang = '$id' and baidang.MaBaiDang =  buoclam.MaBaiDang
        GROUP by baidang.MaBaiDang
        ";
        require("result.php");
        return $data;
    }
    
    function getImgsByRecipe($id){
        $query = "select hinhanh.* from hinhanh, baidang WHERE baidang.MaBaiDang = '$id' and hinhanh.MaBaiDang = baidang.MaBaiDang";
        require("result.php");
        return $data;
    }
    function delete_img($img_data){

        $id_img ="";
        foreach($img_data as $key => $value){
            $id_img .= "'$value',";
        }
        $id_img =  trim( $id_img, ",");
        $query = "DELETE FROM hinhanh WHERE `hinhanh`.`MaHinhAnh` in ( $id_img )";
        $status = $this->conn->query($query);
    }
    function getStepsByRecipe($id){
        $query = "select buoclam.* from buoclam, baidang WHERE baidang.MaBaiDang = '$id' and buoclam.MaBaiDang = baidang.MaBaiDang";
        require("result.php");
        return $data;
    }
    function delete_step($id){
        $query = "DELETE FROM buoclam WHERE `buoclam`.`MaBaiDang` = '$id'";
        $status = $this->conn->query($query);
    }
    function getStocksByRecipe($id){
        $query = "select nguyenlieu.* from nguyenlieu, baidang WHERE baidang.MaBaiDang = '$id' and nguyenlieu.MaBaiDang = baidang.MaBaiDang";
        require("result.php");
        return $data;
    }
    function delete_stock($id){
        $query = "DELETE FROM nguyenlieu WHERE `nguyenlieu`.`MaBaiDang` = '$id'";
        $status = $this->conn->query($query);
    }
    function getThemesByRecipe($id){
        $query = "select chude.* from chude,chitietchude, baidang WHERE baidang.MaBaiDang = '$id' and chude.MaChuDe = chitietchude.MaChuDe and chitietchude.MaBaiDang = baidang.MaBaiDang";
        require("result.php");
        return $data;
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
    function delete_themeDetail($id){
        $query = "DELETE FROM ChiTietChuDe WHERE `ChiTietChuDe`.`MaBaiDang` = '$id'";
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
          //pint_r($value);
            $v .= "('null','$MaBaiDang','$value[name]','$value[quantity]','$value[unit]'),";
            
           
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO nguyenlieu ($f) VALUES $v;";
      //  echo $query;
        $status = $this->conn->query($query);
     
    }
    function create_step($data,$MaBaiDang){
        $f = "MaBuocLam,NoiDung,ThoiGian,MaBaiDang";
        $v = "";
        foreach ($data as $key => $value) {
            $time = $value['hour'] . ":" . $value['minute'] .":".$value['second'] ; 
            $v .= "('null','$value[content]','$time','$MaBaiDang'),";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO buoclam ($f) VALUES $v;";
        $status = $this->conn->query($query);
        header('Location: ?act=personal&handle=recipe');
    }
    function update($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $id = $data[$this->id];
        $query = "UPDATE $this->table SET  $v   WHERE $this->id = '$id' ";
       // echo $query;
        $result = $this->conn->query($query);
        
        if ($result == true) {
            setcookie('upd', 'Duyệt thành công', time() + 2);
           
        } else {
            setcookie('fail', 'Update vào không thành công', time() + 2);
            
        }
    }
    function getCommentByRecipe($id){
        $query = "select binhluan.*, nguoidung.* 
        from binhluan, nguoidung WHERE binhluan.MaBaiDang = '$id'  
            and nguoidung.maND = binhluan.MaND";
        require("result.php");
       // echo $query;
        return $data;
    }
}
?>