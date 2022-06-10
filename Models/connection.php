<?php 
    class connection{
        var $conn;
        function __construct()
        {
            //Thong so ket noi CSDL
            $server ="localhost"; 
            $username ="root";
            $password =""; 
            $db_name ="monngontainha";
 
            //Tao ket noi CSDL
            $this->conn = new mysqli($server,$username,$password,$db_name);
            $this->conn->set_charset("utf8");

            //check connection
            if ($this->conn->connect_error) {
		        die("Connection failed: " . $this->conn->connect_error);
		    }
        }

    }
?>