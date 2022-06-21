<?php
require_once("model.php");
class Comment extends Model
{
    var $conn;
    var $table = "binhluan";
    var $id = "MaBinhLuan";
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }


    function create_cmt($data){
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            if($value == ''){
                $v .= "'" . NULL . "',";
            }
            else{
                $v .= "'" . $value . "',";
            }
            
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
    function getCommentByRecipe($id){
        $query = "select binhluan.*, nguoidung.* 
        from binhluan, nguoidung WHERE binhluan.MaBaiDang = '$id'  
            and nguoidung.maND = binhluan.MaND";
        require("result.php");
       // echo $query;
        return $data;
    }
    function delete_cmt($id){
        $query = "DELETE FROM binhluan WHERE `binhluan`.`MaBinhLuan` = '$id'";
        $status = $this->conn->query($query);
    }
    function update_cmt($data)
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
}