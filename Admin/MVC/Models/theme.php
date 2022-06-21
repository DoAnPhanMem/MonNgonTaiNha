<?php
require_once("model.php");
class theme extends Model
{
    var $table = "chude";
    var $contens = "MaChuDe";

    function theme(){
        $query = "select * from chude ";
        require("result.php");
        return $data;
    }
    function create($data)
    {
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
}