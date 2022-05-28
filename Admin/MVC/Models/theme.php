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
}