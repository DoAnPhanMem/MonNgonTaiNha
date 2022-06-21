<?php
require_once("model.php");
class Detail extends Model
{
    function detail_sp($id)
    {
        $query =  "SELECT * from baidang where MaBaiDang = $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
   
}
?>