<?php 

	
    class connection{
        var $mysqli;
        function __construct()
        {
            //Thong so ket noi CSDL
              $severname ="hopper.proxy.rlwy.net"; 
            $username ="root";
            $password ="CecQBHjoyvKAPvjlVAuVpFTfSzooAwTe"; 
            $db_name ="web_mycay";
			$port="41684";
 
            //Tao ket noi CSDL
            $this->mysqli = new mysqli($severname,$username,$password,$db_name,$port);
            $this->mysqli->set_charset("utf8");


            //check connection
            if ($this->mysqli->connect_error) {
		        die("Connection failed: " . $this->mysqli->connect_error);
		    }
        }

    }
?>
