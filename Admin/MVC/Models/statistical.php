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
   
}
