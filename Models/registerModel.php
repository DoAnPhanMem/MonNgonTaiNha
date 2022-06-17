<?php
require_once("model.php");
class Register extends Model {
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
}