<?php
require_once("model.php");
class Theme extends Model
{
    var $conn;
    var $table = "chude";
    var $id = "MaChuDe";
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
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
?>