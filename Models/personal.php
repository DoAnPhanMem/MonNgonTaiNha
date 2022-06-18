<?php
require_once("model.php");
class Personal extends Model
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
}
?>