<?php

include '../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();
$areaClass = new Area($connString);

if(!isset($_GET['id'])){
    exit();
}else{
    $params = $_GET['id'];
}
if ($params > 0) {
    $areaClass->getArea($params);
} else {
    mysql_errno();
}

class Area {

    protected $conn;    

    function __construct($connString) {
        $this->conn = $connString;
    }

    function getArea($params) {
        $json_data = array();
        $sql = "SELECT * FROM wtp_area";
        $sql .= " WHERE id = $params";

        $result = mysqli_query($this->conn, $sql) or die();
                
        while ($row = mysqli_fetch_assoc($result)) {            
            $json_data = $row;
        }
        echo json_encode($json_data);
    }
}

