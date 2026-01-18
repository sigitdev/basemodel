<?php
namespace BaseModel;

use mysqli;

class Config {
    /**
     * get connection configure your database connection here
     */
    protected function getConnection(){
        $serverUrl  = "";
        $userName   = "";
        $password   = "";
        $database   = "";
        $conn = new mysqli($serverUrl, $userName, $password, $database);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        return $conn;
    }
}


?>
