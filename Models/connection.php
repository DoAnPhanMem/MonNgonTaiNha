<?php 
    class connection{
        var $conn;
        function __construct()
        {
            //Thong so ket noi CSDL
            $servername ="localhost"; 
            $username ="root";
            $password =""; 
            $db_name ="monngon";
 
            //Tao ket noi CSDL
            $this->conn = new mysqli($servername,$username,$password,$db_name);
            $this->conn->set_charset("utf8");

            //check connection
            if ($this->conn->connect_error) {
		        die("Connection failed: " . $this->conn->connect_error);
		    }
        }

    }
?>