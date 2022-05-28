<?php
require("model.php");
class recipe extends model
{
    var $table = "baidang";
    var $contens = "MaBaiDang";
    
    function loaisp(){
        $query = "select * from chude ";
        require("result.php");
        return $data;
    }
   
}
